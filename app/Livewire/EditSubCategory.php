<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditSubCategory extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $icon;
    public $subCatId;
    public $iconPath;
    public $status = 1;

    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',

    ];
    public function mount($params)
    {
        $data = SubCategory::find($params['id']);
        $this->category_id = $data->category_id;
        $this->subCatId = $data->id;
        $this->name = $data->name;
        $this->iconPath = $data->icon;
        $this->status = $data->status;
    }



    public function submit()
    {
        $this->validate();

        if ($this->icon) {
            if ($this->iconPath && Storage::exists($this->iconPath)) {
                Storage::delete($this->iconPath);
            }
            $this->iconPath = $this->icon->store('sub_category');
        }
        $data =  SubCategory::find($this->subCatId);
        $data->category_id = $this->category_id;
        $data->name = $this->name;
        $data->icon = $this->iconPath;
        $data->status = $this->status;
        $data->slug = Str::slug($this->name);
        $data->save();
        $this->dispatch('closeDrawer');
        $this->dispatch('updatedSubCategory');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.edit-sub-category', compact('categories'));
    }
}
