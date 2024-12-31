<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl ">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center tw-p-2">
        <h1>Edit Category</h1>
        <a href="{{ route('list.category') }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
    </div>
    {{-- grid --}}
    <form>
    <div class="tw-grid tw-grid-cols-3  tw-gap-5 tw-bg-white tw-p-4">
       
        <div class="  ">
            <p>Module Name</p>
            <select type="text" placeholder="" wire:model="module_id" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                @foreach ($module as $item)    
                <option value="{{$item->id}}">{{ $item->name }}</option>
              @endforeach
            </select>
        @error('module_id')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
           <p>Category Name</p>
           <input type="text" wire:model="name" placeholder="Category Name" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('name')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>Icon</p>
           <input type="file" wire:model="icon"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('icon')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
         <img src="{{ URL::to('storage/'.$iconurl) }}" class="tw-h-10" alt=""> 
        </div>
        <div class=" tw-col-span-2">
           <p>Description</p>
           <textarea placeholder="Description" wire:model="description"  class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm"></textarea>
           @error('description')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>created_by</p>
           <input type="text" placeholder="Category Name" wire:model="created_by" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('created_by')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>updated_by</p>
           <input type="text" placeholder="Category Name" wire:model="updated_by" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('updated_by')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
           <p>approved_by</p>
           <input type="text" placeholder="Category Name" wire:model="approved_by" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
           @error('approved_by')  
           <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
         @enderror
        </div>
        <div class="  ">
            <p>Is Active</p>
            <select type="text" placeholder="" wire:model="is_active" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            @error('is_active')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
        <div class="  ">
            <p>Is featured</p>
            <select type="text" placeholder="" wire:model="is_featured" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                <option value="1">Yes</option>
                <option value="0">No</option>
              
            </select>
            @error('is_featured')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror

        </div>
        <div class="  ">
            <p>Is custome</p>
            <select type="text" placeholder="" wire:model="is_custome" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
                <option value="1">Yes</option>
                <option value="0">No</option>
              
            </select>
            @error('is_custome')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
    </div>
    <div class="tw-my-2">
        <button wire:click.prevent="update" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>

    </div>
</form>
   
</div>
