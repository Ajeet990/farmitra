<?php

namespace App\Livewire;

use App\Models\DeliveryVehicleDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeliveryVehicleDetailEdit extends Component
{
    use WithFileUploads;
    public $vehicle_name;
    public $type;
    public $icon;
    public $iconurl;
    public $description;
    public $delivery_vehicle_detail_id;
    
    public function mount($delivery_vehicle_detail_id){
        $this->$delivery_vehicle_detail_id=$delivery_vehicle_detail_id;
        $deliveryVehicleDetail=DeliveryVehicleDetails::find($delivery_vehicle_detail_id);
        $this->vehicle_name=$deliveryVehicleDetail->vehicle_name;
        $this->type=$deliveryVehicleDetail->type;
        $this->iconurl=$deliveryVehicleDetail->icon;
        $this->description=$deliveryVehicleDetail->description;
        
    }
    public function update(){
        $deliveryVehicleDetail=DeliveryVehicleDetails::find($this->delivery_vehicle_detail_id);
        $deliveryVehicleDetail->vehicle_name=$this->vehicle_name;
        $deliveryVehicleDetail->type=$this->type;
        $deliveryVehicleDetail->icon=$this->icon?$this->icon->store('vehicle_icon','public'):$this->iconurl;
        $deliveryVehicleDetail->description=$this->description;
        $deliveryVehicleDetail->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.delivery.vehicle.detail');
        
    }
    public function render()
    {
        return view('livewire.delivery-vehicle-detail-edit')->layout('layouts.app');
    }
}