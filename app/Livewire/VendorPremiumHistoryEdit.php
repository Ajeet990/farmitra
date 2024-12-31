<?php

namespace App\Livewire;

use App\Models\PremiumPackage;
use App\Models\User;
use App\Models\VendorPremiumHistory;
use Livewire\Component;

class VendorPremiumHistoryEdit extends Component
{
    public $userAll;
    public $premiumPackageAll;
    public $user_id;
    public $premium_package_id;
    public $expired;
    public $expired_on;
    public $remark;
    public $vendor_premium_history_id;
    
    public function mount($vendor_premium_history_id){
        $this->vendor_premium_history_id=$vendor_premium_history_id;
        $vendorPremiumHistory=VendorPremiumHistory::find($vendor_premium_history_id);
        $this->user_id=$vendorPremiumHistory->user_id;
        $this->premium_package_id=$vendorPremiumHistory->premium_package_id;
        $this->expired=$vendorPremiumHistory->expired;
        $this->expired_on=$vendorPremiumHistory->expired_on;
        $this->remark=$vendorPremiumHistory->remark;
    }
    public function update(){
        $vendorPremiumHistory=VendorPremiumHistory::find($this->vendor_premium_history_id);
        $vendorPremiumHistory->user_id=$this->user_id;
        $vendorPremiumHistory->premium_package_id=$this->premium_package_id;
        $vendorPremiumHistory->expired=$this->expired;
        $vendorPremiumHistory->expired_on=$this->expired_on;
        $vendorPremiumHistory->remark=$this->remark;
        $vendorPremiumHistory->save();
        session()->flash('success','Updated Successfully.');
        return  redirect()->route('list.vendor.premium.history');
        
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->premiumPackageAll=PremiumPackage::get();
        return view('livewire.vendor-premium-history-edit')->layout('layouts.app');
    }
}