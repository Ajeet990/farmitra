<?php

namespace App\Livewire;

use App\Models\AppAndWebFeatures;
use Livewire\Component;
use Livewire\WithPagination;

class AppWebFeatureList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $appWebFeature;
    public function delete($id){
        AppAndWebFeatures::where('id',$id)->delete();
        session()->flash('success','Deleted sucessfully.');
    }
    public function render()
    {
        $appWebFeature=AppAndWebFeatures::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
              
        })
        ->paginate($this->perPage);;
        return view('livewire.app-web-feature-list',compact('appWebFeature'))->layout('layouts.app');
    }
}