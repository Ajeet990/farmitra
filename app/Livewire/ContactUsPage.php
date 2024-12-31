<?php

namespace App\Livewire;

use Livewire\Component;

class ContactUsPage extends Component
{
    public function render()
    {
        return view('livewire.contact-us-page')->layout('layouts.guest');
    }
}
