<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class AddSubCategory extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $icon;
    public $status = 1;

    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',

    ];

    public function submit()
    {
        $this->validate();
        $imagePath = null;
        if ($this->icon) {
            $imagePath = $this->icon->store('sub_category');
        }
        SubCategory::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'icon' => $imagePath,
            'status' => $this->status,
        ]);
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.add-sub-category', compact('categories'));
    }
}
