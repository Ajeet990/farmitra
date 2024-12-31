<?php

namespace App\Livewire;

use App\Models\Calender;
use Livewire\Component;

class CalenderEdit extends Component
{
    public $year;
    public $month;
    public $month_number;
    public $total_days;
    public $calender_id;
    
    public function mount($calender_id){
        $this->calender_id=$calender_id;
        $calender=Calender::find($calender_id);
        $this->year=$calender->year;
        $this->month=$calender->month;
        $this->month_number=$calender->month_number;
        $this->total_days=$calender->total_days;
    }
    public function update(){
     $calender=Calender::find($this->calender_id);
     $calender->year=$this->year;
     $calender->month=$this->month;
     $calender->month_number=$this->month_number;
     $calender->total_days=$this->total_days;
     $calender->save();
     session()->flash("success","Created Successfully.");
     return redirect()->route("list.calender");
    }
    public function render()
    {
        return view('livewire.calender-edit')->layout('layouts.app');
    }
}