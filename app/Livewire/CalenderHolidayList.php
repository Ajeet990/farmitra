<?php

namespace App\Livewire;

use App\Models\CalenderHoliday;
use Livewire\Component;
use Livewire\WithPagination;

class CalenderHolidayList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $employee;
    public function delete($id){
        CalenderHoliday::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $calenderHoliday=CalenderHoliday::with('users','calender_month_infos')
        ->where(function ($query) {
            $query->where('holiday_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('holiday_reason', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.calender-holiday-list',compact('calenderHoliday'))->layout('layouts.app');
    }
}