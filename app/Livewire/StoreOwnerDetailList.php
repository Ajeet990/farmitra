<?php

namespace App\Livewire;

use App\Models\StoreOwnerDetails;
use Livewire\Component;
use Livewire\WithPagination;

class StoreOwnerDetailList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $storeOwnerDetails;
    public function delete($id){
        StoreOwnerDetails::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $storeOwnerDetails=StoreOwnerDetails::with('users')->where(function ($query) {
            $query
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.store-owner-detail-list',compact('storeOwnerDetails'))->layout('layouts.app');
    }
}