<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSubCategory extends Component
{
  
    public $search;
 

    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',

    ];


  
    public function submit()
    {
        $this->validate();
        if ($this->icon) {
            $this->imagePath = $this->icon->store('sub_category');
        }

        SubCategory::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'icon' => $this->imagePath,
            'status' => $this->status,
        ]);


        $this->resetField();

        $this->dispatch('closeDrawer');
        $this->dispatch('closeDrawer');
    }
    #[On('updated')]

    public function resetField()
    {
        $this->category_id = null;
        $this->name = null;
        $this->icon = null;
        $this->status = 1;
    }
    public function render()
    {
        $categories = Category::all();
        $categoryList = Category::with('subCategory')->get();
        // dd($subCategory);
        return view('livewire.admin-sub-category', compact('categories','categoryList'))->layout('layouts.app');
    }
}
