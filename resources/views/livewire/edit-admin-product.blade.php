<div class="p-5">
    <div class="flex items-center justify-between">
        <h3 class="font-medium text-xl text-gray-700 dark:text-gray-100 border-b-[1px] pb-1.5">Add a New Product</h3>
        <button wire:loading.attr="disabled" wire:target="images" wire:loading.class="opacity-50 cursor-not-allowed"
            wire:click='submit' class="py-2 px-10 rounded-md bg-primary font-medium text-white">Save</button>
    </div>

    <div class="mt-7 grid md:grid-cols-3 gap-10 ">
        <div class="md:col-span-2">
            <div class=" bg-white shadow-main dark:bg-bg_dark rounded-md  h-max p-5">
                <h3 class="font-medium text-[19px] text-stone-700 dark:text-gray-100">Product information</h3>
                <div class="mt-4">
                    <label for="" class="dark:text-gray-300">Product Name</label>
                    <input wire:model.live='name' type="text"
                        class="w-full mt-2 rounded-md bg-transparent dark:placeholder:text-gray-300 dark:text-white"
                        name="" id="" placeholder="Enter Product Name">
                    @error('name')
                    <spa class="text-red-600 mt-1">{{$message}}</spa>
                    @enderror
                </div>

                <div class="mt-3">


                    <label for="" class="dark:text-gray-300 m">Product Details</label>
                    <div id="" wire:ignore class="mt-3 w-full text-wrap">

                        <textarea name="" id="summernote" cols="30" rows="10"
                            class="text-wrap dark:text-white  max-w-full" wire:model.live='product_details'>{!!
                            $product_details !!}</textarea>

                    </div>

                </div>

            </div>

            <div class="bg-white shadow-main mt-10 dark:bg-bg_dark rounded-md  h-max p-5">
                <h3 class="font-medium text-[19px] text-stone-700 dark:text-gray-100">Variants</h3>
                @error('variants')

                <div class="text-red-500">{{$message}}</div>
                @enderror
                @foreach ($variants as $index => $variant)
                <h2 class="font-semibold mt-3  dark:text-white border-b-[1px] pb-1">Varient {{$index+1}}</h2>
                <div class="grid grid-cols-2 gap-x-10 mt-4 items-end">
                    <div>
                        <label class="dark:text-gray-300">Variant Name</label>
                        <input wire:model.live="variants.{{ $index }}.variant_name" type="text"
                            class="w-full mt-2 rounded-md bg-transparent dark:text-white dark:placeholder:text-gray-300"
                            placeholder="Enter Product Name">
                        @error('variants.' . $index . '.variant_name')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    </div>
                    <div>
                        <label class="dark:text-gray-300">SKU (Stock keeping unit)</label>
                        <input wire:model.live="variants.{{ $index }}.sku" type="text" @if($variant['disable_sku'])
                            disabled @endif
                            class="w-full mt-2 rounded-md bg-transparent dark:text-white dark:placeholder:text-gray-300"
                            placeholder="Enter SKU ">
                        @error('variants.' . $index . '.sku')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror


                    </div>
                    <div class="mt-4">
                        <label class="dark:text-gray-300">Price</label>
                        <input wire:model.live="variants.{{ $index }}.price" type="number"
                            class="w-full mt-2 rounded-md bg-transparent dark:text-white dark:placeholder:text-gray-300"
                            placeholder="Enter Product Price" min="0"
                            oninput="this.value = this.value.replace(/[eE.+-]/, '');">
                        @error('variants.' . $index . '.price')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="dark:text-gray-300">Offer Price</label>
                        <input wire:model.live="variants.{{ $index }}.offer_price" type="number" min="0"
                            oninput="this.value = this.value.replace(/[eE.+-]/, '');"
                            class="w-full mt-2 rounded-md bg-transparent dark:text-white dark:placeholder:text-gray-300"
                            placeholder="Enter Offer Price">
                        @error('variants.' . $index . '.offer_price')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="dark:text-gray-300">Stock</label>
                        <input wire:model.live="variants.{{ $index }}.stock" type="number"
                            class="w-full mt-2 rounded-md bg-transparent dark:text-white dark:placeholder:text-gray-300"
                            placeholder="Enter Stock" min="0" oninput="this.value = this.value.replace(/[eE.+-]/, '');">
                        @error('variants.' . $index . '.stock')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                @endforeach

                <div class="mt-4">
                    <button type="button" wire:click="addVariant" class="bg-primary text-white px-4 py-2 rounded-md">
                        Add Another Variant
                    </button>
                </div>
            </div>
        </div>
        <div>
            <div class=" bg-white dark:bg-bg_dark shadow-main rounded-md  h-max p-5" wire:ignore.self>
                <h3 class="font-medium text-[19px] text-stone-700 dark:text-gray-100">Organize</h3>
                <div class="mt-4">
                    <label for="" class="dark:text-gray-300">Select Brand</label>
                    <select name="" id="" class="w-full mt-2 rounded-md bg-transparent dark:text-white"
                        wire:model.live='brand_id'>
                        <option value="" class="dark:bg-black dark:text-white">Select brand</option>
                        @foreach ($brands as $brand)
                        <option key='{{$brand->name}}' value="{{$brand->id}}" class="dark:bg-black dark:text-white">
                            {{$brand->name}}</option>

                        @endforeach
                    </select>
                    @error('brand_id')
                    <spa class="text-red-600 mt-1">{{$message}}</spa>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="" class="dark:text-gray-300">Select Category</label>
                    <select name="" id="" class="w-full mt-2 rounded-md bg-transparent dark:text-white"
                        wire:model.live="category_id">
                        <option value="" class="dark:bg-black dark:text-white">Select Category</option>
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}" class="dark:bg-black dark:text-white">{{$cat->name}}</option>

                        @endforeach
                    </select>
                    @error('category_id')
                    <spa class="text-red-600 mt-1">{{$message}}</spa>
                    @enderror
                </div>
                <div class="mt-4" wire:ingore.self>
                    <label for="" class="dark:text-gray-300">Select Sub Category</label>
                    <select name="" id="" class="w-full mt-2 rounded-md bg-transparent dark:text-white"
                        wire:model.live="subcategory_id">
                        <option value="" class="dark:bg-black dark:text-white">Select Sub Category</option>
                        @foreach ($subcategories as $subCat)
                        <option key='da -{{-$subCat->id}}' value="{{$subCat->id}}"
                            class="dark:bg-black dark:text-white">{{$subCat->name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label for="" class="dark:text-gray-300">Active Status</label>
                    <select name="" id="" class="w-full mt-2 rounded-md bg-transparent dark:text-white"
                        wire:model.live="subcategory_id">
                        <option value="1" class="dark:bg-black dark:text-white">Active</option>
                        <option value="0" class="dark:bg-black dark:text-white">Deactive</option>

                    </select>
                </div>


            </div>
            <div class=" bg-white dark:bg-bg_dark mt-10 shadow-main rounded-md  h-max p-5">
                <h3 class="font-medium text-[19px] text-stone-700 dark:text-gray-100">Images</h3>

                <div class="mt-3">
                    <label for="pr_images"
                        class="bg-gray-100 dark:bg-slate-800/55 gap-3 rounded-md  w-full flex flex-col items-center p-5">
                        <span class="bg-slate-200 inline-block p-3 rounded-md"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                        </span>
                        <span class="font-medium dark:text-gray-100 ">Upload Images</span>
                    </label>
                    <input type="file" accept="image/*" id="pr_images" multiple name="" class="hidden"
                        wire:model.live='images' id="">
                    @error('images')
                    <spa class="text-red-600 mt-1">{{$message}}</spa>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-x-8 gap-y-3 mt-7  p-3">
                    @if (count($imagesPath)>0)
                    @foreach ($imagesPath as $img )
                    <div class="group relative ">
                        <img src="{{ asset($img->image) }}" alt="{{$img->id}}"
                            class="size-20 mx-auto object-contain group-hover:blur-md duration-150">
                            @if($index > 0)

                        <button wire:confirm = 'Are You Sure Want To Delete Image' title="Delete image" wire:click="deleteImage({{$img->id}})"
                            class="absolute top-1/2 left-1/2  -translate-x-1/2 -translate-y-1/2 group-hover:block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-- text-red-500 group-hover:size-8 duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </button>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>


@push('js')
<script>
    document.addEventListener('livewire:init', function () {


        $(document).ready(function() {
  $('#summernote').summernote({
 height: 200,
 callbacks: {
            onChange: function(contents, $editable) {
                @this.set('product_details', contents);
            }
        }
  });
});
    });

</script>
@endpush