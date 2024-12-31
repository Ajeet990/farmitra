<div>
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Edit Crop Management </h2>
    </div>
            <!-- Success Message -->
        

<div class=" shadow p-2 bg-white mt-2">
    <!-- Crop Form -->
<form wire:submit.prevent="save">
    <div class=" space-y-3">
        <div>
            <label for="name" class="block">Crop Category</label>
            <select wire:model="crop_category" class="w-full border px-2 py-1 rounded border-gray-300">
                <option value="">Select Category</option>
                @foreach ($crops as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('crop_category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="name" class="block">Crop Name</label>
            <input type="text" id="name" wire:model="name" class="w-full border px-2 py-1 rounded border-gray-300" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
       
       
        <div>
            <label for="banner">Banner</label>
            <input type="file" id="banner" wire:model="banner" class="w-full border px-2 py-1 rounded border-gray-300"/>
            @error('banner') <span class="error">{{ $message }}</span> @enderror
            @if ($existingBanner)
            <div>
                <p>Existing Banner:</p>
                <img src="{{ asset('storage/' . $existingBanner) }}" alt="Existing Banner" style="max-width: 200px;">
            </div>
            @endif
        </div>
    </div>
    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
       Update Crop
    </button>
</form>
</div>
</div>
