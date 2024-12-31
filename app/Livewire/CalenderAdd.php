<?php

namespace App\Livewire;

use App\Models\Calender;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Rule;


class CalenderAdd extends Component
{
  #[Rule('required|min:3|max:50')]
   public $year;
   public $month;
   public $month_number;
   public $total_days;
   
   public function store(){
    $this->validate();
    if (Calender::where('year', $this->year)->exists()) {
        // If year exists, return an error message or a validation message
        session()->flash('error', 'The year ' . $this->year . ' already exists.');
        return; // Stop further execution
    }
    
    for ($month = 1; $month <= 12; $month++) {
        // Get the start date of the month
        $date = Carbon::create($this->year, $month, 1);
        
        // Get the month name and number of days in the month
        $monthName = $date->format('F'); // Full month name
        $daysInMonth = $date->daysInMonth; // Number of days in the month
        $calender=new Calender();
        $calender->year=$this->year;
        $calender->month=$monthName;
        $calender->month_number=$month;
        $calender->total_days=$daysInMonth;
        $calender->save();
        // Store month details in the array
        
    }
    
   
    session()->flash("success","Created Successfully.");
    return redirect()->route("list.calender");
   }

    public function render()
    {
        return view('livewire.calender-add')->layout('layouts.app');
    }
}