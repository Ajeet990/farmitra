<?php

namespace App\Livewire;

use App\Models\CalenderMonthInfo;
use Livewire\Component;
use Livewire\WithPagination;

class CalenderMonthInfoList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        CalenderMonthInfo::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $calenderMonthInfo=CalenderMonthInfo::with('calenders')
        ->where(function ($query) {
            $query->where('date', 'LIKE', '%' . $this->search . '%')
                ->orWhere('day', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('calenders', function ($userQuery) {
                    $userQuery->where('year', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.calender-month-info-list',compact('calenderMonthInfo'))->layout('layouts.app');
    }
}