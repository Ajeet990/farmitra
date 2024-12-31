<?php

namespace App\Livewire;

use App\Models\StoreOwnerDetails;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
class StoreOwnerDetailAdd extends Component
{
    use WithFileUploads;
    public $userAll;
    public $user_id;
    public $store_owner_aadhar_upload;
    public $store_owner_aadhar_front_upload;
    public $store_owner_aadhar_back;
    public $store_owner_pan_number;
    public $store_owner_pan_upload;
    public $store_owner_digital_signature_upload;

    public function store(){
        $storeOwnerDetails=new StoreOwnerDetails();
        $storeOwnerDetails->user_id=$this->user_id;
        $storeOwnerDetails->store_owner_aadhar_upload=$this->store_owner_aadhar_upload->store('store_owner_aadhar_upload','public');
        $storeOwnerDetails->store_owner_aadhar_front_upload=$this->store_owner_aadhar_front_upload->store('store_owner_aadhar_front_upload','public');
        $storeOwnerDetails->store_owner_aadhar_back=$this->store_owner_aadhar_back->store('store_owner_aadhar_back','public');
        $storeOwnerDetails->store_owner_pan_number=$this->store_owner_pan_number;
        $storeOwnerDetails->store_owner_pan_upload=$this->store_owner_pan_upload->store('store_owner_pan_upload','public');
        $storeOwnerDetails->store_owner_digital_signature_upload=$this->store_owner_digital_signature_upload->store('store_owner_digital_signature_upload','public');
        $storeOwnerDetails->save();
        session()->flash('success','Created Successfully.');
        return  redirect()->route('list.store.owner.details');
    }
    public function render()
    {
        $this->userAll=User::get();
        return view('livewire.store-owner-detail-add')->layout('layouts.app');
    }
}