<?php

namespace App\Livewire;

use App\Models\CalenderMonthInfo;
use App\Models\EmployeeAttendence;
use App\Models\User;
use Livewire\Component;

class EmployeeAttendencesEdit extends Component
{
    public $userAll;
    public $calender_month_infos;
    
    public $user_id;
    public $employee_id;
    public $attendance_days_id;
    public $clock_in;
    public $clock_out;
    public $total_work_hours;
    public $status;
    public $is_paid_leave;
    public $employee_attendence_id;
    
    public function mount($employee_attendence_id){
        $this->employee_attendence_id=$employee_attendence_id;
        $employee=EmployeeAttendence::find($employee_attendence_id);
        $this->user_id=$employee->user_id;
        $this->employee_id=$employee->employee_id;
        $this->attendance_days_id=$employee->attendance_days_id;
        $this->clock_in=$employee->clock_in;
        $this->clock_out=$employee->clock_out;
        $this->total_work_hours=$employee->total_work_hours;
        $this->status=$employee->status;
        $this->is_paid_leave=$employee->is_paid_leave;
    }
    public function update(){
        $employee=EmployeeAttendence::find($this->employee_attendence_id);
        $employee->user_id=$this->user_id;
        $employee->employee_id=$this->employee_id;
        $employee->attendance_days_id=$this->attendance_days_id;
        $employee->clock_in=$this->clock_in;
        $employee->clock_out=$this->clock_out;
        $employee->total_work_hours=$this->total_work_hours;
        $employee->status=$this->status;
        $employee->is_paid_leave=$this->is_paid_leave;
        $employee->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.employee.attendence');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->calender_month_infos=CalenderMonthInfo::get();
        return view('livewire.employee-attendences-edit')->layout('layouts.app');
    }
}