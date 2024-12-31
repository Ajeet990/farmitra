<?php

namespace App\Livewire;

use Livewire\Component;

class PostFeedManagement extends Component
{
    public function render()
    {
        return view('livewire.post-feed-management')->layout('layouts.app');
    }
}
