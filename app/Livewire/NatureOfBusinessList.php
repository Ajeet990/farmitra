<?php

namespace App\Livewire;

use App\Models\NatureOfBusiness;
use Livewire\Component;
use Livewire\WithPagination;

class NatureOfBusinessList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $nature;

    public function delete($id){
        NatureOfBusiness::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $nature=NatureOfBusiness::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
             
        })
        ->paginate($this->perPage);
        return view('livewire.nature-of-business-list',compact('nature'))->layout('layouts.app');
    }
}