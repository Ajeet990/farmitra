<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Add Employee Vehicle Details</h1>
        <a href="{{ route('list.employee.vehicle.details') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
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
            <p>vehicle_name</p>
            <select type="text" placeholder="" wire:model="delivery_vehicle_detail_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($deliveryVehicleDetailAll as $item)    
                <option value="{{$item->id}}">{{ $item->vehicle_name }}</option>
              @endforeach
            </select>
          @error('delivery_vehicle_detail_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
           <p>vehicle_number</p>
           <input type="text" wire:model="vehicle_number" placeholder="vehicle_number" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('vehicle_number')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
            <p>vehicle_type</p>
            <select type="text" placeholder="" wire:model="vehicle_type" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                <option value="1">petrol</option>
                <option value="0">deisel</option>
            </select>
            @error('vehicle_type')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>vehicle_color</p>
            <input type="text" wire:model="vehicle_color" placeholder="vehicle_color" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('vehicle_color')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>vehicle_model</p>
            <input type="text" wire:model="vehicle_model" placeholder="vehicle_model" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('vehicle_model')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>vehicle_capacity</p>
            <input type="text" wire:model="vehicle_capacity" placeholder="vehicle_capacity" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('vehicle_capacity')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>vehicle_status</p>
            <input type="text" wire:model="vehicle_status" placeholder="vehicle_status" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('vehicle_status')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>is_insurance_expired</p>
            <input type="text" wire:model="is_insurance_expired" placeholder="is_insurance_expired" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('is_insurance_expired')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>is_vehicle_expired</p>
            <input type="text" wire:model="is_vehicle_expired" placeholder="is_vehicle_expired" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('is_vehicle_expired')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>

        
        </div>
    <div class="tw-my-2">
        <button wire:click.prevent="store" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
