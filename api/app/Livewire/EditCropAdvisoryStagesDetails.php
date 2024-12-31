<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class EditCropAdvisoryStagesDetails extends Component
{
    use WithFileUploads,Toast;
    public $advisory_detail_id;
    
    public $uploadedImage;
    public $content;
    public $title;
    public $banner;
    public $existingBanner;
    protected $rules=[
        'content'=>'required',
        'title'=>'required',
        'banner' => 'nullable|image|max:2048',
    ];
    protected $listeners = ['contentUpdated'];

    public function contentUpdated($content)
    {
        //dd($content);
        $this->content = $content;
        
    }
    public function mount($advisory_detail_id){
        $this->advisory_detail_id=$advisory_detail_id;
        $advisory_details = \App\Models\CropAdvisoryDetails::find($this->advisory_detail_id);
        $this->content=$advisory_details->content;
        $this->title=$advisory_details->title;
        $this->existingBanner=$advisory_details->banner;
    }
    public function save(){
        $this->validate();
        $path = $this->banner ? $this->banner->store('banners', 'public') : $this->existingBanner;
        $advisory = \App\Models\CropAdvisoryDetails::find($this->advisory_detail_id);
        $advisory->title=$this->title;
        $advisory->banner=$path;
        $advisory->content=$this->content;
        $advisory->save();
        $this->success( 'Crop Advisory Stages Deatils Updated Successfully.');
    }
    public function render()
    {
        return view('livewire.edit-crop-advisory-stages-details')->layout('layouts.app');
    }
}
