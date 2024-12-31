<?php

namespace App\Livewire;

use App\Models\PremiumPackage;
use Livewire\Component;

class PremiumPackageEdit extends Component
{
    public $name;
    public $description;
    public $amount;
    public $days;
    public $premium_package_id;
    public function mount($premium_package_id){
        $this->premium_package_id=$premium_package_id;
        $premium_package=PremiumPackage::find($premium_package_id);
        $this->name=$premium_package->name;
        $this->description=$premium_package->description;
        $this->amount=$premium_package->amount;
        $this->days=$premium_package->days;
        
    }
    public function update(){
        $premiumPackage=PremiumPackage::find($this->premium_package_id);
        $premiumPackage->name=$this->name;
        $premiumPackage->description=$this->description;
        $premiumPackage->amount=$this->amount;
        $premiumPackage->days=$this->days;
        $premiumPackage->save();
        session()->flash('success','Updated successfully.');
        return redirect()->route('list.premium.package');
        
    }
    public function render()
    {
        return view('livewire.premium-package-edit')->layout('layouts.app');
    }
}