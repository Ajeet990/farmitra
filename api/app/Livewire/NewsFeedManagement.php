<?php

namespace App\Livewire;

use Livewire\Component;

class NewsFeedManagement extends Component
{
    public function render()
    {
        return view('livewire.news-feed-management')->layout('layouts.app');
    }
}
