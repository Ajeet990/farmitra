<?php

namespace App\Livewire;

use App\Models\EmployeeBankDetails;
use App\Models\User;
use Livewire\Component;

class EmployeeBankDetailAdd extends Component
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
    
    public function store(){
        $vendorBankAccount=new EmployeeBankDetails();
        $vendorBankAccount->user_id=$this->user_id;
        $vendorBankAccount->bank_name=$this->bank_name;
        $vendorBankAccount->account_number=$this->account_number;
        $vendorBankAccount->account_holder_name=$this->account_holder_name;
        $vendorBankAccount->swift_code=$this->swift_code;
        $vendorBankAccount->ifsc=$this->ifsc;
        $vendorBankAccount->upi_id=$this->upi_id;
        $vendorBankAccount->is_default=$this->is_default;
        $vendorBankAccount->save();
        session()->flash('success','Created Successfully.');
        return redirect()->route('list.employee.bank.details');
    }
    public function render()
    {
        $this->userAll=User::get();
        return view('livewire.employee-bank-detail-add')->layout('layouts.app');
    }
}