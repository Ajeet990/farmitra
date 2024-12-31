<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Add Vendor Infomation</h1>
        <a href="{{ route('list.vendor.information') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
    </div>
    {{-- grid --}}
    <form>
    <div class="tw-grid tw-grid-cols-4  tw-gap-5 tw-bg-white tw-p-4">
       
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
           <p>Step completed</p>
           <input type="text" wire:model="step_completed" placeholder="step_completed" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('name')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>is_premium</p>
           <input type="text" wire:model="is_premium" placeholder="is_premium" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('is_premium')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>valid_upto</p>
           <input type="text" wire:model="valid_upto" placeholder="valid_upto"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('valid_upto')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>is_edited</p>
           <input type="text" wire:model="is_edited" placeholder="is_edited" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('is_edited')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>is_open</p>
           <input type="text" wire:model="is_open" placeholder="is_open"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('is_open')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
            <p>Module Name</p>
            <select type="text" placeholder="" wire:model="module_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($moduleAll as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
        @error('module_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>Store name</p>
            <input type="text" wire:model="store_name" placeholder="store_name"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_name')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>whatsapp_number</p>
            <input type="text" wire:model="whatsapp_number" placeholder="whatsapp_number"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('whatsapp_number')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>email</p>
            <input type="text" wire:model="email" placeholder="email"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('email')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_address</p>
            <input type="text" wire:model="store_address" placeholder="store_address"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_address')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_city</p>
            <input type="text" wire:model="store_city" placeholder="store_city"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_city')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_state</p>
            <input type="text" wire:model="store_state" placeholder="store_state"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_state')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_country</p>
            <input type="text" wire:model="store_country" placeholder="store_country"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_country')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_pincode</p>
            <input type="text" wire:model="store_pincode" placeholder="store_pincode"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_pincode')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_phone_number</p>
            <input type="text" wire:model="store_phone_number" placeholder="store_phone_number"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_phone_number')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_gst_number</p>
            <input type="text" wire:model="store_gst_number" placeholder="store_gst_number"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_gst_number')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_pan_number</p>
            <input type="text" wire:model="store_pan_number" placeholder="store_pan_number"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_pan_number')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_logo</p>
            <input type="file" wire:model="store_logo" placeholder="store_logo"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_logo')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class="  ">
            <p>store_banner</p>
            <input type="file" wire:model="store_banner" placeholder="store_banner"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('store_banner')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
         </div>
        <div class=" tw-col-span-2">
           <p>Store description</p>
           <textarea placeholder="Description" wire:model="store_description"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm"></textarea>
           @error('store_description')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_lat</p>
           <input type="text" placeholder="store_lat" wire:model="store_lat" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_lat')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_long</p>
           <input type="text" placeholder="store_long" wire:model="store_long" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_long')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_inside_photo</p>
           <input type="file" placeholder="store_inside_photo" wire:model="store_inside_photo" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_inside_photo')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_outside_photo</p>
           <input type="file" placeholder="store_outside_photo" wire:model="store_outside_photo" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_outside_photo')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>store_stamp</p>
           <input type="text" placeholder="store_stamp" wire:model="store_stamp" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('store_stamp')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>remark</p>
           <input type="text" placeholder="remark" wire:model="remark" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('remark')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div> 
    </div>
    <div class="tw-my-2">
        <button wire:click.prevent="store" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
