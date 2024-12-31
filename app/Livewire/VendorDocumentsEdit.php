<?php

namespace App\Livewire;

use App\Models\LegalDocuments;
use App\Models\User;
use App\Models\VendorDocument;
use Livewire\Component;
use Livewire\WithFileUploads;

class VendorDocumentsEdit extends Component
{
    use WithFileUploads;
    public $userAll;
    public $legalDocumentsAll;

    public $user_id;
    public $legal_document_id;
    public $document_number;
    public $document;
    public $document_url;
    public $is_resubmit;
    public $status;
    public $remark;
    public $vendor_documents_id;
    
    public function mount($vendor_documents_id){
        $this->vendor_documents_id=$vendor_documents_id;
        $vendorDocument=VendorDocument::find($vendor_documents_id);
        $this->user_id=$vendorDocument->user_id;
        $this->legal_document_id=$vendorDocument->legal_document_id;
        $this->document_number=$vendorDocument->document_number;
        $this->document_url=$vendorDocument->document;
        $this->is_resubmit=$vendorDocument->is_resubmit;
        $this->status=$vendorDocument->status;
        $this->remark=$vendorDocument->remark;
        
    }
    public function update(){
        $vendorDocument=VendorDocument::find($this->vendor_documents_id);
        $vendorDocument->user_id=$this->user_id;
        $vendorDocument->legal_document_id=$this->legal_document_id;
        $vendorDocument->document_number=$this->document_number;
        $vendorDocument->document=$this->document?$this->document->store("vendor_document","public"):$this->document_url;
        $vendorDocument->is_resubmit=$this->is_resubmit;
        $vendorDocument->status=$this->status;
        $vendorDocument->remark=$this->remark;
        $vendorDocument->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.vendor.documents');
        
    }
    public function render()
    {
        $this->userAll=User::get();
        $this->legalDocumentsAll=LegalDocuments::get();
        return view('livewire.vendor-documents-edit')->layout('layouts.app');
    }
}