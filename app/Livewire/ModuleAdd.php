<?php

namespace App\Livewire;

use App\Models\Modules;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class ModuleAdd extends Component
{
    use WithFileUploads;
    #[Rule('required|min:3|max:50')]
    public $name;
    public $description;
    public $icon;
    public $is_active=1;
    
    public function store(){
        $this->validate();
        $module=new Modules();
        $module->name=$this->name;
        $module->description=$this->description;
        $module->icon=$this->icon->store( 'module_icon','public');
        $module->is_active=$this->is_active;
        $module->save();
        session()->flash('success','Created Successfully.');
       return  redirect()->route('list.module');
    }
    
    public function render()
    {
        return view('livewire.module-add')->layout('layouts.app');
    }
    
}