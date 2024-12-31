<?php

namespace App\Livewire;

use App\Models\DeliveryVehicleDetails;
use App\Models\EmployeeVehicleDetails;
use App\Models\User;
use Livewire\Component;

class EmployeeVehicleDetailEdit extends Component
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
    public $employee_vehicle_detail_id;
    
    public function mount($employee_vehicle_detail_id){
        $this->employee_vehicle_detail_id=$employee_vehicle_detail_id;
        $employeeVehicleDetails=EmployeeVehicleDetails::find($employee_vehicle_detail_id);
        $this->user_id=$employeeVehicleDetails->user_id;
        $this->delivery_vehicle_detail_id=$employeeVehicleDetails->delivery_vehicle_detail_id;
        $this->vehicle_number=$employeeVehicleDetails->vehicle_number;
        $this->vehicle_type=$employeeVehicleDetails->vehicle_type;
        $this->vehicle_color=$employeeVehicleDetails->vehicle_color;
        $this->vehicle_model=$employeeVehicleDetails->vehicle_model;
        $this->vehicle_capacity=$employeeVehicleDetails->vehicle_capacity;
        $this->vehicle_status=$employeeVehicleDetails->vehicle_status;
        $this->is_insurance_expired=$employeeVehicleDetails->is_insurance_expired;
        $this->is_vehicle_expired=$employeeVehicleDetails->is_vehicle_expired;
    }
    public function update(){
        $employeeVehicleDetails=EmployeeVehicleDetails::find($this->employee_vehicle_detail_id);
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
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.employee.vehicle.details');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->deliveryVehicleDetailAll=DeliveryVehicleDetails::get();
        return view('livewire.employee-vehicle-detail-edit')->layout("layouts.app");
    }
}