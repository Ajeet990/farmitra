<?php

namespace App\Livewire;

use App\Models\NatureOfBusiness;
use Livewire\Component;
use Livewire\Attributes\Rule;

class NatureOfBusinessAdd extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;
    #[Rule('required|min:3|max:50')]
    public $description;
    public function store(){
        $this->validate();
      $nature=new NatureOfBusiness();
      $nature->name=$this->name;
      $nature->description=$this->description;
      $nature->save();
      session()->flash('success','Created Successfully.');
      return  redirect()->route('list.natureOfBusiness');
    }
    public function render()
    {
        return view('livewire.nature-of-business-add')->layout('layouts.app');
    }
}