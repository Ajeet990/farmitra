<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Edit Store Owner Details</h1>
        <a href="{{ route('list.store.owner.details') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
    </div>
    {{-- grid --}}
    <form>
    <div class="tw-grid tw-grid-cols-3  tw-gap-5 tw-bg-white tw-p-4">
       
        <div class="  ">
            <p>User Name</p>
            <select type="text" placeholder="" wire:model="user_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($userAll as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
          @error('user_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
       
        <div class="  ">
           <p>store_owner_aadhar_upload</p>
           <input type="file" wire:model="store_owner_aadhar_upload"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_aadhar_upload')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$store_owner_aadhar_upload_url) }}" alt="" class="tw-h-10">
        </div>
        <div class="  ">
           <p>store_owner_aadhar_front_upload</p>
           <input type="file" wire:model="store_owner_aadhar_front_upload"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_aadhar_front_upload')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$store_owner_aadhar_front_upload_url) }}" alt="" class="tw-h-10">
        
        </div>
        <div class="  ">
           <p>store_owner_aadhar_back</p>
           <input type="file" wire:model="store_owner_aadhar_back"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_aadhar_back')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$store_owner_aadhar_back_url) }}" alt="" class="tw-h-10">
        
        </div>
        <div class="  ">
           <p>store_owner_pan_number</p>
           <input type="text" placeholder="store_owner_pan_number" wire:model="store_owner_pan_number"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_pan_number')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_owner_pan_upload</p>
           <input type="file" wire:model="store_owner_pan_upload"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_pan_upload')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$store_owner_pan_upload_url) }}" alt="" class="tw-h-10">
        
        </div>
        <div class="  ">
           <p>store_owner_digital_signature_upload</p>
           <input type="file" wire:model="store_owner_digital_signature_upload"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_owner_digital_signature_upload')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$store_owner_digital_signature_upload_url) }}" alt="" class="tw-h-10">
       
        </div> 
    </div>
    <div class="tw-my-2">
        <button wire:click.prevent="update" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
