<?php

namespace App\Livewire;

use App\Models\VendorInformation;
use Livewire\Component;
use Livewire\WithPagination;

class VendorInformationList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $vendorInformationAll;
    public function delete($id){
        VendorInformation::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $vendorInformationAll=VendorInformation::where(function ($query) {
            $query->where('store_name', 'LIKE', '%' . $this->search . '%');
               
        })
        ->paginate($this->perPage);
        return view('livewire.vendor-information-list',compact('vendorInformationAll'))->layout('layouts.app');
    }
}