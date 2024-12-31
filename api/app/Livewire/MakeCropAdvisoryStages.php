<?php

namespace App\Livewire;

use Livewire\Component;
use Mary\Traits\Toast;

class MakeCropAdvisoryStages extends Component
{
    use Toast;
    public $crop_category;
    public $crop_sub_category;
    public $title;
    public $duration_title;
    public $from;
    public $to;

    protected $rules=[
        'crop_category' => 'required|exists:farmitra_crops,id',
        'crop_sub_category' => 'required|exists:sub_crops,id',
        'title'=> 'required',
        'duration_title'=> 'required',
        'from'=> 'required',
        'to'=> 'required',
    ];

    public function save(){
        $this->validate();
       $timeline = new \App\Models\CropAdvisory();
       $timeline->crop_id = $this->crop_sub_category;
       $timeline->title = $this->title;
       $timeline->duration_title = $this->duration_title;
       $timeline->from = $this->from;
       $timeline->to = $this->to;
       $timeline->save();
       $this->success( 'Crop Advisory Stages created successfully.');
   }
   public function delete($id)
   {
       \App\Models\CropAdvisory::find($id)->delete();
       $this->success('Crop Advisory Stages deleted successfully.');
   }
    public function render()
    {
        $crops = \App\Models\FarmitraCrop::all();
        $sub_crops=\App\Models\SubCrop::with('crop')->where('farmitra_crop_id',$this->crop_category)->get();

        $crop_advisories = \App\Models\CropAdvisory::where('crop_id',$this->crop_sub_category)->with('crop')->paginate();
        return view('livewire.make-crop-advisory-stages',data: compact('crops','sub_crops','crop_advisories'))->layout('layouts.app');
    }
}
