<?php

namespace App\Livewire;

use App\Models\Modules;
use App\Models\User;
use App\Models\VendorInformation;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class VendorInformationEdit extends Component
{
    public $userAll;
    public $moduleAll;
    
    use WithFileUploads;
    public $user_id;
    public $step_completed;
    public $is_premium;
    public $valid_upto;
    public $is_edited;
    public $is_open;
    public $module_id;
    public $store_name;
    public $whatsapp_number;
    public $email;
    public $store_address;
    public $store_city;
    public $store_state;
    public $store_country;
    public $store_pincode;
    public $store_phone_number;
    public $store_gst_number;
    public $store_pan_number;
    public $store_logo;
    public $store_logo_url;
    public $store_banner;
    public $store_banner_url;
    public $store_description;
    public $store_lat;
    public $store_long;
    public $store_inside_photo;
    public $store_inside_photo_url;
    public $store_outside_photo;
    public $store_outside_photo_url;
    public $store_stamp;
    public $remark;
    public $vendor_information_id;

    public function mount($vendor_information_id){
        $this->vendor_information_id=$vendor_information_id;
        $vendorInformationGet=VendorInformation::find($this->vendor_information_id);
        $this->user_id=$vendorInformationGet->user_id;
        $this->step_completed=$vendorInformationGet->step_completed;
        $this->is_premium=$vendorInformationGet->is_premium;
        $this->valid_upto=$vendorInformationGet->valid_upto;
        $this->is_edited=$vendorInformationGet->is_edited;
        $this->is_open=$vendorInformationGet->is_open;
        $this->module_id=$vendorInformationGet->module_id;
        $this->store_name=$vendorInformationGet->store_name;
        $this->whatsapp_number=$vendorInformationGet->whatsapp_number;
        $this->email=$vendorInformationGet->email;
        $this->store_address=$vendorInformationGet->store_address;
        $this->store_city=$vendorInformationGet->store_city;
        $this->store_state=$vendorInformationGet->store_state;
        $this->store_country=$vendorInformationGet->store_country;
        $this->store_pincode=$vendorInformationGet->store_pincode;
        $this->store_phone_number=$vendorInformationGet->store_phone_number;
        $this->store_gst_number=$vendorInformationGet->store_gst_number;
        $this->store_pan_number=$vendorInformationGet->store_pan_number;
        $this->store_logo_url=$vendorInformationGet->store_logo;
        $this->store_banner_url=$vendorInformationGet->store_banner;
        $this->store_description=$vendorInformationGet->store_description;
        $this->store_lat=$vendorInformationGet->store_lat;
        $this->store_long=$vendorInformationGet->store_long;
        $this->store_inside_photo_url=$vendorInformationGet->store_inside_photo;
        $this->store_outside_photo_url=$vendorInformationGet->store_outside_photo;
        $this->store_stamp=$vendorInformationGet->store_stamp;
        $this->remark=$vendorInformationGet->remark;
       
    }
    public function update(){
       // $this->validate();
        $vendorInformation= VendorInformation::find($this->vendor_information_id);
        $vendorInformation->user_id=$this->user_id;
        $vendorInformation->step_completed=$this->step_completed;
        $vendorInformation->is_premium=$this->is_premium;
        $vendorInformation->valid_upto=$this->valid_upto;
        $vendorInformation->is_edited=$this->is_edited;
        $vendorInformation->is_open=$this->is_open;
        $vendorInformation->module_id=$this->module_id;
        $vendorInformation->store_name=$this->store_name;
        $vendorInformation->whatsapp_number=$this->whatsapp_number;
        $vendorInformation->email=$this->email;
        $vendorInformation->store_address=$this->store_address;
        $vendorInformation->store_city=$this->store_city;
        $vendorInformation->store_state=$this->store_state;
        $vendorInformation->store_country=$this->store_country;
        $vendorInformation->store_pincode=$this->store_pincode;
        $vendorInformation->store_phone_number=$this->store_phone_number;
        $vendorInformation->store_gst_number=$this->store_gst_number;
        $vendorInformation->store_pan_number=$this->store_pan_number;
        $vendorInformation->store_logo=$this->store_logo?$this->store_logo->store('store_logo','public'):$this->store_logo_url;
        $vendorInformation->store_banner=$this->store_banner?$this->store_banner->store('store_banner','public'):$this->store_banner_url;
        $vendorInformation->store_description=$this->store_description;
        $vendorInformation->store_lat=$this->store_lat;
        $vendorInformation->store_long=$this->store_long;
        $vendorInformation->store_inside_photo=$this->store_inside_photo?$this->store_inside_photo->store('store_inside_photo','public'):$this->store_inside_photo_url;
        $vendorInformation->store_outside_photo=$this->store_outside_photo?$this->store_outside_photo->store('store_outside_photo','public'):$this->store_outside_photo_url;
        $vendorInformation->store_stamp=$this->user_id;
        $vendorInformation->remark=$this->remark;
        $vendorInformation->save();
        session()->flash('success','Updated Successfully.');
        return  redirect()->route('list.vendor.information');
        
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->moduleAll=Modules::get();
        return view('livewire.vendor-information-edit')->layout('layouts.app');
    }
}