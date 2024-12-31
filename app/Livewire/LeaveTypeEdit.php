<?php

namespace App\Livewire;

use App\Models\LeaveType;
use Livewire\Component;

class LeaveTypeEdit extends Component
{
    public $name;
    public $leave_type_id;
    public function mount($leave_type_id){
        $this->leave_type_id=$leave_type_id;
        $leave=LeaveType::find($leave_type_id);
        $this->name=$leave->name;
    }
    
    public function update(){
        $leave=LeaveType::find($this->leave_type_id);
        $leave->name=$this->name;
        $leave->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.leave.type');
    }
    public function render()
    {
        return view('livewire.leave-type-edit')->layout('layouts.app');
    }
}