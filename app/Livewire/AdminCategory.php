<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategory extends Component
{
    use WithFileUploads;

    public $search;








    public function delete($id)
    {
        $data = Category::find($id);
        if ($data->icon && Storage::exists($data->icon)) {
            Storage::delete($data->icon);
        }
        $data->delete();
        $this->dispatch('updated');
    }




    #[On('updatedCategory')]
    public function render()
    {
        $query = Category::query();
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        $categories = $query->paginate(5);
        return view('livewire.admin-category', compact('categories'))->layout('layouts.app');
    }
}
