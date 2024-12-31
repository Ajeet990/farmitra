<?php

namespace App\Livewire;

use App\Models\LegalDocuments;
use Livewire\Component;

class LegalDocumentsEdit extends Component
{
    public $legal_documents_id;
    public $name;
    public $description;
    public $sample;
    public function mount($legal_documents_id){
        $this->legal_documents_id=$legal_documents_id;
        $legalDocuments=LegalDocuments::find($legal_documents_id);
        $this->name=$legalDocuments->name;
        $this->description=$legalDocuments->description;
        $this->sample=$legalDocuments->sample;
    }
    public function update(){
      $legalDocuments=LegalDocuments::find($this->legal_documents_id);  
      $legalDocuments->name=$this->name;
      $legalDocuments->description=$this->description;
      $legalDocuments->sample=$this->sample;
      $legalDocuments->save();
      session()->flash('success','Updated Successfully!!');
      return redirect()->route('list.legal.documents');
    }
    public function render()
    {
        return view('livewire.legal-documents-edit')->layout('layouts.app');
    }
}