<?php

namespace App\Livewire;

use App\Models\CalenderHoliday;
use App\Models\CalenderMonthInfo;
use App\Models\User;
use Livewire\Component;

class CalenderHolidayEdit extends Component
{
    public $userAll;
    public $calender_month_infos;
    
    public $user_id;
    public $calender_month_info_id;
    public $holiday_name;
    public $holiday_reason;
    public $calender_holiday_id;

    public function mount($calender_holiday_id){
        $this->calender_holiday_id=$calender_holiday_id;
        $calenderHoliday=CalenderHoliday::find($calender_holiday_id);
        $this->user_id=$calenderHoliday->user_id;
        $this->calender_month_info_id=$calenderHoliday->calender_month_info_id;
        $this->holiday_name=$calenderHoliday->holiday_name;
        $this->holiday_reason=$calenderHoliday->holiday_reason;
        
    }
    public function update(){
        $calenderHoliday=CalenderHoliday::find($this->calender_holiday_id);
        $calenderHoliday->user_id=$this->user_id;
        $calenderHoliday->calender_month_info_id=$this->calender_month_info_id;
        $calenderHoliday->holiday_name=$this->holiday_name;
        $calenderHoliday->holiday_reason=$this->holiday_reason;
        $calenderHoliday->save();
        session()->flash("success",'Updated Successfully.');
        return redirect()->route('list.calender.holiday');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->calender_month_infos=CalenderMonthInfo::get();
        return view('livewire.calender-holiday-edit')->layout('layouts.app');
    }
}