<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class SubCategoryAdd extends Component
{
    use WithFileUploads;
    public $categoryAll;
    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required')]
    public $category_id;
    public $description;
    public $icon;
    public $created_by;
    public $updated_by;
    public $approved_by;
    public $is_active=1;
    public $is_featured=1;
    public $is_custome=1;
    
    public function store(){
        $this->validate();
        $subcategory=new SubCategory();
        $subcategory->category_id=$this->category_id;
        $subcategory->name=$this->name;
        $subcategory->description=$this->description;
        $subcategory->icon=$this->icon->store('subcategory_icon','public');
        $subcategory->created_by=$this->created_by;
        $subcategory->updated_by=$this->updated_by;
        $subcategory->approved_by=$this->approved_by;
        $subcategory->is_active=$this->is_active;
        $subcategory->save();
        session()->flash('success','Created Successfully.');
       return  redirect()->route('list.subcategory');
    }
    public function render()
    {
        $this->categoryAll=Category::get();
        return view('livewire.sub-category-add')->layout('layouts.app');
    }
}