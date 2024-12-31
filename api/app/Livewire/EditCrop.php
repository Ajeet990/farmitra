<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FarmitraCrop;
use Mary\Traits\Toast;

class EditCrop extends Component
{
    use WithFileUploads,Toast;

    public $crop;
    public $name;
    public $season;
    public $soil_type;
    public $seed_type;
    public $region;
    public $water_requirement;
    public $banner; // File upload for banner

    // Set up the validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'season' => 'required|string',
        'soil_type' => 'required|string',
        'seed_type' => 'required|string',
        'region' => 'required|string',
        'water_requirement' => 'nullable|numeric',
        'banner' => 'nullable|image|max:2048', // Validate image file
    ];

    public function mount($cropId)
    {
        // Load the crop data by ID to edit
        $this->crop = FarmitraCrop::findOrFail($cropId);

        // Pre-fill the form with existing data
        $this->name = $this->crop->name;
        $this->season = $this->crop->season;
        $this->soil_type = $this->crop->soil_type;
        $this->seed_type = $this->crop->seed_type;
        $this->region = $this->crop->region;
        $this->water_requirement = $this->crop->water_requirement;
    }

    public function save()
    {
        // Validate the input
        $this->validate();

        // If a new banner image is uploaded, store it
        $bannerPath = $this->banner ? $this->banner->store('banners', 'public') : $this->crop->banner;

        // Update the crop record
        $this->crop->update([
            'name' => $this->name,
            'season' => $this->season,
            'soil_type' => $this->soil_type,
            'seed_type' => $this->seed_type,
            'region' => $this->region,
            'water_requirement' => $this->water_requirement,
            'banner' => $bannerPath, // Only update banner if new one is uploaded
        ]);

        $this->success( 'Crop updated successfully!');
    }

    public function render()
    {
        return view('livewire.edit-crop')->layout('layouts.app');
    }
}
