<?php

namespace App\Livewire;

use Livewire\Component;

class ExpertManagement extends Component
{
    public $name,$email,$mobile,$password;
    public function render()
    {
        return view('livewire.expert-management')->layout('layouts.app');
    }
}
