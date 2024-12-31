<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\VendorCategory;
use Livewire\Component;

class VendorCategoryEdit extends Component
{
    public $userAll;
    public $categoryAll;
    public $vendor_category_id;
    public $category_id;
    public $user_id;
    public function mount($vendor_category_id){
        $this->vendor_category_id=$vendor_category_id;
       $venderCategoryGet =VendorCategory::find($vendor_category_id);
       $this->category_id=$venderCategoryGet->category_id;
       $this->user_id=$venderCategoryGet->user_id;
        
        
    }
    public function update(){
        //$this->validate();
        $vendorcategory=VendorCategory::find($this->vendor_category_id);
        $vendorcategory->category_id=$this->category_id;
        $vendorcategory->user_id=$this->user_id;
        $vendorcategory->save();
        session()->flash('success','Updated Successfully.');
       return  redirect()->route('list.vendor.category');
    }
   
    public function render()
    {
        $this->userAll=User::get();
        $this->categoryAll=Category::get();
        return view('livewire.vendor-category-edit')->layout('layouts.app');
    }
}