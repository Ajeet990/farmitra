<?php

namespace App\Livewire;

use Livewire\Component;

class AdminProductList extends Component
{
    public function render()
    {
        return view('livewire.admin-product-list')->layout('layouts.app');
    }
}
