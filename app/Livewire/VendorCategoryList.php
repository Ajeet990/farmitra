<?php

namespace App\Livewire;

use App\Models\VendorCategory;
use Livewire\Component;
use Livewire\WithPagination;

class VendorCategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $vendorCategory;
    public function delete($id){
        VendorCategory::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $vendorCategory=VendorCategory::with('users','categories')->where(function ($query) {
            $query
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orWhereHas('categories', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
       // dd($this->vendorCategory);
        return view('livewire.vendor-category-list',compact('vendorCategory'))->layout('layouts.app');
    }
}