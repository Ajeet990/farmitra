<div>
    
        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
 

    <div>
        <!-- Header -->
        <div class="p-3 bg-green-100 border-l-6 border-l-green-800">
            <h2 class="text-xl font-bold">Crop Advisory Stages Details</h2>
        </div>

        <!-- Main Form -->
        <div class="bg-white p-2 shadow space-y-4">
            <!-- Title -->
            <div>
                <label for="title" class="block">Title</label>
                <input type="text" id="title" wire:model="title" class="w-full border px-2 py-1 rounded border-gray-300 mt-2">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Banner -->
            <div>
                <label for="banner" class="block">Banner</label>
                <input type="file" id="banner" wire:model="banner" class="w-full border px-2 py-1 rounded border-gray-300 mt-2">
                @error('banner') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Quill Editor -->
            <div wire:ignore>
                <label for="quill-editor" class="block">Content</label>
                <div id="quill-editor"  class="border rounded"></div>
                <input type="hidden" id="quill-content" wire:model.defer="content">
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <button wire:click="save" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create
            </button>
        </div>
    </div>
<div class=" mt-2 p-2 bg-white overflow-auto w-full shadow-lg">
        <h1 class=" mb-2 font-bold ">Advisory Details List</h1>
        @if ($details->isEmpty())
        <p>No advisory details available. Please create one.</p>
        @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Banner</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Content</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $index => $blog)
                <tr class="hover:bg-gray-100" wire:key="{{$index}}">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($blog->banner)
                        <img src="{{ asset('storage/' . $blog->banner) }}" alt="Banner" class="w-24">
                        @else
                        <span>No Banner</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $blog->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ Str::limit($blog->content, 50) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center flex justify-start space-x-2">
                        <a href="{{ route('edit-crop-advisory-stages-details',[$blog->id])}}" class="text-blue-500 mr-2">Edit</a>
                        <span> |</span>
                        <button wire:confirm="Are you sure you want to delete this blog?" wire:click="delete({{ $blog->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
   
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
            };
        </script>
    
</div>
