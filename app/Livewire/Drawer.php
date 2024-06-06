<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Drawer extends Component
{
    public $alias;
    public $component;
    public $params = null;

    public function mount()
    {
    }


    #[On('openDrawer')]
    public function openDrawer($event)
    {
        $this->component = $event['component'];
        $this->params = $event['params'];
        $this->dispatch('updatedEdit');
        // dd($this->component);
    }
    #[On('closeDrawer')]
    public function closeDrawer()
    {
        $this->component = null;
        $this->params = null;
    }


    public function render()
    {
        return view('livewire.drawer');
    }
}
