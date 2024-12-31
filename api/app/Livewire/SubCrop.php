<?php

namespace App\Livewire;

use App\Models\FarmitraCrop;
use App\Models\SubCrop as ModelsSubCrop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class SubCrop extends Component
{
    use WithFileUploads,Toast,WithPagination;
    public $name, $banner,$crop_category;
    protected $rules = [
        'crop_category'=>'required|exists:farmitra_crops,id',
        'name' => 'required|string|max:255',
        'banner' => 'nullable|image|max:2048'
    ];
    public function save()
    {
        $this->validate();
        $path = $this->banner ? $this->banner->store('banners', 'public') : null;
        ModelsSubCrop::create(
            [
                'farmitra_crop_id'=>$this->crop_category,
                'name' => $this->name,
                'banner' => $path,
            ]
        );

        $this->success( 'Crop created successfully.');
    }
    public function delete($id)
    {
        ModelsSubCrop::find($id)->delete();
        $this->success('Crop deleted successfully.');
        //session()->flash('message', 'Crop deleted successfully.');
        $this->resetPage();
    }
    public function render()
    {
        $crops = FarmitraCrop::all();
        $sub_crops=$this->crop_category?ModelsSubCrop::with('crop','timelines','advisory','protection')->where('farmitra_crop_id',$this->crop_category)->paginate(50):ModelsSubCrop::with('crop','timelines','advisory','protection')->paginate(50);
        //dd($sub_crops);
        return view('livewire.sub-crop',compact('crops','sub_crops'))->layout('layouts.app');
    }
}
