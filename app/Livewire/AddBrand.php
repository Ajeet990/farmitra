<?php

namespace App\Livewire;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddBrand extends ModalComponent
{
    use WithFileUploads;
    public $title;
    public $image;
    public $search;
    public $imagePath;
    public $desc;

    public $status = 1;
    protected $rules = [
        'title' => 'required',

    ];

    public function submit()
    {
        $imagePath = null;

        if ($this->image) {
            $imagePath = $this->image->store('brand');
        }
        $this->validate();
        Brand::create([
            'name' => $this->title,
            'slug' => Str::slug($this->title),
            'image' => $imagePath,
            'description' => $this->desc,
            'status' => $this->status,
        ]);

        $this->dispatch('closeDrawer');
        $this->dispatch('updatedBrand');
    }

   

    public function render()
    {
        return view('livewire.add-brand');
    }
}
