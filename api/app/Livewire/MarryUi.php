<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class MarryUi extends Component
{
    public $selectedTab='users-tab';  
    public bool $myModal1 = false;
    
    public function render()
    {
        return view('livewire.marry-ui');
    }
}
