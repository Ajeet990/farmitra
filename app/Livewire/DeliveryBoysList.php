<?php

namespace App\Livewire;

use Livewire\Component;

class DeliveryBoysList extends Component
{
    public function render()
    {
        return view('livewire.delivery-boys-list')->layout('layouts.app');
    }
}
