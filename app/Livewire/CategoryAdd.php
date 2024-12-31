<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Modules;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CategoryAdd extends Component
{
    
    use WithFileUploads;
    
    public $module;
    #[Rule('required')]
    public $module_id;
    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required|min:3|max:50')]
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
        $category=new Category();
        $category->module_id=$this->module_id;
        $category->name=$this->name;
        $category->description=$this->description;
        $category->icon=$this->icon->store('category_icon','public');
        $category->created_by=$this->created_by;
        $category->updated_by=$this->updated_by;
        $category->approved_by=$this->approved_by;
        $category->is_featured=$this->is_featured;
        $category->is_custome=$this->is_custome;
        $category->is_active=$this->is_active;
        $category->save();
        session()->flash('success','Created Successfully.');
       return  redirect()->route('list.category');
    }
    public function render()
    {
        $this->module=Modules::get();
        return view('livewire.category-add')->layout('layouts.app');
    }
}