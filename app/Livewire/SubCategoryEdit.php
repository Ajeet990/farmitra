<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class SubCategoryEdit extends Component
{
    public $categoryAll;
    use WithFileUploads;
    #[Rule('required')]
    public $subcategory_id;
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
    public function mount($subcategory_id){
        $this->subcategory_id=$subcategory_id;
        $subcategoryGet=SubCategory::find($this->subcategory_id);
        $this->name=$subcategoryGet->name;
        $this->description=$subcategoryGet->description;
        $this->iconurl=$subcategoryGet->icon;
        $this->is_active=$subcategoryGet->is_active;
        $this->created_by=$subcategoryGet->created_by;
        $this->updated_by=$subcategoryGet->updated_by;
        $this->approved_by=$subcategoryGet->approved_by;  
    }
    public function update(){
        
        $this->validate();
        $subcategory=SubCategory::find($this->subcategory_id);
        $subcategory->category_id=$this->category_id;
        $subcategory->name=$this->name;
        $subcategory->description=$this->description;
        $subcategory->icon=$this->icon?$this->icon->store('subcategory_icon','public'):$this->iconurl;
        $subcategory->created_by=$this->created_by;
        $subcategory->updated_by=$this->updated_by;
        $subcategory->approved_by=$this->approved_by;
        $subcategory->is_active=$this->is_active;
        $subcategory->save();
        session()->flash('success','Updated Successfully.');
       return  redirect()->route('list.subcategory');
    }
    public function render()
    {
        $this->categoryAll=Category::get();
        return view('livewire.sub-category-edit')->layout('layouts.app');
    }
}