<div>
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Crop Advisory Stages </h2>
    </div>
    <div class=" bg-white p-2 mt-3 shadow">
        <h2 class="font-bold">Create New Statges </h2>
        <hr class=" my-2">
        <div class=" space-y-3 mt-2">
            
            <div class=" grid grid-cols-2 gap-2">
                <div>
                    <label for="name" class="block">Crop Category</label>
                    <select wire:model.live="crop_category" class="w-full border px-2 py-1 rounded border-gray-300 mt-2 p-3">
                        <option value="">Select Category</option>
                        @foreach ($crops as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('crop_category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">Crop SubCategory</label>
                    <select wire:model.live="crop_sub_category" class="w-full border px-2 py-1 rounded border-gray-300 mt-2">
                        <option value="">Select SubCategory</option>
                        @foreach ($sub_crops as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('crop_sub_category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">Title</label>
                    <input type="text" id="name" wire:model.live="title" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">Duration Title</label>
                    <input type="text" id="name" wire:model.live="duration_title" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('duration_title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">From (In Week)</label>
                    <input type="text" id="name" wire:model.live="from" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('from') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">To  (In Week)</label>
                    <input type="text" id="name" wire:model.live="to" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('to') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <button wire:click="save" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
           Create Stages
        </button>
    </div>

    <!-- Crop List -->
<div class="mt-2 shadow bg-white p-2 w-full overflow-auto">
    <h2 class="text-xl font-bold mb-4">Crop Timeline List</h2>
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2 text-left">Crop</th>
                <th class="border px-4 py-2 text-left">Title</th>
                <th class="border px-4 py-2 text-left">Duration</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crop_advisories as $crop)
                <tr wire:key='{{$crop->id}}'>
                    
                    <td class="border px-4 py-2">{{ $crop->crop->name }}</td>
                    <td class="border px-4 py-2">{{ $crop->title }}</td>
                    <td class="border px-4 py-2">{{ $crop->duration_title }}</td>
                    <td class="border px-4 py-2  flex justify-start space-x-2">
                        <a href="{{route('edit-crop-advisory-stages',$crop->id)}}"  class="text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>                              
                        </a>
                        <button wire:confirm="Are you sure you want to delete this crop?" wire:click="delete({{ $crop->id }})" class="text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>                              
                        </button>
                        <a href="{{route('crop-advisory-stages-details',$crop->id)}}"  class="text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>                              
                        </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$crop_advisories->links()}}
    </div>
</div>
</div>

