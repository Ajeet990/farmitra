<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\VendorBankAccount;
use Livewire\Component;

class VendorBankAccountEdit extends Component
{
    public $userAll;
    public $user_id;
    public $bank_name;
    public $account_number;
    public $account_holder_name;
    public $swift_code;
    public $ifsc;
    public $upi_id;
    public $is_default;
    public $vendor_bank_account_id;
    public function mount($vendor_bank_account_id){
        $this->vendor_bank_account_id=$vendor_bank_account_id;
        $venderBankAccountGet=VendorBankAccount::find($vendor_bank_account_id);
        $this->user_id=$venderBankAccountGet->user_id;
        $this->bank_name=$venderBankAccountGet->bank_name;
        $this->account_number=$venderBankAccountGet->account_number;
        $this->account_holder_name=$venderBankAccountGet->account_holder_name;
        $this->swift_code=$venderBankAccountGet->swift_code;
        $this->ifsc=$venderBankAccountGet->ifsc;
        $this->upi_id=$venderBankAccountGet->upi_id;
        $this->is_default=$venderBankAccountGet->is_default;
    }
    
    public function update(){
        $vendorBankAccount=VendorBankAccount::find($this->vendor_bank_account_id);
        $vendorBankAccount->user_id=$this->user_id;
        $vendorBankAccount->bank_name=$this->bank_name;
        $vendorBankAccount->account_number=$this->account_number;
        $vendorBankAccount->account_holder_name=$this->account_holder_name;
        $vendorBankAccount->swift_code=$this->swift_code;
        $vendorBankAccount->ifsc=$this->ifsc;
        $vendorBankAccount->upi_id=$this->upi_id;
        $vendorBankAccount->is_default=$this->is_default;
        $vendorBankAccount->save();
        session()->flash('success','Updated Successfully.');
        return redirect()->route('list.vendor.bank.account');
    }
    public function render()
    {
        $this->userAll=User::get();
        return view('livewire.vendor-bank-account-edit')->layout('layouts.app');
    }
}