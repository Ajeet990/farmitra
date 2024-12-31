<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Modules;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CategoryEdit extends Component
{
    use WithFileUploads;
    public $module;
    #[Rule('required')]
    public $module_id;
    public $name;
    public $description;
    public $icon;
    public $created_by;
    public $updated_by;
    public $approved_by;
    public $is_active=1;
    public $is_featured=1;
    public $is_custome=1;
    public $category_id;
    public $iconurl;
    public function mount($category_id){
        $this->category_id=$category_id;
        $categoryGet=Category::find($this->category_id);
        $this->name=$categoryGet->name;
        $this->description=$categoryGet->description;
        $this->iconurl=$categoryGet->icon;
        $this->is_active=$categoryGet->is_active;
        $this->is_featured=$categoryGet->is_featured;
        $this->is_custome=$categoryGet->is_custome;
        $this->created_by=$categoryGet->created_by;
        $this->updated_by=$categoryGet->updated_by;
        $this->approved_by=$categoryGet->approved_by;
      
        
    }
    public function update(){
        
        $this->validate();
        $category=Category::find($this->category_id);
        $category->module_id=$this->module_id;
        $category->name=$this->name;
        $category->description=$this->description;
        $category->icon=$this->icon?$this->icon->store('category_icon','public'):$this->iconurl;
        $category->created_by=$this->created_by;
        $category->updated_by=$this->updated_by;
        $category->approved_by=$this->approved_by;
        $category->is_featured=$this->is_featured;
        $category->is_custome=$this->is_custome;
        $category->is_active=$this->is_active;
        $category->save();
        session()->flash('success','Updated Successfully.');
       return  redirect()->route('list.category');
    }
    public function render()
    {
        $this->module=Modules::get();
        return view('livewire.category-edit')->layout('layouts.app');
    }
}