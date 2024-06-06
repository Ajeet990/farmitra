<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddCategory extends Component
{
    use WithFileUploads;

    protected $rules = [
        'name' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $imagePath = null;
        if ($this->icon) {
            $imagePath = $this->icon->store('category');
        }

        Category::create([
            'name' => $this->name,
            'icon' => $imagePath,
            'slug' => Str::slug($this->name),
            'status' => $this->status,
        ]);

        $this->dispatch('closeDrawer');
        $this->dispatch('updatedCategory');
    }
    public function render()
    {
        return view('livewire.add-category');
    }
}
