<?php

namespace App\Livewire;

use App\Models\PremiumPackage;
use Livewire\Component;

class PremiumPackageAdd extends Component
{
    public $name;
    public $description;
    public $amount;
    public $days;
    public function store(){
        
        $premiumPackage=new PremiumPackage();
        $premiumPackage->name=$this->name;
        $premiumPackage->description=$this->description;
        $premiumPackage->amount=$this->amount;
        $premiumPackage->days=$this->days;
        $premiumPackage->save();
        session()->flash('success','Created successfully.');
        return redirect()->route('list.premium.package');
        
    }
    public function render()
    {
        return view('livewire.premium-package-add')->layout('layouts.app');
    }
}