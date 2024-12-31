<?php

namespace App\Livewire;

use App\Models\LegalDocuments;
use Livewire\Component;

class LegalDocumentsAdd extends Component
{
    public $name;
    public $description;
    public $sample;
    public function store(){
       // dd("kkllk");
        $legalDocuments=new LegalDocuments();
        $legalDocuments->name=$this->name;
        $legalDocuments->description=$this->description;
        $legalDocuments->sample=$this->sample;
        $legalDocuments->save();
        session()->flash('success','Created Sucessfully!!');
        return redirect()->route('list.legal.documents');
    }
    public function render()
    {
        return view('livewire.legal-documents-add')->layout('layouts.app');
    }
}