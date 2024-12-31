<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeEdit extends Component
{
    use WithFileUploads;
    public $userAll;
    public $user_id;
    public $profile_photo;
    public $profile_photo_url;
    public $aadhar_number;
    public $aadhaar_front_upload;
    public $aadhaar_front_upload_url;
    public $aadhaar_back_upload;
    public $aadhaar_back_upload_url;
    public $pan_number;
    public $pan_upload;
    public $pan_upload_url;
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
    public $employee_id;
    
    public function mount($employee_id){
        $employee_id=$this->employee_id;
        $employee=Employee::find($employee_id);
        $this->user_id=$employee->user_id;
        $this->profile_photo_url=$employee->profile_photo;
        $this->aadhar_number=$employee->aadhar_number;
        $this->aadhaar_front_upload_url=$employee->aadhaar_front_upload;
        $this->aadhaar_back_upload_url=$employee->aadhaar_back_upload;
        $this->pan_number=$employee->pan_number;
        $this->pan_upload_url=$employee->pan_upload;
        $this->address=$employee->address;
        $this->alternate_number=$employee->alternate_number;
        $this->city=$employee->city;
        $this->state=$employee->state;
        $this->country=$employee->country;
        $this->pincode=$employee->pincode;
        $this->blood_group=$employee->blood_group;
        $this->emergency_contact_number=$employee->emergency_contact_number;
        $this->emergency_contact_name=$employee->emergency_contact_name;
        $this->emergency_contact_relation=$employee->emergency_contact_relation;
    }
    
    public function store(){
       // dd('kkk');
       $employee=Employee::find($this->employee_id);
       $employee->user_id=$this->user_id;
       $employee->profile_photo=$this->profile_photo?$this->profile_photo->store('profile_photo','public'):$this->profile_photo_url;
       $employee->aadhar_number=$this->aadhar_number;
       $employee->aadhaar_front_upload=$this->aadhaar_front_upload?$this->aadhaar_front_upload->store('aadhaar_front_upload','public'):$this->aadhaar_front_upload_url;
       $employee->aadhaar_back_upload=$this->aadhaar_back_upload?$this->aadhaar_back_upload->store('aadhaar_back_upload','public'):$this->aadhaar_back_upload_url;
       $employee->pan_number=$this->pan_number;
       $employee->pan_upload=$this->pan_upload?$this->pan_upload->store('pan_upload','public'):$this->pan_upload_url;
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
        return view('livewire.employee-edit')->layout('layouts.app');
    }
}