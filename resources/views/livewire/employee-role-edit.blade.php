<div>
    @if (session('success'))   
    <span class="tw-text-green-500 tw-text-xl tw-text-center">{{ session('success') }}</span>
    @endif
    <div class="tw-flex tw-font-bold tw-justify-between tw-items-center">
        <h1>Edit Employee Role</h1>
        <a href="{{ route("list.employee.role") }}" class="tw-bg-blue-700 tw-px-2 tw-py-1 tw-text-white  tw-rounded-md"><-- Back</a>
    </div>
    <div class="tw-max-w-md tw-mx-auto tw-bg-white tw-rounded-lg tw-shadow-md tw-p-6">
        <form>
        <div class="tw-mb-4">
            <label for="name" class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Name</label>
            <input type="text" wire:model="name" id="name" placeholder="Name" name="name" class="tw-mt-1 tw-block tw-w-full tw-border-gray-300 tw-rounded-md tw-shadow-sm tw-focus:ring-indigo-500 tw-focus:border-indigo-500 tw-sm:text-sm">
            @error('name')  
            <span class="tw-text-red-500 tw-text-xs tw-mt-3 tw-block ">{{ $message }}</span>
          @enderror
        </div>
          <button wire:click.prevent="update" type="submit" class="tw-w-full tw-bg-indigo-500 tw-text-white tw-py-2 tw-px-4 tw-rounded-md tw-hover:bg-indigo-600 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-indigo-500 tw-focus:ring-offset-2 tw-focus:ring-offset-gray-100">Submit</button>
        </form>
    </div>
</div>
