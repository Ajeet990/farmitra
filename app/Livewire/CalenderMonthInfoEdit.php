<?php

namespace App\Livewire;

use App\Models\Calender;
use App\Models\CalenderMonthInfo;
use Livewire\Component;

class CalenderMonthInfoEdit extends Component
{
    public $calender;
    public $calender_id;
    public $date;
    public $day;
    public $sort_day;
    public $day_number;
    public $calender_month_info_id;

    public function mount($calender_month_info_id){
        $this->calender_month_info_id=$calender_month_info_id;
        $calenderMonthInfo=CalenderMonthInfo::find($calender_month_info_id);
        $this->calender_id=$calenderMonthInfo->calender_id;
        $this->date=$calenderMonthInfo->date;
        $this->day=$calenderMonthInfo->day;
        $this->sort_day=$calenderMonthInfo->sort_day;
        $this->day_number=$calenderMonthInfo->day_number;
    }
    
    public function update(){
        $calender=CalenderMonthInfo::find($this->calender_month_info_id);
        $calender->calender_id=$this->calender_id;
        $calender->date=$this->date;
        $calender->day=$this->day;
        $calender->sort_day=$this->sort_day;
        $calender->day_number=$this->day_number;
        $calender->save();
        session()->flash("success",'Updated Successfully!!');
        return redirect()->route('list.calender.month.info');
    }
    public function render()
    {
        $this->calender=Calender::get();
        return view('livewire.calender-month-info-edit')->layout('layouts.app');
    }
}