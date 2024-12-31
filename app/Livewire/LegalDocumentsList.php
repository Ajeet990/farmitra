<?php

namespace App\Livewire;

use App\Models\LegalDocuments;
use Livewire\Component;
use Livewire\WithPagination;

class LegalDocumentsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $legalDocuments;
    public function delete($id){
        LegalDocuments::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }
    public function render()
    {
        $legalDocuments=LegalDocuments::where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })
        ->paginate($this->perPage);
        return view('livewire.legal-documents-list',compact('legalDocuments'))->layout('layouts.app');
    }
}