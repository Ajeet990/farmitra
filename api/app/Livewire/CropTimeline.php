<?php

namespace App\Livewire;

use App\Models\CropTimeline as ModelsCropTimeline;
use App\Models\FarmitraCrop;
use App\Models\SubCrop;
use Livewire\Component;
use Mary\Traits\Toast;

class CropTimeline extends Component
{
    use Toast;
    public $crop_category;
    public $crop_sub_category;
    public $name;

    protected $rules = [
        'crop_category' => 'required|exists:farmitra_crops,id',
        'crop_sub_category' => 'required|exists:sub_crops,id',
        'name'=> 'required',
    ];

    public function save(){
         $this->validate();
        $timeline = new \App\Models\CropTimeline();
        $timeline->crop_id = $this->crop_sub_category;
        $timeline->name = $this->name;
        $timeline->save();
        $this->success( 'Crop created successfully.');
    }
    public function delete($id)
    {
        \App\Models\CropTimeline::find($id)->delete();
        $this->success('Crop Timeline deleted successfully.');
    }
    public function render()
    {
        $crops = FarmitraCrop::all();
        $sub_crops=SubCrop::with('crop')->where('farmitra_crop_id',$this->crop_category)->get();
        $timelines = ModelsCropTimeline::with('crop')->where('crop_id',$this->crop_sub_category)->paginate();
        return view('livewire.crop-timeline',compact('crops','sub_crops','timelines'))->layout('layouts.app');
    }
}
