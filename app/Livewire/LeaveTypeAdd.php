<?php

namespace App\Livewire;

use App\Models\LeaveType;
use Livewire\Component;

class LeaveTypeAdd extends Component
{
    public $name;
    public function store(){
        $Leave=new LeaveType();
        $Leave->name=$this->name;
        $Leave->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.leave.type');
    }
    public function render()
    {
        return view('livewire.leave-type-add')->layout('layouts.app');
    }
}