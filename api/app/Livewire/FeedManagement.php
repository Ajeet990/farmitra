<?php

namespace App\Livewire;

use Livewire\Component;

class FeedManagement extends Component
{
    public $selectedTab='users-tab';
    public function render()
    {
        return view('livewire.feed-management')->layout('layouts.app');
    }
}
