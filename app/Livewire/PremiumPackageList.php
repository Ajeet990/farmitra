<?php

namespace App\Livewire;

use App\Models\PremiumPackage;
use Livewire\Component;
use Livewire\WithPagination;

class PremiumPackageList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $premiumPackage;
    public function delete($id){
        PremiumPackage::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $premiumPackage=PremiumPackage::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
               
        })
        ->paginate($this->perPage);
        return view('livewire.premium-package-list',compact('premiumPackage'))->layout('layouts.app');
    }
}