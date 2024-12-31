<?php

namespace App\Livewire;

use App\Models\EmployeeRoles;
use Livewire\Component;

class EmployeeRoleAdd extends Component
{
    public $name;
    public function store(){
        $employee=new EmployeeRoles();
        $employee->name=$this->name;
        $employee->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.employee.role');
    }
    public function render()
    {
        return view('livewire.employee-role-add')->layout('layouts.app');
    }
}