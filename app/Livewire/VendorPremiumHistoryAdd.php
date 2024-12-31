<?php

namespace App\Livewire;

use App\Models\PremiumPackage;
use App\Models\User;
use App\Models\VendorPremiumHistory;
use Livewire\Component;

class VendorPremiumHistoryAdd extends Component
{
    public $userAll;
    public $premiumPackageAll;
    public $user_id;
    public $premium_package_id;
    public $expired;
    public $expired_on;
    public $remark;
    public function store(){
        $vendorPremiumHistory=new VendorPremiumHistory();
        $vendorPremiumHistory->user_id=$this->user_id;
        $vendorPremiumHistory->premium_package_id=$this->premium_package_id;
        $vendorPremiumHistory->expired=$this->expired;
        $vendorPremiumHistory->expired_on=$this->expired_on;
        $vendorPremiumHistory->remark=$this->remark;
        $vendorPremiumHistory->save();
        session()->flash('success','Created Successfully.');
        return  redirect()->route('list.vendor.premium.history');
        
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->premiumPackageAll=PremiumPackage::get();
        return view('livewire.vendor-premium-history-add')->layout('layouts.app');
    }
}