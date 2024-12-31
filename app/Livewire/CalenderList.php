<?php

namespace App\Livewire;

use App\Models\Calender;
use Livewire\Component;
use Livewire\WithPagination;

class CalenderList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    
    public function delete($id){
        Calender::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $calender=Calender::
        where(function ($query) {
            $query->where('year', 'LIKE', '%' . $this->search . '%')
                ->orWhere('month', 'LIKE', '%' . $this->search . '%');
             
        })
        ->paginate($this->perPage);
        return view('livewire.calender-list',compact('calender'))->layout('layouts.app');
    }
}