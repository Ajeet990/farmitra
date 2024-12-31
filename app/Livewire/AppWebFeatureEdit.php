<?php

namespace App\Livewire;

use App\Models\AppAndWebFeatures;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppWebFeatureEdit extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $icon;
    public $is_active;
    public $available_non_premium;
    public $iconurl;
    public $app_web_feature_id;
    public function mount($app_web_feature_id){
        $this->app_web_feature_id=$app_web_feature_id;
        $appWebFeatureGet=AppAndWebFeatures::find($app_web_feature_id);
        $this->name=$appWebFeatureGet->name;
        $this->description=$appWebFeatureGet->description;
        $this->iconurl=$appWebFeatureGet->icon;
        $this->is_active=$appWebFeatureGet->is_active;
        $this->available_non_premium=$appWebFeatureGet->available_non_premium;
        
    }
    public function update(){
        $appWebFeature=AppAndWebFeatures::find($this->app_web_feature_id);
        $appWebFeature->name=$this->name;
        $appWebFeature->description=$this->description;
        $appWebFeature->icon=$this->icon?$this->icon->store('app_web_feature_icon','public'):$this->iconurl;
        $appWebFeature->is_active=$this->is_active;
        $appWebFeature->available_non_premium=$this->available_non_premium;
        $appWebFeature->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route("list.app.web.feature");
        
    }
    public function render()
    {
        return view('livewire.app-web-feature-edit')->layout('layouts.app');
    }
}