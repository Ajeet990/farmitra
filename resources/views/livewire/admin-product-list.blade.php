<div>
    <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8  mx-auto ">
        <!-- Card -->
        <div class="flex flex-col ">
            <div class="-m-1.5 overflow-x-auto">
                @if (session()->has('success'))
                <div id="dismiss-alert"
                    class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                    role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                </path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                        <div class="ms-2">
                            <div class="text-sm font-medium">
                                {{ session('success') }}

                            </div>
                        </div>
                        <div class="ps-3 ms-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button"
                                    class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600"
                                    data-hs-remove-element="#dismiss-alert">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <h2
                    class="font-semibold text-2xl   text-slate-700 dark:text-slate-100 md:py-4 py-1 text-center md:pr-40">
                    Product List </h2>
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white  border-gray-200 rounded-lg shadow-main overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-10 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <!-- Input -->
                            <div class="sm:col-span-1">
                                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <input type="text" id="hs-as-table-product-review-search"
                                        name="hs-as-table-product-review-search"
                                        class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Search" wire:model.live.debounce.250ms='search'>
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                        <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8" />
                                            <path d="m21 21-4.3-4.3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->




                            <div class="sm:col-span-2 md:grow">
                                <div class="flex justify-end gap-x-2">
                                    <div>


                                        <a href="{{ route('add_admin_product') }}">
                                            <button type="button"
                                                class="m-1 ms-0 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md shadow-sm  bg-primary text-gray-50 hover:bg-primary/90 disabled:opacity-50 disabled:pointer-events-none "
                                                {{-- data-hs-overlay="#hs-overlay-body-scrolling" --}}>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>

                                                Add Product
                                            </button>
                                        </a>


                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <table class="min-w-full divide-y divide-gray-200 dark:bg-bg_dark">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="px-2 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                ID
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                PRODUCT
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="pr-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                CATEGORY
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="pr-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                BRAND
                                            </span>
                                        </div>
                                    </th>







                                    <th scope="col" class="pr-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                VARIENTS
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                STATUS
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Action
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($products as $item)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                    <td class="  dark:text-gray-100">
                                        <span
                                            class="block  px-2 text-base font-semibold text-primary dark:text-neutral-200">
                                            # {{$item->id}}
                                        </span>
                                    </td>
                                    <td class=" whitespace-nowrap align-top">

                                        <div class="flex items-center gap-x-4 py-2 px-3">


                                            @if ($item->images->isNotEmpty())
                                            <img class="flex-shrink-0 size-[48px] object-contain rounded-lg"
                                                src="{{asset($item->images->first()->image) }}" alt="{{$item->name}}">
                                            @else
                                            <img src="" class="flex-shrink-0 size-[48px] object-contain rounded-lg"
                                                alt="{{$item->name}}">
                                            @endif

                                            <div>
                                                <span
                                                    class="block text-md capitalize font-medium text-gray-800 dark:text-neutral-200">
                                                    {{$item->name}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="  dark:text-gray-100">
                                        <div class="pr-6 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-700 dark:text-neutral-200">{{$item->category->name}}</span>
                                            <span
                                                class="block text-sm text-gray-500 dark:text-neutral-500">{{$item->subcategory->name}}</span>
                                        </div>
                                    </td>
                                    <td class="  dark:text-gray-100">
                                        <span class="block text-sm font-semibold text-gray-700 dark:text-neutral-200">
                                            {{$item->brand->name}}
                                        </span>
                                    </td>

                                    <td class=" font-medium  dark:text-gray-100">
                                        <span class="text-purple-500"> {{$item->variants->count()}}
                                        </span>
                                    </td>

                                    <td class="size-px whitespace-nowrap align-top">
                                        <button class="block p-6">
                                            @if ($item->is_active)
                                            <span
                                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Active
                                            </span>
                                            @else
                                            <span
                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-rose-100 text-rose-800 rounded-full dark:bg-rose-500/10 dark:text-rose-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                </svg>

                                                InActive
                                            </span>
                                            @endif
                                        </button>
                                    </td>
                                    <td class="size-px whitespace-nowrap ">
                                        <a href="{{ route('edit_admin_product', ['id'=>$item->id]) }}">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="size-5 text-green-800 dark:text-teal-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>

                                            </button></a>
                                        <button wire:click="delete({{$item->id}})"
                                            wire:confirm='Are you Sure Want to Delete'>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-5 ml-3 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </button>
                                    </td>

                                </tr>
                                @endforeach





                            </tbody>
                        </table>
                        <div class="p-3">
                            {{$products->links()}}
                        </div>



                    </div>