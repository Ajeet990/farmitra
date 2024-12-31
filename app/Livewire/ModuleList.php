<?php

namespace App\Livewire;

use App\Models\Modules;
use Livewire\Component;
use Livewire\WithPagination;

class ModuleList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $modules;
    public function delete($id){
        Modules::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $modules=Modules::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');   
        })
        ->paginate($this->perPage);
        return view('livewire.module-list',compact('modules'))->layout('layouts.app');
    }
}