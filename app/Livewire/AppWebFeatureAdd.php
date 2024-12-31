<?php

namespace App\Livewire;

use App\Models\AppAndWebFeatures;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppWebFeatureAdd extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $icon;
    public $is_active;
    public $available_non_premium;
    public function store(){
        $appWebFeature=new AppAndWebFeatures();
        $appWebFeature->name=$this->name;
        $appWebFeature->description=$this->description;
        $appWebFeature->icon=$this->icon->store('app_web_feature_icon','public');
        $appWebFeature->is_active=$this->is_active;
        $appWebFeature->available_non_premium=$this->available_non_premium;
        $appWebFeature->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route("list.app.web.feature");
        
    }
    
    public function render()
    {
        return view('livewire.app-web-feature-add')->layout('layouts.app');
    }
}