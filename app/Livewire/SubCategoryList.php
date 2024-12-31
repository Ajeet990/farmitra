<?php

namespace App\Livewire;

use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $subcategory;
    public function delete($id){
        SubCategory::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $subcategory=SubCategory::with('category')->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('category', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.sub-category-list',compact('subcategory'))->layout('layouts.app');
    }
}