<?php

namespace App\Livewire;

use App\Models\Modules;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class ModuleEdit extends Component
{
    use WithFileUploads;
    #[Rule('required|min:3|max:50')]
    public $name;
    public $description;
    public $icon;
    public $is_active=1;
    public $module_id;
    public $iconurl;
    public function mount($module_id){
        $this->module_id=$module_id;
        $moduleGet=Modules::find($this->module_id);
        $this->name=$moduleGet->name;
        $this->description=$moduleGet->description;
        $this->iconurl=$moduleGet->icon;
        $this->is_active=$moduleGet->is_active;
      
        
    }
    public function update(){
        //dd($this->icon->store(path: 'module_icon'));
        $this->validate();
        $category=Modules::find($this->module_id);
        $category->name=$this->name;
        $category->description=$this->description;
        $category->icon=$this->icon?$this->icon->store('module_icon','public'):$this->iconurl;
        $category->is_active=$this->is_active;
        $category->save();
        session()->flash('success','Updated Successfully.');
       return  redirect()->route('list.module');
    }
    public function render()
    {
        return view('livewire.module-edit')->layout('layouts.app');;
    }
}