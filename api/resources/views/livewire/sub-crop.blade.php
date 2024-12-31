<div>
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Crop Management </h2>
    </div>
            <!-- Success Message -->
        

<div class=" shadow p-2 bg-white mt-2">
    <!-- Crop Form -->
<form wire:submit.prevent="save">
    <div class=" space-y-3">
        <div>
            <label for="name" class="block">Crop Category</label>
            <select wire:model.live="crop_category" class="w-full border px-2 py-1 rounded border-gray-300">
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

            <!-- Preview -->
            @if ($banner)
                <img src="{{ $banner->temporaryUrl() }}" alt="Preview" width="200" />
            @endif
        </div>
    </div>
    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
       Create Crop
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
                <th class="border px-4 py-2 text-left">Category</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Timeline</th>
                <th class="border px-4 py-2 text-left">Advisory</th>
                <th class="border px-4 py-2 text-left">Protection</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sub_crops as $crop)
                <tr wire:key='{{$crop->id}}'>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($crop->banner)
                        <img src="{{ asset('storage/' . $crop->banner) }}" alt="Banner" class="w-24">
                        @else
                        <span>No Banner</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $crop->crop->name }}</td>
                    <td class="border px-4 py-2">{{ $crop->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{route('crop-timeline')}}">{{$crop->timelines->count()}}</a>
                    </td>
                    <td class="border px-4 py-2"><a href="{{route('crop-advisory-stages')}}">{{$crop->advisory->count()}}</a></td>
                    <td class="border px-4 py-2"><a href="{{route('crop-timeline')}}">{{$crop->protection->count()}}</a></td>
                    <td class="border px-4 py-2  flex justify-start space-x-2">
                        <a href="{{route('edit-sub-crop',$crop->id)}}"  class="text-blue-500">Edit</a>
                        <span>|</span>
                        <button wire:confirm="Are you sure you want to delete this crop?" wire:click="delete({{ $crop->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$sub_crops->links()}}
    </div>
</div>
</div>
