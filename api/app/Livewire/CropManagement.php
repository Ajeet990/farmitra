<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FarmitraCrop;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class CropManagement extends Component
{
    use WithFileUploads,WithPagination,Toast;
    public $cropId; // Current crop for edit or show
    public $name, $banner, $season, $soil_type, $seed_type, $region, $water_requirement;

    public $isEditMode = false; // Track edit mode

    protected $rules = [
        'name' => 'required|string|max:255',
        'banner' => 'nullable|image|max:2048',
        'season' => 'nullable|string|max:50',
        'soil_type' => 'nullable|string|max:100',
        'seed_type' => 'nullable|string|max:100',
        'region' => 'nullable|string|max:255',
        'water_requirement' => 'nullable|numeric|min:0',
    ];

    public function mount()
    {
        
    }
   

    

    public function save()
    {
        $this->validate();
        $path = $this->banner ? $this->banner->store('banners', 'public') : null;
        FarmitraCrop::updateOrCreate(
            ['id' => $this->cropId],
            [
                'name' => $this->name,
                'banner' => $path,
                'season' => $this->season,
                'soil_type' => $this->soil_type,
                'seed_type' => $this->seed_type,
                'region' => $this->region,
                'water_requirement' => $this->water_requirement,
            ]
        );

        $this->success( 'Crop created successfully.');
    }

    public function delete($id)
    {
        FarmitraCrop::find($id)->delete();
        $this->success('Crop deleted successfully.');
        //session()->flash('message', 'Crop deleted successfully.');
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->cropId = null;
        $this->name = '';
        $this->banner = '';
        $this->season = '';
        $this->soil_type = '';
        $this->seed_type = '';
        $this->region = '';
        $this->water_requirement = '';
    }

    public function render()
    {
        $crops=FarmitraCrop::paginate(5);
        return view('livewire.crop-management',compact('crops'))->layout('layouts.app');
    }
}
