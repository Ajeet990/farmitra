<div>
    @if (session('success'))
        <span class="tw-text-green-500 tw-text-xl">{{ session('success') }}</span>
    @endif
    <div class=" tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Add Vendor Bank Account</h1>
        <a href="{{ route('list.vendor.bank.account') }}" class=" tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white tw-rounded-md"><--Back</a>
    </div>
      <div class="tw-grid tw-grid-cols-3 tw-bg-white tw-gap-5 tw-p-4">
            <div>
                <h1>User Name</h1>
                <select name="" id="" wire:model="user_id" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm">
                    @foreach ($userAll as $item)
                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div>
                <p>Bank Name</p>
                <input type="text" wire:model="bank_name" placeholder="Bank Name" class="tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300 ">
            </div>
            <div>
                <p>Account Number</p>
                <input type="text" wire:model="account_number" placeholder="Account Number" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            <div>
                <p>Account Holder Name</p>
                <input type="text" wire:model="account_holder_name" placeholder="Account Holder Name" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            <div>
                <p>Swift Code</p>
                <input type="text" wire:model="swift_code" placeholder="Swift Code" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            <div>
                <p>IFSC</p>
                <input type="text" wire:model="ifsc" placeholder="IFSC" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            <div>
                <p>UPI ID</p>
                <input type="text" wire:model="upi_id" placeholder="UPI ID" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            <div>
                <p>Is_default</p>
                <input type="text" wire:model="is_default" placeholder="is_default" class=" tw-mt-1 tw-w-full tw-rounded-md tw-border-gray-300">
            </div>
            
      </div>
      <div class="tw-my-2">
        <button type="submit" wire:click.prevent="store" class="tw-w-full tw-text-white tw-bg-blue-700 tw-rounded-md tw-py-2">Save</button>
      </div>
</div>
