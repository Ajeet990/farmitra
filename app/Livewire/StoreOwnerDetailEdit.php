<?php

namespace App\Livewire;

use App\Models\StoreOwnerDetails;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreOwnerDetailEdit extends Component
{
    public $userAll;
    use WithFileUploads;
   
    public $user_id;
    public $store_owner_aadhar_upload;
    public $store_owner_aadhar_upload_url;
    public $store_owner_aadhar_front_upload;
    public $store_owner_aadhar_front_upload_url;
    public $store_owner_aadhar_back;
    public $store_owner_aadhar_back_url;
    public $store_owner_pan_number;
    public $store_owner_pan_upload;
    public $store_owner_pan_upload_url;
    public $store_owner_digital_signature_upload;
    public $store_owner_digital_signature_upload_url;
    public $store_owner_detail_id;
    
    public function mount($store_owner_detail_id){
        $this->store_owner_detail_id=$store_owner_detail_id;
        $storeOwnerDetails=StoreOwnerDetails::find($store_owner_detail_id);
        $this->user_id=$storeOwnerDetails->user_id;
        $this->store_owner_aadhar_upload_url=$storeOwnerDetails->store_owner_aadhar_upload;
        $this->store_owner_aadhar_front_upload_url=$storeOwnerDetails->store_owner_aadhar_front_upload;
        $this->store_owner_aadhar_back_url=$storeOwnerDetails->store_owner_aadhar_back;
        $this->store_owner_pan_number=$storeOwnerDetails->store_owner_pan_number;
        $this->store_owner_pan_upload_url=$storeOwnerDetails->store_owner_pan_upload;
        $this->store_owner_digital_signature_upload_url=$storeOwnerDetails->store_owner_digital_signature_upload;
        
    }

    public function update(){
        $storeOwnerDetails=StoreOwnerDetails::find($this->store_owner_detail_id);
        $storeOwnerDetails->user_id=$this->user_id;
        $storeOwnerDetails->store_owner_aadhar_upload=$this->store_owner_aadhar_upload?$this->store_owner_aadhar_upload->store('store_owner_aadhar_upload','public'):$this->store_owner_aadhar_upload_url;
        $storeOwnerDetails->store_owner_aadhar_front_upload=$this->store_owner_aadhar_front_upload?$this->store_owner_aadhar_front_upload->store('store_owner_aadhar_front_upload','public'):$this->store_owner_aadhar_front_upload_url;
        $storeOwnerDetails->store_owner_aadhar_back=$this->store_owner_aadhar_back?$this->store_owner_aadhar_back->store('store_owner_aadhar_back','public'):$this->store_owner_aadhar_back_url;
        $storeOwnerDetails->store_owner_pan_number=$this->store_owner_pan_number;
        $storeOwnerDetails->store_owner_pan_upload=$this->store_owner_pan_upload?$this->store_owner_pan_upload->store('store_owner_pan_upload','public'):$this->store_owner_pan_upload_url;
        $storeOwnerDetails->store_owner_digital_signature_upload=$this->store_owner_digital_signature_upload?$this->store_owner_digital_signature_upload->store('store_owner_digital_signature_upload','public'):$this->store_owner_digital_signature_upload_url;
        $storeOwnerDetails->save();
        session()->flash('success','Updated Successfully.');
        return  redirect()->route('list.store.owner.details');
    }
    public function render()
    {
        $this->userAll=User::get();
        return view('livewire.store-owner-detail-edit')->layout('layouts.app');
    }
}