<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Loader extends Component
{
    public $open=false;

    #[On('loaderShow')]
    public function open(){
        $this->open=true;
    }
    #[On('loaderHide')]
    public function loaderHide(){
        $this->open=false;
    }
    public function render()
    {
        return view('livewire.loader');
    }
}
