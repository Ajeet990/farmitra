<div>
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Expert Management </h2>
    </div>
    <div class="p-2 bg-white">
        <div class=" bg-gray-100 p-4 rounded">
            <h4 class=" font-bold">Account Section</h4>
            <hr class="my-3">
            <div class="grid grid-cols-3 gap-3">
                <div>
                    <x-mary-input label="Name" placeholder="Enter Account Name" wire:model.live='name'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="Mobile Number" placeholder="Enter Mobile Number" wire:model.live='mobile'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="Email Address" placeholder="Enter Email Address" wire:model.live='email'></x-mary-input>
                </div>
                <div>
                    <x-mary-password label="Password" placeholder="Enter Password" wire:model.live='password' hint="Note: If Empty then password will be mobile number" clearable></x-mary-password>
                </div>
            </div>
        </div>
        <div class=" bg-gray-100 p-4 rounded mt-3">
            <h4 class=" font-bold">Communication/Address Section</h4>
            <hr class="my-3">
            <div class="grid grid-cols-3 gap-3">
                <div>
                    <x-mary-input label="State" placeholder="Enter State" wire:model.live='state'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="City" placeholder="Enter City" wire:model.live='city'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="Pincode" placeholder="Enter Pincode" wire:model.live='pincode'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="Full Address" placeholder="Enter Address" wire:model.live='address' hint="Full Communication Address"></x-mary-input>
                </div>
            </div>
        </div>
        <div class=" bg-gray-100 p-4 rounded mt-3">
            <h4 class=" font-bold">Expertise/Certification/Qualification Section</h4>
            <hr class="my-3">
            <div class="grid grid-cols-3 gap-3">
                <div>
                    <x-mary-input label="Aadhar Number" placeholder="Aadhar Number" wire:model.live='aadhar'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="PAN" placeholder="PAN Number" wire:model.live='pan'></x-mary-input>
                </div>
                <div>
                    <x-mary-input label="Qualification" placeholder="Qualification" wire:model.live='qualification' ></x-mary-input>
                </div>
                 <div>
                    <x-mary-input label="Experise" placeholder="Experise" wire:model.live='expertise' hint="Enter comma saperated value"></x-mary-input>
                </div>
                <div>
                    <x-mary-file label="Certificate"  wire:model.live='certificate' ></x-mary-file>
                </div>
            </div>
        </div>

        <x-mary-button label="CREATE EXPERT" class="mt-3 btn btn-success text-white"></x-mary-button>
    </div>
</div>

