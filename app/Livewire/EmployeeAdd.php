<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeAdd extends Component
{
    use WithFileUploads;
    public $userAll;
    public $user_id;
    public $profile_photo;
    public $aadhar_number;
    public $aadhaar_front_upload;
    public $aadhaar_back_upload;
    public $pan_number;
    public $pan_upload;
    public $address;
    public $alternate_number;
    public $city;
    public $state;
    public $country;
    public $pincode;
    public $blood_group;
    public $emergency_contact_number;
    public $emergency_contact_name;
    public $emergency_contact_relation;
    
    public function store(){
       // dd('kkk');
       $employee=new Employee();
       $employee->user_id=$this->user_id;
       $employee->profile_photo=$this->profile_photo->store('profile_photo','public');
       $employee->aadhar_number=$this->aadhar_number;
       $employee->aadhaar_front_upload=$this->aadhaar_front_upload->store('aadhaar_front_upload','public');
       $employee->aadhaar_back_upload=$this->aadhaar_back_upload->store('aadhaar_back_upload','public');
       $employee->pan_number=$this->pan_number;
       $employee->pan_upload=$this->pan_upload->store('pan_upload','public');
       $employee->address=$this->address;
       $employee->city=$this->city;
       $employee->state=$this->state;
       $employee->country=$this->country;
       $employee->pincode=$this->pincode;
       $employee->blood_group=$this->blood_group;
       $employee->emergency_contact_number=$this->emergency_contact_number;
       $employee->emergency_contact_name=$this->emergency_contact_name;
       $employee->emergency_contact_relation=$this->emergency_contact_relation;
       $employee->save();
       session()->flash('success','Updated Successfully.');
        return  redirect()->route('list.employee');
    }
    public function render()
    {
        $this->userAll=User::get();
        return view('livewire.employee-add')->layout('layouts.app');
    }
}