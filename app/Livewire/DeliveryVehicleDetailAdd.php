<?php

namespace App\Livewire;

use App\Models\DeliveryVehicleDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryVehicleDetailAdd extends Component
{
    use WithFileUploads;
    public $vehicle_name;
    public $type=1;
    public $icon;
    public $description;
    
    public function store(){
        $deliveryVehicleDetail=new DeliveryVehicleDetails();
        $deliveryVehicleDetail->vehicle_name=$this->vehicle_name;
        $deliveryVehicleDetail->type=$this->type;
        $deliveryVehicleDetail->icon=$this->icon->store('vehicle_icon','public');
        $deliveryVehicleDetail->description=$this->description;
        $deliveryVehicleDetail->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.delivery.vehicle.detail');
        
    }
    
    public function render()
    {
        return view('livewire.delivery-vehicle-detail-add')->layout('layouts.app');
    }
}