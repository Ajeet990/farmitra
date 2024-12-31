<div>

        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@php
    $users = App\Models\BlogCategory::get();
@endphp
    <div class=" p-3 bg-green-100 border border-transparent border-l-6 border-l-green-800">
        <h2 class=" text-xl font-bold">Blog Management </h2>
    </div>
<x-mary-modal wire:model="myModal1" class="backdrop-blur" persistent>
    <div class="mb-5">
        <x-mary-input label="Category Title" wire:model='category_title' placeholder="Category Title" icon="o-book-open" />
        @error('category_title') <span>{{ $message }}</span> @enderror
    </div>
    <x-mary-button label="Cancel" @click="$wire.myModal1 = false" />
    <x-mary-button label="Submit" class="btn btn-success" wire:click='addCategory'/>
</x-mary-modal>
 

    
    <div class=" mt-2 p-2 bg-white shadow ">
        <form wire:submit.prevent="createBlog">
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
            <input type="file" wire:model="banner" class=" w-full rounded border p-2 mt-4"/>
            @error('banner') <span>{{ $message }}</span> @enderror
           <div class=" mt-4">
           
            <!-- Quill Editor -->
            <div wire:ignore>
                <label for="quill-editor" class="block">Content</label>
                <div id="quill-editor"  class="border rounded"></div>
                <input type="hidden" id="quill-content" wire:model.defer="content">
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
           </div>
            
           <div class=" mt-2 flex justify-end p-2">
                <x-mary-button type="submit" spinner="createBlog" label="Create Blog" class=" text-white" class="btn-success"/>
           </div>
        </form>
    </div>
    <div class=" mt-2 p-2 bg-white overflow-auto w-full shadow-lg">
        <h1 class=" mb-2 font-bold ">Blog List</h1>
        @if ($blogs->isEmpty())
        <p>No blogs available. Please create one.</p>
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
                @foreach ($blogs as $index => $blog)
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
                        <a href="{{ route('edit-blog',$blog->id)}}" class="text-blue-500 mr-2">Edit</a>
                        <span> |</span>
                        <button wire:confirm="Are you sure you want to delete this blog?" wire:click="deleteBlog({{ $blog->id }})" class="text-red-500">Delete</button>
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

