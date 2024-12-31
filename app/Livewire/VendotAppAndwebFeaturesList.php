<?php

namespace App\Livewire;

use App\Models\VendotAppAndWebFeatures;
use Livewire\Component;
use Livewire\WithPagination;

class VendotAppAndwebFeaturesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $vendotAppWebFeature;
    public function delete($id){
        VendotAppAndWebFeatures::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $vendotAppWebFeature=VendotAppAndWebFeatures::with('users','app_and_web_features') ->where(function ($query) {
            $query
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orWhereHas('app_and_web_features', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.vendot-app-andweb-features-list',compact('vendotAppWebFeature'))->layout('layouts.app');
    }
}