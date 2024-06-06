<?php

namespace App\Livewire;

use Akaunting\Apexcharts\Chart;
use Livewire\Component;

class DemoChart extends Component
{
    public function render()
    {
        $chart = (new Chart)->setType('donut')
            ->setWidth('100%')
            ->setHeight(300)
            ->setLabels(['Sales', 'Deposit'])
            ->setDataset('Income by Category', 'donut', [1907, 1923]);
        return view('livewire.demo-chart',compact('chart'));
    }
}
