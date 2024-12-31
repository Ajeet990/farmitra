<?php

namespace App\Livewire;

use App\Models\NatureOfBusiness;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NatureOfBusinessEdit extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required|min:3|max:50')]
    public $description;
    public $nature_id;
    
    public function mount($nature_id){
        $this->nature_id=$nature_id;
        $natureGet=NatureOfBusiness::find($this->nature_id);
        $this->name=$natureGet->name;
        $this->description=$natureGet->description;
       
    }
    
    public function update(){
        $this->validate();
      $nature=NatureOfBusiness::find($this->nature_id);
      $nature->name=$this->name;
      $nature->description=$this->description;
      $nature->save();
      session()->flash('success','Created Successfully.');
      return  redirect()->route('list.natureOfBusiness');
    }
    public function render()
    {
        return view('livewire.nature-of-business-edit')->layout('layouts.app');
    }
}