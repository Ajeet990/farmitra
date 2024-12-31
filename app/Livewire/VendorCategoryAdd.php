<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\User;
use App\Models\VendorCategory;
use Livewire\Component;

class VendorCategoryAdd extends Component
{
    public $userAll;
    public $categoryAll;
    public $category_id;
    public $user_id;
    public function store(){
        //$this->validate();
        $vendorcategory=new VendorCategory();
        $vendorcategory->category_id=$this->category_id;
        $vendorcategory->user_id=$this->user_id;
        $vendorcategory->save();
        session()->flash('success','Created Successfully.');
       return  redirect()->route('list.vendor.category');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->categoryAll=Category::get();
        return view('livewire.vendor-category-add')->layout('layouts.app');
    }
}