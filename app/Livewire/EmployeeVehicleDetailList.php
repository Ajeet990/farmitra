<?php

namespace App\Livewire;

use App\Models\EmployeeVehicleDetails;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeVehicleDetailList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        EmployeeVehicleDetails::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $employee=EmployeeVehicleDetails::with('users','delivery_vehicle_details')
        ->where(function ($query) {
            $query->where('vehicle_number', 'LIKE', '%' . $this->search . '%')
                ->orWhere('vehicle_model', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.employee-vehicle-detail-list',compact('employee'))->layout('layouts.app');
    }
}