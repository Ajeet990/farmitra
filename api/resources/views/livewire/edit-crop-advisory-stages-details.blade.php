<div>
    
        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <div>
        <!-- Header -->
        <div class="p-3 bg-green-100 border-l-6 border-l-green-800">
            <h2 class="text-xl font-bold">Edit Crop Advisory Stages Details</h2>
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
                 @if ($existingBanner)
            <div>
                <p>Existing Banner:</p>
                <img src="{{ asset('storage/' . $existingBanner) }}" alt="Existing Banner" style="max-width: 200px;">
            </div>
            @endif
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
                UPDATE
            </button>
        </div>
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
                quill.root.innerHTML = @js($content);
            };
        </script>
    
</div>
