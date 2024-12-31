<div>
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Edit Advisory Stages </h2>
    </div>
    <div class=" bg-white p-2 mt-3 shadow">
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
           Update Stages
        </button>
    </div>

</div>

