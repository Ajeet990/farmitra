<?php

namespace App\Livewire;

use App\Models\EmployeeRoles;
use Livewire\Component;

class EmployeeRoleEdit extends Component
{
    public $name;
    public $employee_role_id;
    public function mount($employee_role_id){
        $this->employee_role_id=$employee_role_id;
        $employee=EmployeeRoles::find($employee_role_id);
        $this->name=$employee->name;
    }
    
    public function update(){
        $employee=EmployeeRoles::find($this->employee_role_id);
        $employee->name=$this->name;
        $employee->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.employee.role');
    }
    public function render()
    {
        return view('livewire.employee-role-edit')->layout('layouts.app');
    }
}