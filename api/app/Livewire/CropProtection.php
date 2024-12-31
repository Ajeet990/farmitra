<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class CropProtection extends Component
{
    use WithFileUploads,Toast;
    public $crop_category;
    public $crop_sub_category;
    public $title;
    public $banner;  // Notice `*` syntax for validate each file
    public array $banners = [];
    public $content;
    public $audio;
    public $video;
    
    protected $listeners = ['contentUpdated'];
    public function contentUpdated($content)
    {
        $this->content = $content;
    }
    protected $rules=[
        'crop_category' => 'required|exists:farmitra_crops,id',
        'crop_sub_category' => 'required|exists:sub_crops,id',
        'title'=>'required',
        'banner'=>'required|image|max:2048',
        'content'=>'required',
    ];

    public function save(){
        
        $this->validate();
        
        $path = $this->banner ? $this->banner->store('banners', 'public') : null;
        $crop_protection= new \App\Models\CropProtection();
        $crop_protection->crop_id=$this->crop_sub_category;
        $crop_protection->title=$this->title;
        $crop_protection->banner=$path;
        $crop_protection->banners=json_encode($path);
        $crop_protection->content=$this->content;
        $crop_protection->audio=$this->audio;
        $crop_protection->video=$this->video;
        $crop_protection->save();
        $this->success('Crop Protection Successfully Created');
        
    }

    public function delete($id)
   {
       \App\Models\CropProtection::find($id)->delete();
       $this->success('Crop Protection deleted successfully.');
   }
    public function render()
    {
        $crops = \App\Models\FarmitraCrop::all();
        $sub_crops=\App\Models\SubCrop::with('crop')->where('farmitra_crop_id',$this->crop_category)->get();
        $crop_protection= $this->crop_sub_category?\App\Models\CropProtection::where('crop_id',$this->crop_sub_category)->with('crop')->paginate():\App\Models\CropProtection::with('crop')->paginate();
        return view('livewire.crop-protection',compact('crops','sub_crops','crop_protection'))->layout('layouts.app');
    }
}
