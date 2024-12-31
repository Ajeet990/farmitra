<?php

namespace App\Livewire;

use App\Models\EmployeeBankDetails;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeBankDetailList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employeeBankDetails;
    public function delete($id){
        EmployeeBankDetails::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
    }
    public function render()
    {
        $employeeBankDetails=EmployeeBankDetails::with('users')->where(function ($query) {
            $query->where('bank_name', 'LIKE', '%' . $this->search . '%')
                
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.employee-bank-detail-list',compact('employeeBankDetails'))->layout('layouts.app');
    }
}