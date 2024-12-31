<?php

namespace App\Livewire;

use App\Models\DeliveryVehicleDetails;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryVehicleDetailList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $deliveryVehicleDetails;
    public function delete($id){
        DeliveryVehicleDetails::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function render()
    {
        $deliveryVehicleDetails=DeliveryVehicleDetails::where(function ($query) {
            $query->where('vehicle_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('type', 'LIKE', '%' . $this->search . '%');
              
        })
        ->paginate($this->perPage);
        return view('livewire.delivery-vehicle-detail-list',compact('deliveryVehicleDetails'))->layout("layouts.app");
    }
}