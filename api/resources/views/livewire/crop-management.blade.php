<div class="">
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Crop Categery Management </h2>
    </div>
    <div class=" mt-2">
            <!-- Success Message -->
        

<div class=" shadow- p-2 bg-white">
    <!-- Crop Form -->
<form wire:submit.prevent="save">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="name" class="block">Crop Category  Name</label>
            <input type="text" id="name" wire:model="name" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
       
        {{-- <div>
            <label for="season" class="block">Season</label>
            <input type="text" id="season" wire:model="season" placeholder=" Ex: Rabi Optional" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('season') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="soil_type" class="block">Soil Type</label>
            <input type="text" id="soil_type" wire:model="soil_type" placeholder=" Ex: Loamy Soil (Optional)" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('soil_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="seed_type" class="block">Seed Type</label>
            <input type="text" id="seed_type" wire:model="seed_type" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('seed_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="region" class="block">Region</label>
            <input type="text" id="region" wire:model="region" placeholder="Ex: Uttar Pradesh" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('region') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="water_requirement" class="block">Water Requirement</label>
            <input type="number" step="0.01" id="water_requirement" placeholder=" Ex: 8.1" wire:model="water_requirement" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('water_requirement') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div> --}}
        <div>
            <label for="banner">Banner</label>
            <input type="file" id="banner" wire:model="banner" class="w-full border px-2 py-1 rounded border-gray-300"/>
            @error('banner') <span class="error">{{ $message }}</span> @enderror

            <!-- Preview -->
            @if ($banner)
                <img src="{{ $banner->temporaryUrl() }}" alt="Preview" width="200" />
            @endif
        </div>
    </div>
    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
        {{ $isEditMode ? 'Update Crop' : 'Create Crop' }}
    </button>
</form>
</div>

<!-- Crop List -->
<div class="mt-2 shadow bg-white p-2 w-full overflow-auto">
    <h2 class="text-xl font-bold mb-4">Crop List</h2>
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 text-left">Banner</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crops as $crop)
                <tr wire:key='{{$crop->id}}'>
                <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($crop->banner)
                        <img src="{{ asset('storage/' . $crop->banner) }}" alt="Banner" class="w-24">
                        @else
                        <span>No Banner</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $crop->name }}</td>
                    <td class="border px-4 py-2  flex justify-start space-x-2">
                        <a href="{{route('edit-crop',$crop->id)}}"  class="text-blue-500">Edit</a>
                        <span>|</span>
                        <button wire:confirm="Are you sure you want to delete this crop?" wire:click="delete({{ $crop->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$crops->links()}}
    </div>
</div>
    </div>
</div>
