<?php

namespace App\Livewire;

use App\Models\LegalDocuments;
use App\Models\User;
use App\Models\VendorDocument;
use Livewire\Component;
use Livewire\WithFileUploads;

class VendorDocumentsAdd extends Component
{
    use WithFileUploads;
    public $userAll;
    public $legalDocumentsAll;
    
    public $user_id;
    public $legal_document_id;
    public $document_number;
    public $document;
    public $is_resubmit;
    public $status;
    public $remark;
    
    public function store(){
        $vendorDocument=new VendorDocument();
        $vendorDocument->user_id=$this->user_id;
        $vendorDocument->legal_document_id=$this->legal_document_id;
        $vendorDocument->document_number=$this->document_number;
        $vendorDocument->document=$this->document->store("vendor_document","public");
        $vendorDocument->is_resubmit=$this->is_resubmit;
        $vendorDocument->status=$this->status;
        $vendorDocument->remark=$this->remark;
        $vendorDocument->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.vendor.documents');
        
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->legalDocumentsAll=LegalDocuments::get();
        return view('livewire.vendor-documents-add')->layout('layouts.app');
    }
}