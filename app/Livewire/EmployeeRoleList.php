<?php

namespace App\Livewire;

use App\Models\EmployeeRoles;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeRoleList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        EmployeeRoles::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $employee=EmployeeRoles::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
               
        })
        ->paginate($this->perPage);
        return view('livewire.employee-role-list',compact('employee'))->layout('layouts.app');
    }
}