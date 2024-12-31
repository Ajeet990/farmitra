<?php

namespace App\Livewire;

use App\Models\VendorPremiumHistory;
use Livewire\Component;
use Livewire\WithPagination;

class VendorPremiumHistoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $vendorPremiumHistory;
    public function delete($id){
        VendorPremiumHistory::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $vendorPremiumHistory=VendorPremiumHistory::with('users','premium_package')->where(function ($query) {
            $query
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orWhereHas('premium_package', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.vendor-premium-history-list',compact('vendorPremiumHistory'))->layout('layouts.app');
    }
}