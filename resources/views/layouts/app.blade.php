<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }"
    x-bind:class="{'dark' : darkMode === true}" x-init="
    if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-cloak
    class="font-sans antialiased bg-bg_light text-black dark:bg-slate-950/80 dark:text-bg_dark_main transition-colors duration-100">
    @livewire('loader')

    <!-- =========''= HEADER ========== -->
    <header
        class="sticky top-0 inset-x-0 flex flex-wrap items-center pr-3 sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-neutral-800 dark:border-neutral-700">
        <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">

            <div class="me-5 lg:me-0 lg:hidden">
                <!-- Logo -->

                <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                    href="../templates/admin/index.html" aria-label="Preline">
                    <svg class="w-28 h-auto" width="116" height="32" viewBox="0 0 116 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M33.5696 30.8182V11.3182H37.4474V13.7003H37.6229C37.7952 13.3187 38.0445 12.9309 38.3707 12.5369C38.7031 12.1368 39.134 11.8045 39.6634 11.5398C40.1989 11.2689 40.8636 11.1335 41.6577 11.1335C42.6918 11.1335 43.6458 11.4044 44.5199 11.946C45.3939 12.4815 46.0926 13.291 46.6158 14.3743C47.139 15.4515 47.4006 16.8026 47.4006 18.4276C47.4006 20.0095 47.1451 21.3452 46.6342 22.4347C46.1295 23.518 45.4401 24.3397 44.5661 24.8999C43.6982 25.4538 42.7256 25.7308 41.6484 25.7308C40.8852 25.7308 40.2358 25.6046 39.7003 25.3523C39.1709 25.0999 38.737 24.7829 38.3984 24.4013C38.0599 24.0135 37.8014 23.6226 37.6229 23.2287H37.5028V30.8182H33.5696ZM37.4197 18.4091C37.4197 19.2524 37.5367 19.9879 37.7706 20.6158C38.0045 21.2436 38.343 21.733 38.7862 22.0838C39.2294 22.4285 39.768 22.6009 40.402 22.6009C41.0421 22.6009 41.5838 22.4254 42.027 22.0746C42.4702 21.7176 42.8056 21.2251 43.0334 20.5973C43.2673 19.9633 43.3842 19.2339 43.3842 18.4091C43.3842 17.5904 43.2704 16.8703 43.0426 16.2486C42.8149 15.6269 42.4794 15.1406 42.0362 14.7898C41.593 14.4389 41.0483 14.2635 40.402 14.2635C39.7618 14.2635 39.2202 14.4328 38.777 14.7713C38.34 15.1098 38.0045 15.59 37.7706 16.2116C37.5367 16.8333 37.4197 17.5658 37.4197 18.4091ZM49.2427 25.5V11.3182H53.0559V13.7926H53.2037C53.4622 12.9124 53.8961 12.2476 54.5055 11.7983C55.1149 11.3428 55.8166 11.1151 56.6106 11.1151C56.8076 11.1151 57.02 11.1274 57.2477 11.152C57.4754 11.1766 57.6755 11.2105 57.8478 11.2536V14.7436C57.6632 14.6882 57.4077 14.639 57.0815 14.5959C56.7553 14.5528 56.4567 14.5312 56.1859 14.5312C55.6073 14.5312 55.0903 14.6574 54.6348 14.9098C54.1854 15.156 53.8284 15.5007 53.5638 15.9439C53.3052 16.3871 53.176 16.898 53.176 17.4766V25.5H49.2427ZM64.9043 25.777C63.4455 25.777 62.1898 25.4815 61.1373 24.8906C60.0909 24.2936 59.2845 23.4503 58.7182 22.3608C58.1519 21.2652 57.8688 19.9695 57.8688 18.4737C57.8688 17.0149 58.1519 15.7346 58.7182 14.6328C59.2845 13.531 60.0816 12.6723 61.1096 12.0568C62.1437 11.4413 63.3563 11.1335 64.7474 11.1335C65.683 11.1335 66.5539 11.2843 67.3603 11.5859C68.1728 11.8814 68.8806 12.3277 69.4839 12.9247C70.0932 13.5218 70.5672 14.2727 70.9057 15.1776C71.2443 16.0762 71.4135 17.1288 71.4135 18.3352V19.4155H59.4384V16.978H67.7111C67.7111 16.4117 67.588 15.91 67.3418 15.473C67.0956 15.036 66.754 14.6944 66.317 14.4482C65.8861 14.1958 65.3844 14.0696 64.812 14.0696C64.2149 14.0696 63.6856 14.2081 63.2239 14.4851C62.7684 14.7559 62.4114 15.1222 62.1529 15.5838C61.8944 16.0393 61.762 16.5471 61.7559 17.1072V19.4247C61.7559 20.1264 61.8851 20.7327 62.1437 21.2436C62.4083 21.7545 62.7807 22.1484 63.2608 22.4254C63.741 22.7024 64.3103 22.8409 64.9689 22.8409C65.406 22.8409 65.8061 22.7794 66.1692 22.6562C66.5324 22.5331 66.8432 22.3485 67.1018 22.1023C67.3603 21.8561 67.5572 21.5545 67.6927 21.1974L71.3304 21.4375C71.1458 22.3116 70.7672 23.0748 70.1948 23.7273C69.6285 24.3736 68.896 24.8783 67.9974 25.2415C67.1048 25.5985 66.0738 25.777 64.9043 25.777ZM77.1335 6.59091V25.5H73.2003V6.59091H77.1335ZM79.5043 25.5V11.3182H83.4375V25.5H79.5043ZM81.4801 9.49006C80.8954 9.49006 80.3937 9.29616 79.9752 8.90838C79.5628 8.51444 79.3566 8.04356 79.3566 7.49574C79.3566 6.95407 79.5628 6.48935 79.9752 6.10156C80.3937 5.70762 80.8954 5.51065 81.4801 5.51065C82.0649 5.51065 82.5635 5.70762 82.9759 6.10156C83.3944 6.48935 83.6037 6.95407 83.6037 7.49574C83.6037 8.04356 83.3944 8.51444 82.9759 8.90838C82.5635 9.29616 82.0649 9.49006 81.4801 9.49006ZM89.7415 17.3011V25.5H85.8083V11.3182H89.5569V13.8203H89.723C90.037 12.9955 90.5632 12.343 91.3019 11.8629C92.0405 11.3767 92.9361 11.1335 93.9887 11.1335C94.9735 11.1335 95.8322 11.349 96.5647 11.7798C97.2971 12.2107 97.8665 12.8262 98.2728 13.6264C98.679 14.4205 98.8821 15.3684 98.8821 16.4702V25.5H94.9489V17.1719C94.9551 16.304 94.7335 15.6269 94.2841 15.1406C93.8348 14.6482 93.2162 14.402 92.4283 14.402C91.8989 14.402 91.4311 14.5159 91.0249 14.7436C90.6248 14.9714 90.3109 15.3037 90.0831 15.7408C89.8615 16.1716 89.7477 16.6918 89.7415 17.3011ZM107.665 25.777C106.206 25.777 104.951 25.4815 103.898 24.8906C102.852 24.2936 102.045 23.4503 101.479 22.3608C100.913 21.2652 100.63 19.9695 100.63 18.4737C100.63 17.0149 100.913 15.7346 101.479 14.6328C102.045 13.531 102.842 12.6723 103.87 12.0568C104.905 11.4413 106.117 11.1335 107.508 11.1335C108.444 11.1335 109.315 11.2843 110.121 11.5859C110.934 11.8814 111.641 12.3277 112.245 12.9247C112.854 13.5218 113.328 14.2727 113.667 15.1776C114.005 16.0762 114.174 17.1288 114.174 18.3352V19.4155H102.199V16.978H110.472C110.472 16.4117 110.349 15.91 110.103 15.473C109.856 15.036 109.515 14.6944 109.078 14.4482C108.647 14.1958 108.145 14.0696 107.573 14.0696C106.976 14.0696 106.446 14.2081 105.985 14.4851C105.529 14.7559 105.172 15.1222 104.914 15.5838C104.655 16.0393 104.523 16.5471 104.517 17.1072V19.4247C104.517 20.1264 104.646 20.7327 104.905 21.2436C105.169 21.7545 105.542 22.1484 106.022 22.4254C106.502 22.7024 107.071 22.8409 107.73 22.8409C108.167 22.8409 108.567 22.7794 108.93 22.6562C109.293 22.5331 109.604 22.3485 109.863 22.1023C110.121 21.8561 110.318 21.5545 110.454 21.1974L114.091 21.4375C113.907 22.3116 113.528 23.0748 112.956 23.7273C112.389 24.3736 111.657 24.8783 110.758 25.2415C109.866 25.5985 108.835 25.777 107.665 25.777Z"
                            class="fill-blue-600 dark:fill-white" fill="currentColor" />
                        <path
                            d="M1 29.5V16.5C1 9.87258 6.37258 4.5 13 4.5C19.6274 4.5 25 9.87258 25 16.5C25 23.1274 19.6274 28.5 13 28.5H12"
                            class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                        <path
                            d="M5 29.5V16.66C5 12.1534 8.58172 8.5 13 8.5C17.4183 8.5 21 12.1534 21 16.66C21 21.1666 17.4183 24.82 13 24.82H12"
                            class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                        <circle cx="13" cy="16.5214" r="5" class="fill-blue-600 dark:fill-white" fill="currentColor" />
                    </svg>
                </a>
                <!-- End Logo -->
            </div>

            <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
                <div class="sm:hidden">
                    <button type="button"
                        class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:block">
                    <label for="icon" class="sr-only">Search</label>
                    <div class="relative min-w-72 md:min-w-80">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                            <svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-400"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input type="text" id="icon" name="icon"
                            class="py-2 px-4 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Search">
                    </div>
                </div>

                <div class="flex flex-row items-center justify-end gap-2">
                    <button type="button"
                        class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                    </button>
                    <button type="button"
                        class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                        data-hs-offcanvas="#hs-offcanvas-right">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                        </svg>
                    </button>

                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-dropdown-with-header" type="button"
                            class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                            <img class="inline-block size-[38px] rounded-full ring-2 ring-white dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                alt="Image Description">
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-900 dark:border dark:border-neutral-700"
                            aria-labelledby="hs-dropdown-with-header">
                            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-neutral-800">
                                <p class="text-sm text-gray-500 dark:text-neutral-400">Signed in as</p>
                                <p class="text-sm font-medium text-gray-800 dark:text-neutral-300">james@site.com</p>
                            </div>
                            <div class="mt-2 py-2 first:pt-0 last:pb-0">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                                    </svg>
                                    Newsletter
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                        <path d="M3 6h18" />
                                        <path d="M16 10a4 4 0 0 1-8 0" />
                                    </svg>
                                    Purchases
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                        <path d="M12 12v9" />
                                        <path d="m8 17 4 4 4-4" />
                                    </svg>
                                    Downloads
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                                    href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    Team Account
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <button x-on:click="darkMode = !darkMode" type="button" class="text-gray-900 dark:text-gray-100 ">
                <svg x-show="! darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div
        class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex justify-between items-center py-2">
            <!-- Breadcrumb -->

            <ol class="ms-3 flex items-center whitespace-nowrap">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Application Layout
                    <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500"
                        width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->

            <!-- Sidebar -->
            <button type="button"
                class="py-2 px-3 flex justify-center items-center gap-x-1.5 text-xs rounded-lg border border-gray-200 text-gray-500 hover:text-gray-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200"
                data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Sidebar">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
                </svg>
                <span class="sr-only">Sidebar</span>
            </button>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="application-sidebar" class="hs-overlay [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px]
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800 dark:border-neutral-700
   ">
        <div class="px-8 pt-4">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="../templates/admin/index.html" aria-label="Preline">
                <svg class="w-28 h-auto" width="116" height="32" viewBox="0 0 116 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M33.5696 30.8182V11.3182H37.4474V13.7003H37.6229C37.7952 13.3187 38.0445 12.9309 38.3707 12.5369C38.7031 12.1368 39.134 11.8045 39.6634 11.5398C40.1989 11.2689 40.8636 11.1335 41.6577 11.1335C42.6918 11.1335 43.6458 11.4044 44.5199 11.946C45.3939 12.4815 46.0926 13.291 46.6158 14.3743C47.139 15.4515 47.4006 16.8026 47.4006 18.4276C47.4006 20.0095 47.1451 21.3452 46.6342 22.4347C46.1295 23.518 45.4401 24.3397 44.5661 24.8999C43.6982 25.4538 42.7256 25.7308 41.6484 25.7308C40.8852 25.7308 40.2358 25.6046 39.7003 25.3523C39.1709 25.0999 38.737 24.7829 38.3984 24.4013C38.0599 24.0135 37.8014 23.6226 37.6229 23.2287H37.5028V30.8182H33.5696ZM37.4197 18.4091C37.4197 19.2524 37.5367 19.9879 37.7706 20.6158C38.0045 21.2436 38.343 21.733 38.7862 22.0838C39.2294 22.4285 39.768 22.6009 40.402 22.6009C41.0421 22.6009 41.5838 22.4254 42.027 22.0746C42.4702 21.7176 42.8056 21.2251 43.0334 20.5973C43.2673 19.9633 43.3842 19.2339 43.3842 18.4091C43.3842 17.5904 43.2704 16.8703 43.0426 16.2486C42.8149 15.6269 42.4794 15.1406 42.0362 14.7898C41.593 14.4389 41.0483 14.2635 40.402 14.2635C39.7618 14.2635 39.2202 14.4328 38.777 14.7713C38.34 15.1098 38.0045 15.59 37.7706 16.2116C37.5367 16.8333 37.4197 17.5658 37.4197 18.4091ZM49.2427 25.5V11.3182H53.0559V13.7926H53.2037C53.4622 12.9124 53.8961 12.2476 54.5055 11.7983C55.1149 11.3428 55.8166 11.1151 56.6106 11.1151C56.8076 11.1151 57.02 11.1274 57.2477 11.152C57.4754 11.1766 57.6755 11.2105 57.8478 11.2536V14.7436C57.6632 14.6882 57.4077 14.639 57.0815 14.5959C56.7553 14.5528 56.4567 14.5312 56.1859 14.5312C55.6073 14.5312 55.0903 14.6574 54.6348 14.9098C54.1854 15.156 53.8284 15.5007 53.5638 15.9439C53.3052 16.3871 53.176 16.898 53.176 17.4766V25.5H49.2427ZM64.9043 25.777C63.4455 25.777 62.1898 25.4815 61.1373 24.8906C60.0909 24.2936 59.2845 23.4503 58.7182 22.3608C58.1519 21.2652 57.8688 19.9695 57.8688 18.4737C57.8688 17.0149 58.1519 15.7346 58.7182 14.6328C59.2845 13.531 60.0816 12.6723 61.1096 12.0568C62.1437 11.4413 63.3563 11.1335 64.7474 11.1335C65.683 11.1335 66.5539 11.2843 67.3603 11.5859C68.1728 11.8814 68.8806 12.3277 69.4839 12.9247C70.0932 13.5218 70.5672 14.2727 70.9057 15.1776C71.2443 16.0762 71.4135 17.1288 71.4135 18.3352V19.4155H59.4384V16.978H67.7111C67.7111 16.4117 67.588 15.91 67.3418 15.473C67.0956 15.036 66.754 14.6944 66.317 14.4482C65.8861 14.1958 65.3844 14.0696 64.812 14.0696C64.2149 14.0696 63.6856 14.2081 63.2239 14.4851C62.7684 14.7559 62.4114 15.1222 62.1529 15.5838C61.8944 16.0393 61.762 16.5471 61.7559 17.1072V19.4247C61.7559 20.1264 61.8851 20.7327 62.1437 21.2436C62.4083 21.7545 62.7807 22.1484 63.2608 22.4254C63.741 22.7024 64.3103 22.8409 64.9689 22.8409C65.406 22.8409 65.8061 22.7794 66.1692 22.6562C66.5324 22.5331 66.8432 22.3485 67.1018 22.1023C67.3603 21.8561 67.5572 21.5545 67.6927 21.1974L71.3304 21.4375C71.1458 22.3116 70.7672 23.0748 70.1948 23.7273C69.6285 24.3736 68.896 24.8783 67.9974 25.2415C67.1048 25.5985 66.0738 25.777 64.9043 25.777ZM77.1335 6.59091V25.5H73.2003V6.59091H77.1335ZM79.5043 25.5V11.3182H83.4375V25.5H79.5043ZM81.4801 9.49006C80.8954 9.49006 80.3937 9.29616 79.9752 8.90838C79.5628 8.51444 79.3566 8.04356 79.3566 7.49574C79.3566 6.95407 79.5628 6.48935 79.9752 6.10156C80.3937 5.70762 80.8954 5.51065 81.4801 5.51065C82.0649 5.51065 82.5635 5.70762 82.9759 6.10156C83.3944 6.48935 83.6037 6.95407 83.6037 7.49574C83.6037 8.04356 83.3944 8.51444 82.9759 8.90838C82.5635 9.29616 82.0649 9.49006 81.4801 9.49006ZM89.7415 17.3011V25.5H85.8083V11.3182H89.5569V13.8203H89.723C90.037 12.9955 90.5632 12.343 91.3019 11.8629C92.0405 11.3767 92.9361 11.1335 93.9887 11.1335C94.9735 11.1335 95.8322 11.349 96.5647 11.7798C97.2971 12.2107 97.8665 12.8262 98.2728 13.6264C98.679 14.4205 98.8821 15.3684 98.8821 16.4702V25.5H94.9489V17.1719C94.9551 16.304 94.7335 15.6269 94.2841 15.1406C93.8348 14.6482 93.2162 14.402 92.4283 14.402C91.8989 14.402 91.4311 14.5159 91.0249 14.7436C90.6248 14.9714 90.3109 15.3037 90.0831 15.7408C89.8615 16.1716 89.7477 16.6918 89.7415 17.3011ZM107.665 25.777C106.206 25.777 104.951 25.4815 103.898 24.8906C102.852 24.2936 102.045 23.4503 101.479 22.3608C100.913 21.2652 100.63 19.9695 100.63 18.4737C100.63 17.0149 100.913 15.7346 101.479 14.6328C102.045 13.531 102.842 12.6723 103.87 12.0568C104.905 11.4413 106.117 11.1335 107.508 11.1335C108.444 11.1335 109.315 11.2843 110.121 11.5859C110.934 11.8814 111.641 12.3277 112.245 12.9247C112.854 13.5218 113.328 14.2727 113.667 15.1776C114.005 16.0762 114.174 17.1288 114.174 18.3352V19.4155H102.199V16.978H110.472C110.472 16.4117 110.349 15.91 110.103 15.473C109.856 15.036 109.515 14.6944 109.078 14.4482C108.647 14.1958 108.145 14.0696 107.573 14.0696C106.976 14.0696 106.446 14.2081 105.985 14.4851C105.529 14.7559 105.172 15.1222 104.914 15.5838C104.655 16.0393 104.523 16.5471 104.517 17.1072V19.4247C104.517 20.1264 104.646 20.7327 104.905 21.2436C105.169 21.7545 105.542 22.1484 106.022 22.4254C106.502 22.7024 107.071 22.8409 107.73 22.8409C108.167 22.8409 108.567 22.7794 108.93 22.6562C109.293 22.5331 109.604 22.3485 109.863 22.1023C110.121 21.8561 110.318 21.5545 110.454 21.1974L114.091 21.4375C113.907 22.3116 113.528 23.0748 112.956 23.7273C112.389 24.3736 111.657 24.8783 110.758 25.2415C109.866 25.5985 108.835 25.777 107.665 25.777Z"
                        class="fill-blue-600 dark:fill-white" fill="currentColor" />
                    <path
                        d="M1 29.5V16.5C1 9.87258 6.37258 4.5 13 4.5C19.6274 4.5 25 9.87258 25 16.5C25 23.1274 19.6274 28.5 13 28.5H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <path
                        d="M5 29.5V16.66C5 12.1534 8.58172 8.5 13 8.5C17.4183 8.5 21 12.1534 21 16.66C21 21.1666 17.4183 24.82 13 24.82H12"
                        class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <circle cx="13" cy="16.5214" r="5" class="fill-blue-600 dark:fill-white" fill="currentColor" />
                </svg>
            </a>
            <!-- End Logo -->
        </div>

        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <p class="text-sm pb-2 dark:text-gray-200 font-medium">DASHBOARD</p>
                    <a class="flex items-center gap-x-3.5 font-medium py-2 px-2.5  text-[16px] text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>

                        Dashboard
                    </a>
                </li>

                <p class="text-sm py-1.5 dark:text-gray-200 font-medium uppercase">PRODUCTS</p>



                <li class="hs-accordion" id="account-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-[16px] font-medium text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        Products

                        <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="account-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="pt-2 ps-2">
                            <li>
                                <a class="flex items-center gap-x-3.5 font-medium py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="{{ route('admin_brand') }}">
                                    Brand
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center font-medium gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="{{ route('admin_category') }}">
                                    Category
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center font-medium gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="{{ route('admin_sub_category') }}">
                                    Sub Category
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 font-medium py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="{{ route('admin_product') }}">
                                    Products
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="hs-accordion" id="projects-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-[16px] font-medium text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        </svg>
                        Delivery Boy

                        <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="projects-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="pt-2 ps-2">
                            <li>
                                <a class="flex items-center font-medium gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="{{ route('delivery_boys_list') }}">
                                    Delivery Boys
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="#">
                                    Link 2
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300"
                                    href="#">
                                    Link 3
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                            <line x1="16" x2="16" y1="2" y2="6" />
                            <line x1="8" x2="8" y1="2" y2="6" />
                            <line x1="3" x2="21" y1="10" y2="10" />
                            <path d="M8 14h.01" />
                            <path d="M12 14h.01" />
                            <path d="M16 14h.01" />
                            <path d="M8 18h.01" />
                            <path d="M12 18h.01" />
                            <path d="M16 18h.01" />
                        </svg>
                        Calendar
                    </a></li>
                <li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                        Documentation
                    </a></li>
            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full lg:ps-64">

        <main>
            {{ $slot }}
        </main>
    </div>
    @livewire('drawer')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @apexchartsScripts
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->


    @stack('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('livewire:init', () => {
        const drawer = document.querySelector('#hs-overlay-body-scrolling');
        if (!drawer) return;
        
Livewire.on('openDrawer', () => {
        drawer.classList.remove('translate-x-full');
    drawer.classList.add('translate-x-0');


});

Livewire.on('closeDrawer',()=>{
    setTimeout(() => {
    drawer.classList.add('translate-x-full');
    drawer.classList.remove('translate-x-0');
    }, 10);
 
})

    });
    });


    </script>
</body>

</html>