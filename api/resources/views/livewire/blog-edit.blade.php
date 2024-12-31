<div>

        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@php
    $users = App\Models\BlogCategory::get();
@endphp
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800 shadow">
        <h2 class=" text-xl font-bold">Edit Blog </h2>
    </div>
    
    <div class=" mt-2 p-2 bg-white shadow ">
        <form wire:submit.prevent="saveBlog">
        <div class="grid grid-cols-12 mb-3">
                <div class=" col-span-9">
                    <x-mary-choices label="Select Blog Category" icon="o-user" :options="$users" wire:model="category" single/>
                </div>
                <div class="col-span-3">
                    <x-mary-button icon="o-plus-circle" class="btn-circle btn-outline mt-6 ml-4" @click="$wire.myModal1 = true"/>
                </div>
                
            </div>
            @error('category') <span>{{ $message }}</span> @enderror
            <x-mary-input label="Blog Title" wire:model='title' placeholder="Blog Title" icon="o-user" />
            @error('title') <span>{{ $message }}</span> @enderror
           
            <input type="file" wire:model="banner" class=" w-full rounded border p-2 mt-3"/>
            @error('banner') <span>{{ $message }}</span> @enderror
            @if ($existingBanner)
            <div>
                <p>Existing Banner:</p>
                <img src="{{ asset('storage/' . $existingBanner) }}" alt="Existing Banner" style="max-width: 200px;">
            </div>
            @endif

            <div class=" mt-4">
           
            <!-- Quill Editor -->
            <div wire:ignore>
                <label for="quill-editor" class="block">Content</label>
                <div id="quill-editor"  class="border rounded"></div>
                <input type="hidden" id="quill-content" wire:model="content">
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
           </div>
           <div class=" mt-2 flex justify-end p-2">
                <x-mary-button type="submit" spinner="saveBlog" label="Update Blog" class=" text-white" class="btn-success"/>
           </div>
        </form>
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
