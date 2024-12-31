<?php

namespace App\Livewire;

use Livewire\Component;
use Mary\Traits\Toast;
class EditCropAdvisoryStages extends Component
{
    use Toast;
    public $crop_category;
    public $crop_sub_category;
    public $title;
    public $duration_title;
    public $from;
    public $to;

    public $stage_id;


    protected $rules=[
        'crop_category' => 'required|exists:farmitra_crops,id',
        'crop_sub_category' => 'required|exists:sub_crops,id',
        'title'=> 'required',
        'duration_title'=> 'required',
        'from'=> 'required',
        'to'=> 'required',
    ];
    public function mount($stage_id){
        $this->stage_id = $stage_id;
        $stage = \App\Models\CropAdvisory::find( $stage_id );

        $category = \App\Models\SubCrop::find($stage->crop_id);
        $this->crop_category = $category->farmitra_crop_id;
        $this->crop_sub_category = $stage->crop_id;
        $this->title = $stage->title;
        $this->duration_title = $stage->duration_title;
        $this->from = $stage->from;
        $this->to = $stage->to;
       

    }

    public function save(){
       
        $this->validate();
       $advisory = \App\Models\CropAdvisory::find( $this->stage_id );
       $advisory->crop_id = $this->crop_sub_category;
       $advisory->title = $this->title;
       $advisory->duration_title = $this->duration_title;
       $advisory->from = $this->from;
       $advisory->to = $this->to;
       $advisory->save();
       $this->success( 'Crop Advisory Stages Updated Successfully.');
    }
    public function render()
    {
        $crops = \App\Models\FarmitraCrop::all();
        $sub_crops=\App\Models\SubCrop::with('crop')->where('farmitra_crop_id',$this->crop_category)->get();
        return view('livewire.edit-crop-advisory-stages', compact('crops','sub_crops'))->layout('layouts.app');
    }
}
