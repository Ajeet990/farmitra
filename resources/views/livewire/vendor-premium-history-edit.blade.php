<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Edit Vendor Premium History</h1>
        <a href="{{ route('list.category') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
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
            <p>Premium Package Name</p>
            <select type="text" placeholder="" wire:model="premium_package_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($premiumPackageAll as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
          @error('premium_package_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
           <p>expired</p>
           <input type="text" wire:model="expired" placeholder="expired" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('expired')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>expired_on</p>
           <input type="text" wire:model="expired_on" placeholder="expired_on" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('expired_on')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>remark</p>
           <input type="text" wire:model="remark" placeholder="remark" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('remark')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
    </div>
    <div class="tw-my-2">
        <button wire:click.prevent="update" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
