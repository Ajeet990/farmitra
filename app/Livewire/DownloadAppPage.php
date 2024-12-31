<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadAppPage extends Component
{
    public function render()
    {
        return view('livewire.download-app-page')->layout('layouts.guest');
    }
}
