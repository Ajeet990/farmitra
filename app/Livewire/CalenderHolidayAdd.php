<?php

namespace App\Livewire;

use App\Models\CalenderHoliday;
use App\Models\CalenderMonthInfo;
use App\Models\User;
use Livewire\Component;

class CalenderHolidayAdd extends Component
{
    public $userAll;
    public $calender_month_infos;
    
    public $user_id;
    public $calender_month_info_id;
    public $holiday_name;
    public $holiday_reason;

    public function store(){
        $calenderHoliday=new CalenderHoliday();
        $calenderHoliday->user_id=$this->user_id;
        $calenderHoliday->calender_month_info_id=$this->calender_month_info_id;
        $calenderHoliday->holiday_name=$this->holiday_name;
        $calenderHoliday->holiday_reason=$this->holiday_reason;
        $calenderHoliday->save();
        session()->flash("success",'Created Successfully.');
        return redirect()->route('list.calender.holiday');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->calender_month_infos=CalenderMonthInfo::get();
        return view('livewire.calender-holiday-add')->layout('layouts.app');
    }
}