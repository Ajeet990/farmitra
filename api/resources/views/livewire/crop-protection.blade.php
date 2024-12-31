<div>
@php
ini_set('memory_limit', '256M');
error_log('Memory usage: ' . memory_get_usage());
@endphp

<style>
    #quill-editor {
        height: 300px;
        border: 1px solid #ccc;
    }
</style>


        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Crop Protection </h2>
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
                    <label for="name" class="block">Sub Crop</label>
                    <select wire:model.live="crop_sub_category" class="w-full border px-2 py-1 rounded border-gray-300 mt-2">
                        <option value="">Select SubCrop</option>
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
                    <label for="name" class="block">Audio Link</label>
                    <input type="text" id="name" wire:model.live="audio" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('audio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="name" class="block">Video Link</label>
                    <input type="text" id="name" wire:model.live="video" class="w-full border px-2 py-1 rounded border-gray-300 mt-2" />
                    @error('video') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
               
               
            </div>
            <div>
                <h4>Banner</h4>
                <x-mary-file wire:model="banner" accept="image/png, image/jpeg">
                    <img src="{{ $user->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFPAU8rBkD5OxnL5Zmi-mbhJrvyvb09n4Wfw&s' }}" class="h-40 rounded-lg" />
                </x-mary-file>
                
            </div>
            {{-- <div>
                <h4>Banners</h4>
                <x-mary-file wire:model="banners" accept="image/png, image/jpeg" multiple>
                    <img src="{{ $user->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFPAU8rBkD5OxnL5Zmi-mbhJrvyvb09n4Wfw&s' }}" class="h-40 rounded-lg" />
                </x-mary-file>
                @error('banners') <span class="error">{{ $message }}</span> @enderror
            </div> --}}
            
            <!-- Quill Editor -->
            <x-mary-editor wire:model="content" label="Content" hint="The full product description" />
        </div>
        <button wire:click="save" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
           Create
        </button>
    </div>
    <div class=" mt-2 p-2 bg-white overflow-auto w-full shadow-lg">
        <h1 class=" mb-2 font-bold ">Advisory Details List</h1>
        @if ($crop_protection->isEmpty())
        <p>No advisory details available. Please create one.</p>
        @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Banner</th>
                    <th class="border border-gray-300 px-4 py-2">Crop</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Content</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crop_protection as $index => $blog)
                <tr class="hover:bg-gray-100" wire:key="{{$index}}">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($blog->banner)
                        <img src="{{ asset('storage/' . $blog->banner) }}" alt="Banner" class="w-24">
                        @else
                        <span>No Banner</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $blog->crop->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $blog->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ Str::limit($blog->content, 50) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center flex justify-start space-x-2">
                        <a href="{{route('edit-crop-protection',$blog->id)}}" class="text-blue-500 mr-2">Edit</a>
                        <span> |</span>
                        <button wire:confirm="Are you sure you want to delete this blog?" wire:click="delete({{ $blog->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    

       

 
</div>

