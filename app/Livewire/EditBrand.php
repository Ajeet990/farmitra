<?php

namespace App\Livewire;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditBrand extends Component
{

    use WithFileUploads;
    public $title;
    public $image;
    public $search;
    public $imagePath;
    public $desc;
    public $brandId;

    public $status;
    protected $rules = [
        'title' => 'required',

    ];


    public function mount($params)
    {
        $this->brandId = $params['id'];
        $this->loadBrand($params['id']);
    }


    public function loadBrand($id)
    {
        $data = Brand::find($id);
        if ($data) {
            $this->brandId = $data->id;
            $this->title = $data->name;
            $this->imagePath = $data->image;
            $this->status = $data->status;
            $this->desc = $data->description;
        }
    }
    public function submit()
    {
        if ($this->image) {
            if ($this->imagePath && Storage::exists($this->imagePath)) {
                Storage::delete($this->imagePath);
            }
            $this->imagePath = $this->image->store('brand');
        }

        $this->validate();

        $data = Brand::find($this->brandId);
        $data->name = $this->title;
        $data->slug = Str::slug($this->title);
        $data->description = $this->desc;
        $data->status = $this->status;
        $data->save();
        $this->dispatch('closeDrawer');
        $this->dispatch('updatedBrand');
    }
    public function render()
    {
        return view('livewire.edit-brand');
    }
}
