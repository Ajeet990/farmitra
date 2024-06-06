<?php

namespace App\Livewire;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Brands extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $search;
    public $imagePath;
    public $desc;
    public $update = false;


    public $status = 1;
    public $brandId;
    protected $rules = [
        'title' => 'required',

    ];


    public function delete($id)
    {
        $data = Brand::find($id);
        if ($data->image && Storage::exists($data->image)) {
            Storage::delete($data->image);
        }
        $data->delete();

        $this->dispatch('updated');
    }

    #[On('updatedBrand')]
    public function render()
    {
        $query = Brand::query();
        if ($this->search) {
            $brands = $query->where('name', 'like', '%' . $this->search . '%');
        }
        $brands = $query->orderBy('id', 'desc')->paginate(10);
        // dd($brands);
        return view('livewire.brands', compact('brands'))->layout('layouts.app');
    }
}
