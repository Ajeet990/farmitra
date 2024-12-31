<?php

namespace App\Livewire;

use App\Models\CropAdvisoryDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class MakeCropAdvisoryStagesDetails extends Component
{
    use WithFileUploads,Toast;
    public $uploadedImage;
    public $stage_id;
    public $content;
    public $title;
    public $banner;
    public function mount($stage_id){
        $this->stage_id = $stage_id;
    }

    protected $listeners = ['contentUpdated'];

    public function contentUpdated($content)
    {
        //dd($content);
        $this->content = $content;
        
    }
    protected $rules=[
        'content'=>'required',
        'title'=>'required',
        'banner' => 'required|image|max:2048',
    ];
    public function save(){
        $this->validate();
        $path = $this->banner ? $this->banner->store('banners', 'public') : null;
        $advisory = new \App\Models\CropAdvisoryDetails();
        $advisory->crop_advisory_id=$this->stage_id;
        $advisory->title=$this->title;
        $advisory->banner=$path;
        $advisory->content=$this->content;
        $advisory->save();
        $this->success( 'Crop Advisory Stages Deatils created successfully.');
        

    }

    public function delete($id)
    {
        \App\Models\CropAdvisoryDetails::find($id)->delete();
        $this->success('Crop Advisory Stages Details deleted successfully.');
    }
    public function render()
    {
        $details = CropAdvisoryDetails::where('crop_advisory_id',$this->stage_id)->get();
        return view('livewire.make-crop-advisory-stages-details',compact('details'))->layout('layouts.app');
    }
}
