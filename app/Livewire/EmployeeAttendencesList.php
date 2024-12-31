<?php

namespace App\Livewire;

use App\Models\EmployeeAttendence;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeAttendencesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        EmployeeAttendence::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $employee=EmployeeAttendence::with('users','calender_month_infos')
        ->where(function ($query) {
            $query->where('clock_in', 'LIKE', '%' . $this->search . '%')
                ->orWhere('clock_out', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.employee-attendences-list',compact('employee'))->layout('layouts.app');
    }
}