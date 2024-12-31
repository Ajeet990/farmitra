<?php

namespace App\Livewire;

use App\Models\Calender;
use App\Models\CalenderMonthInfo;
use Livewire\Component;

class CalenderMonthInfoAdd extends Component
{
    public $calender;
    public $calender_id;
    public $date;
    public $day;
    public $sort_day;
    public $day_number;
    
    public function store(){
        $calender=new CalenderMonthInfo();
        $calender->calender_id=$this->calender_id;
        $calender->date=$this->date;
        $calender->day=$this->day;
        $calender->sort_day=$this->sort_day;
        $calender->day_number=$this->day_number;
        $calender->save();
        session()->flash("success",'Created Successfully!!');
        return redirect()->route('list.calender.month.info');
    }
    public function render()
    {
        $this->calender=Calender::get();
        return view('livewire.calender-month-info-add')->layout('layouts.app');
    }
}