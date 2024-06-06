<div>
    <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8  mx-auto ">
        <!-- Card -->
        <div class="flex flex-col ">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white  border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
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

                            <h2
                                class="font-semibold md:text-xl   text-slate-800 dark:text-slate-100 md:py-4 py-2 text-center md:pr-40">
                                Product Sub Category </h2>


                            <div class="sm:col-span-2 md:grow">
                                <div class="flex justify-end gap-x-2">
                                    <div>


                                        <button
                                            wire:click="$dispatch('openDrawer',{event:{component:'add-sub-category',params:{}}})"
                                            {{-- wire:click="addNew" --}} type="button"
                                            class="m-1 ms-0 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md shadow-sm  bg-primary text-gray-100 hover:bg-primary disabled:opacity-50 disabled:pointer-events-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>

                                            Add Sub Category
                                        </button>



                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <table class="min-w-full divide-y divide-gray-200 dark:bg-bg_dark">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-sm font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Category
                                            </span>
                                        </div>
                                    </th>





                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-sm font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Sub Category
                                            </span>
                                        </div>
                                    </th>



                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-sm font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Status
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-sm font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Action
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($categoryList as $cat)
                                <tr class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                    <td class="size-px whitespace-nowrap">

                                        <div class="flex items-center gap-x-4 px-5 py-1.5">


                                            {{-- @if ($cat->icon) --}}

                                            <img class="flex-shrink-0 size-[48px] object-contain rounded-lg"
                                                src="{{asset($cat->icon) }}" alt="{{$cat->name}}">

                                            {{-- @endif --}}
                                            <div>
                                                <span
                                                    class="block text-md capitalize font-medium text-gray-800 dark:text-neutral-200">
                                                    {{$cat->name}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($cat->subCategory as $subCat)
                                            <tr>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                        </table>
                        {{--
                        <!-- End Table -->
                        @script
                        <script>
                            $wire.on('openDrawer', () => {
                                   
                                    HSOverlay.open('#hs-overlay-body-scrolling');
                                });
                            $wire.on('closeDrawer', () => {
                                 
                                    HSOverlay.close('#hs-overlay-body-scrolling');
                                });
                        </script>
                        @endscript --}}



                    </div>