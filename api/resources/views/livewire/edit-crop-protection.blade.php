<div>
@php
ini_set('memory_limit', '256M');
error_log('Memory usage: ' . memory_get_usage());
@endphp
@push('css')
        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Edit Crop Protection </h2>
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
                 @if ($existingBanner)
                <div>
                    <p>Existing Banner:</p>
                    <img src="{{ asset('storage/' . $existingBanner) }}" alt="Existing Banner" style="max-width: 200px;">
                </div>
                @endif
            </div>
            {{-- <div>
                <h4>Banners</h4>
                <x-mary-file wire:model="banners" accept="image/png, image/jpeg" multiple>
                    <img src="{{ $user->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFPAU8rBkD5OxnL5Zmi-mbhJrvyvb09n4Wfw&s' }}" class="h-40 rounded-lg" />
                </x-mary-file>
                @error('banners') <span class="error">{{ $message }}</span> @enderror
            </div> --}}
            <x-mary-editor wire:model="content" label="Content" hint="The full product description" />
            <!-- Quill Editor -->
            {{-- <div wire:ignore>
                <label for="quill-editor" class="block">Content</label>
                <div id="quill-editor"  class="border rounded"></div>
                <input type="hidden" id="quill-content" wire:model.defer="content">
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> --}}
        </div>
        <button wire:click="save" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
           UPDATE
        </button>
    </div>
    
@push('js')
        <!-- Quill JS -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            window.onload = function () {
                var toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],        // Basic formatting
                    ['blockquote', 'code-block'],                    // Block formats
                    [{ 'header': 1 }, { 'header': 2 }],              // Custom headers
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],    // Lists
                    [{ 'script': 'sub'}, { 'script': 'super' }],     // Subscript/Superscript
                    [{ 'indent': '-1'}, { 'indent': '+1' }],         // Indent
                    [{ 'direction': 'rtl' }],                        // Text direction
                    [{ 'size': ['small', false, 'large', 'huge'] }], // Font size
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],       // Heading levels
                    [{ 'color': [] }, { 'background': [] }],         // Color options
                    [{ 'font': [] }],                                // Font family
                    [{ 'align': [] }],                               // Text alignment
                    ['link', 'image', 'video'],                      // Media links
                    ['clean']                                        // Clear formatting
                ];
                const quill = new Quill('#quill-editor', {
                    theme: 'snow',
                    placeholder: 'Start typing here...',
                    modules: {
                        toolbar: toolbarOptions
                    },
                });
                quill.on('text-change', function () {
                    document.querySelector('#quill-content').value = quill.root.innerHTML;
                    Livewire.dispatch('contentUpdated', { content: quill.root.innerHTML });
                });
                Livewire.on('resetQuillContent', (newContent) => {
                    quill.root.innerHTML = newContent;
                });
                quill.root.innerHTML = @js($content);
            };
        </script>
    @endpush
</div>

