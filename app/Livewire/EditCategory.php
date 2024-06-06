<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;


class EditCategory extends Component
{
    public $name;
    public $icon;
    public $status;
    public $catId;
    public $imagePath;

    protected $rules  = [
        'name' => 'required',

    ];
    public function mount($params)
    {
        $data = Category::find($params['id']);
        $this->name = $data->name;
        $this->catId = $data->id;

        $this->imagePath = $data->icon;
        $this->status = $data->status;
    }

    public function submit()
    {
        $this->validate();
        if ($this->icon) {
            if ($this->imagePath && Storage::exists($this->imagePath)) {
                Storage::delete($this->imagePath);
            }
            $this->imagePath = $this->icon->store('category');
        }

        $data = Category::find($this->catId);
        $data->name = $this->name;
        $data->icon = $this->imagePath;
        $data->slug = Str::slug($this->name);
        $data->status = $this->status;
        $data->save();
        $this->dispatch('closeDrawer');
        $this->dispatch('updatedCategory');
    }
    public function render()
    {
        return view('livewire.edit-category');
    }
}
