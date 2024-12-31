<div class=" p-3">
    <div class=" p-3 shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Crop</h2>
        @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
    
            {{-- <div class="mb-4">
                <label for="season" class="block text-sm font-medium">Season</label>
                <input type="text" id="season" wire:model="season" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('season') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label for="soil_type" class="block text-sm font-medium">Soil Type</label>
                <input type="text" id="soil_type" wire:model="soil_type" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('soil_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label for="seed_type" class="block text-sm font-medium">Seed Type</label>
                <input type="text" id="seed_type" wire:model="seed_type" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('seed_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label for="region" class="block text-sm font-medium">Region</label>
                <input type="text" id="region" wire:model="region" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('region') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label for="water_requirement" class="block text-sm font-medium">Water Requirement (liters/hectare)</label>
                <input type="number" id="water_requirement" wire:model="water_requirement" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('water_requirement') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div> --}}
    
            <div class="mb-4">
                <label for="banner" class="block text-sm font-medium">Banner</label>
                <input type="file" id="banner" wire:model="banner" class="mt-1 block w-full px-3 py-2 border rounded" />
                @error('banner') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    
                <!-- Display the current banner -->
                @if ($crop->banner)
                    <div class="mt-2">
                        <label>Current Banner:</label>
                        <img src="{{ asset('storage/' . $crop->banner) }}" alt="Current Banner" width="200">
                    </div>
                @endif
    
                <!-- Preview uploaded banner -->
                @if ($banner)
                    <div class="mt-2">
                        <label>Preview:</label>
                        <img src="{{ $banner->temporaryUrl() }}" alt="Preview" width="200">
                    </div>
                @endif
            </div>
    
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
        </form>
    
        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
    
</div>
