<?php

namespace App\Livewire;

use App\Models\VendorDocument;
use Livewire\Component;

class VendorDocumentsList extends Component
{
    public $vendorDocuments;
    
    public function delete($id){
        VendorDocument::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully!');
         
    }
    public function render()
    {
        $this->vendorDocuments=VendorDocument::with('users','legalDocuments')->get();
        return view('livewire.vendor-documents-list')->layout('layouts.app');
    }
}