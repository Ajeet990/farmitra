<?php

namespace App\Livewire;

use App\Models\AppAndWebFeatures;
use App\Models\User;
use App\Models\VendotAppAndWebFeatures;
use Livewire\Component;

class VendotAppAndwebFeaturesAdd extends Component
{
    public $userAll;
    public $appAndWebFeature;
    public $app_and_web_features_id;
    public $user_id;
    public function store(){
        $vendotAppWebFeature=new VendotAppAndWebFeatures();
        $vendotAppWebFeature->user_id=$this->user_id;
        $vendotAppWebFeature->app_and_web_features_id=$this->app_and_web_features_id;
        $vendotAppWebFeature->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.vendot.app.web.feature');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->appAndWebFeature=AppAndWebFeatures::get();
        return view('livewire.vendot-app-andweb-features-add')->layout('layouts.app');
    }
}