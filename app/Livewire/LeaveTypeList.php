<?php

namespace App\Livewire;

use App\Models\LeaveType;
use Livewire\Component;
use Livewire\WithPagination;

class LeaveTypeList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        LeaveType::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $leave=LeaveType::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
               
        })
        ->paginate($this->perPage);
        return view('livewire.leave-type-list',compact('leave'))->layout('layouts.app');
    }
}