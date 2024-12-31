<?php

namespace App\Livewire;

use App\Models\VendorBankAccount;
use Livewire\Component;
use Livewire\WithPagination;

class VendorBankAccountList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
   // public $vendorBankAccount;
    public function delete($id){
        vendorBankAccount::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
    }
    public function render()
    {
        $vendorBankAccount=vendorBankAccount::with('users')->where(function ($query) {
            $query->where('bank_name', 'LIKE', '%' . $this->search . '%')
                
                ->orWhereHas('users', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        return view('livewire.vendor-bank-account-list',compact('vendorBankAccount'))->layout('layouts.app');
    }
}