<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSubCategory extends Component
{

    public $search;


    public function delete($id)
    {
        $data = SubCategory::find($id);
        if ($data->icon && Storage::exists($data->icon)) {
            Storage::delete($data->icon);
        }
        $data->delete();

        $this->dispatch('updatedSubCategory');
    }

    #[On('updatedSubCategory')]

    public function render()
    {
        $query = Category::query();
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        $categoryList = $query->paginate(5);        // dd($categoryList);
        return view('livewire.admin-sub-category', compact('categoryList'))->layout('layouts.app');
    }
}
