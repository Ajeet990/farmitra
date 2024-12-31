<?php

namespace App\Livewire;

use App\Models\DeliveryVehicleDetails;
use App\Models\EmployeeVehicleDetails;
use App\Models\User;
use Livewire\Component;

class EmployeeVehicleDetailAdd extends Component
{
    public $userAll;
    public $deliveryVehicleDetailAll;
    public $user_id;
    public $delivery_vehicle_detail_id;
    public $vehicle_number;
    public $vehicle_type;
    public $vehicle_color;
    public $vehicle_model;
    public $vehicle_capacity;
    public $vehicle_status;
    public $is_insurance_expired;
    public $is_vehicle_expired;
    public function store(){
        $employeeVehicleDetails=new EmployeeVehicleDetails();
        $employeeVehicleDetails->user_id=$this->user_id;
        $employeeVehicleDetails->delivery_vehicle_detail_id=$this->delivery_vehicle_detail_id;
        $employeeVehicleDetails->vehicle_number=$this->vehicle_number;
        $employeeVehicleDetails->vehicle_type=$this->vehicle_type;
        $employeeVehicleDetails->vehicle_color=$this->vehicle_color;
        $employeeVehicleDetails->vehicle_model=$this->vehicle_model;
        $employeeVehicleDetails->vehicle_capacity=$this->vehicle_capacity;
        $employeeVehicleDetails->vehicle_status=$this->vehicle_status;
        $employeeVehicleDetails->is_insurance_expired=$this->is_insurance_expired;
        $employeeVehicleDetails->is_vehicle_expired=$this->is_vehicle_expired;
        $employeeVehicleDetails->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.employee.vehicle.details');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->deliveryVehicleDetailAll=DeliveryVehicleDetails::get();
        return view('livewire.employee-vehicle-detail-add')->layout('layouts.app');
    }
}