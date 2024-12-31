<?php


namespace App\Livewire;

use App\Models\FarmitraCrop;
use App\Models\SubCrop as ModelsSubCrop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class EditSubCrop extends Component
{
    use WithFileUploads,Toast,WithPagination;
    public $name, $banner,$crop_category,$existingBanner,$cropId;
    protected $rules = [
        'crop_category'=>'required|exists:farmitra_crops,id',
        'name' => 'required|string|max:255',
        'banner' => 'nullable|image|max:2048'
    ];
    public function mount($cropId)
    {
        // Load the crop data by ID to edit
        $crop = ModelsSubCrop::findOrFail($cropId);


        // Pre-fill the form with existing data
        $this->name = $crop->name;
        $this->crop_category = $crop->farmitra_crop_id;
        $this->existingBanner = $crop->banner;
    }
    public function save()
    {
        $this->validate();
        $bannerPath = $this->existingBanner; // Default to existing banner
        if ($this->banner) {
            // If a new banner is uploaded, store it and replace the old one
            $bannerPath = $this->banner->store('banners', 'public');
        }
        ModelsSubCrop::where('id',$this->cropId)->update(
            [
                'farmitra_crop_id'=>$this->crop_category,
                'name' => $this->name,
                'banner' => $bannerPath,
            ]
        );

        $this->success( 'Crop Updated successfully.');
    }
    public function render()
    {
        $crops = FarmitraCrop::all();
        return view('livewire.edit-sub-crop',compact('crops'))->layout('layouts.app');
    }
}
