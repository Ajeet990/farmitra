<?php

namespace App\Livewire;

use App\Models\AppAndWebFeatures;
use App\Models\User;
use App\Models\VendotAppAndWebFeatures;
use Livewire\Component;

class VendotAppAndwebFeaturesEdit extends Component
{
    public $userAll;
    public $appAndWebFeature;
    public $app_and_web_features_id;
    public $user_id;
    public $vendot_app_web_feature_id;
    public function mount($vendot_app_web_feature_id){
        $this->vendot_app_web_feature_id=$vendot_app_web_feature_id;
        $vendotAppWebFeature=VendotAppAndWebFeatures::find($vendot_app_web_feature_id);
        $this->user_id=$vendotAppWebFeature->user_id;
        $this->app_and_web_features_id=$vendotAppWebFeature->app_and_web_features_id;
        
    }
    
    public function update(){
        $vendotAppWebFeature=VendotAppAndWebFeatures::find($this->vendot_app_web_feature_id);
        $vendotAppWebFeature->user_id=$this->user_id;
        $vendotAppWebFeature->app_and_web_features_id=$this->app_and_web_features_id;
        $vendotAppWebFeature->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.vendot.app.web.feature');
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->appAndWebFeature=AppAndWebFeatures::get();
        return view('livewire.vendot-app-andweb-features-edit')->layout('layouts.app');
    }
}