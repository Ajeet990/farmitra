<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{--
    <link href="{{URL::to('dashboard.css')}}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Scripts -->
    {{--
    <livewire:modals /> --}}

    <style>
        * {
            box-sizing: border-box !important;
        }

        [x-cloak] {
            display: none !important;
        }

        input,
        select,
        textarea {
            border-radius: 3px !important;
            border: 1px solid #ccc !important;
        }

        .app-sidebar__inner i.fa {
            font-size: 22px !important;
            background: #c6fbcd;
            border-radius: 100px;
        }

        .dt-buttons button {
            background: #c6fbcd !important;
            border: none !important;
            box-shadow: 1px 1px 10px #ccc !important;
            border-radius: 25px !important;
            font-size: 10px !important;
            font-weight: 600 !important;
            color: #3d3d3d !important;
        }

        .mybtn {
            background: #c6fbcd !important;
            border: none !important;
            box-shadow: 1px 1px 10px #ccc !important;
            border-radius: 25px !important;
            font-size: 10px !important;
            font-weight: 600 !important;
            color: #3d3d3d !important;
        }

        .mybtnround {
            border: none !important;
            box-shadow: 1px 1px 10px #ccc !important;
            border-radius: 25px !important;
            font-size: 10px !important;
            font-weight: 600 !important;
        }

        .secondarycolor {
            color: #EF9920 !important;
        }

        .primarycolor {
            color: #31A05F;
        }
    </style>
</head>

<body class="font-sans antialiased overflow-x-hidden">
    <div class="hero-section h-screen w-screen" style="background: url({{URL::to('background.png')}});background-size: cover;
        background-position: center;">
        <div
            class=" animate_animated animate_fadeInDown p-3 px-8 shadow-2xl bg-white md:my-3 absolute md:w-[80%] w-full md:left-[10%] rounded flex justify-between items-center">
            <div class="logo ">
                <a href="{{ route('index') }}">
                    <img src="{{URL::to('apew_logo_trans.png')}}" alt="logo" class=" w-24">
                </a>
            </div>
            <div class="hidden md:block ">
                <ul class=" flex justify-start space-x-6">
                    <li class=""><a href="{{ route('index') }}" class="secondarycolor">Home</a></li>
                    <li><a href="{{ route('about') }}" class=" hover:text-[#EF9920]">About Us</a></li>
                    <li><a href="{{ route('features') }}" class=" hover:text-[#EF9920]">Features</a></li>
                    <li><a href="{{route('download')}}" class=" hover:text-[#EF9920]">Download</a></li>
                    <li><a href="{{ route('contact') }}" class=" hover:text-[#EF9920]">Contact us</a></li>
                </ul>
            </div>
            <button class="md:hidden blcok" id="menuOpenBtn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd" />
                </svg>

            </button>
        </div>
        <div class=" w-full h-full flex justify-center text-center items-center flex-col space-y-6">
            <p class=" md:text-6xl text-4xl font-bold primarycolor  animate_animated animate_fadeInDown">
                Crafted with Love for
            </p>
            <p class=" md:text-6xl text-4xl font-bold  primarycolor  animate_animated animate_fadeInDown">
                our Indian Farmers
            </p>

            <button class=" bg-[#EF9920] p-2 rounded text-white px-6  animate_animated animate_fadeInDown">Get
                Started</button>
        </div>
    </div>
    {{-- hero section end here --}}
    <div class="w-full py-4">
        <h2 class=" mt-4 font-bold text-3xl text-center w-full" data-aos="fade-up">Tailor-made features
        </h2>
        <div class=" text-center  my-3 space-y-2" data-aos="fade-up">
            <p class=" ">
                We are on mission of making our farmers empower with tools
            </p>
            <p>that will increase their income</p>
        </div>
        <div class="w-[80%] m-auto grid lg:grid-cols-3 gap-x-3 sm:grid-cols-2 gap-y-5 mt-8 ">
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class="  text-center shadow p-8 border rounded hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('weather.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Weather Forcast</h3>
                <p>Get the weather forcast for your area</p>
                <p> and major alert</p>
            </div>
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class="  text-center shadow p-8 hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('shop.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Market View</h3>
                <p>Get the market view for your area</p>
                <p> and major alert</p>
            </div>
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class=" text-center shadow p-8 hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('agrisolution.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Expert Solution</h3>
                <p>Our agri experts will help you to diagnosis</p>
                <p>your crop disease and provide best solution</p>
            </div>
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class="text-center shadow p-8 hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('agriknowledge.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Agri Knowledge</h3>
                <p>Always get update with lates agri</p>
                <p>knowledge with post and videos</p>
            </div>
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class=" text-center shadow p-8 hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('agrishop.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Agri Shop</h3>
                <p>One stop solution of every agri product</p>
                <p>needs with door step delivery</p>
            </div>
            <div data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                class=" text-center shadow p-8 hover:bg-[#31A05F] hover:text-white transition-all">
                <div class=" flex justify-center">
                    <img src="{{URL::to('mandi.png')}}" alt="" class=" w-[100px]">
                </div>
                <h3 class=" font-bold text-xl my-3">Mandi</h3>
                <p>Buy and Sell commodity with Farmitra</p>
                <p>verified buyers and seller</p>
            </div>
        </div>
    </div>
    <div class="w-full py-4 bg-[#31A05F] h-[200px] mb-[150px] relative">
        <div class=" text-center text-white space-y-3">
            <h2 class=" md:text-5xl text-3xl font-bold">
                Some count that matters
            </h2>
            <p>
                Our achievement in the journey depicted in numbers
            </p>
        </div>
        <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
            class=" shadow-xl p-4 rounded-xl bg-white absolute w-[80%] left-[10%] top-[140px]">
            <div class=" grid md:grid-cols-4 grid-cols-2 p-4 px-10 gap-4">
                <div class=" text-center">
                    <div class=" text-[#EF9920] text-5xl">
                        <i class="fa fa-smile"></i>
                    </div>
                    <h2 class=" md:text-4xl mt-3 font-bold text-[#31A05F]">
                        50M
                    </h2>
                    <p>Happy Farmers</p>
                </div>
                <div class=" text-center">
                    <div class=" text-[#EF9920] text-5xl">
                        <i class=" fa fa-truck"></i>
                    </div>
                    <h2 class=" md:text-4xl mt-3 font-bold text-[#31A05F]">
                        1M
                    </h2>
                    <p>Product Deliver</p>
                </div>
                <div class=" text-center">
                    <div class=" text-[#EF9920] text-5xl">
                        <i class=" fa fa-users"></i>
                    </div>
                    <h2 class=" md:text-4xl mt-3 font-bold text-[#31A05F]">
                        15M
                    </h2>
                    <p>Farmers In Community</p>
                </div>
                <div class=" text-center">
                    <div class=" text-[#EF9920] text-5xl">
                        <i class=" fa fa-shopping-cart"></i>
                    </div>
                    <h2 class=" md:text-4xl mt-3 font-bold text-[#31A05F]">
                        100M
                    </h2>
                    <p>Buy & Sell on Platform</p>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-40 md:pt-20  pb-16 mt-20 grid md:grid-cols-2 items-center gap-12 md:px-20 px-7">
        <div class="  px-3">

            <h2
                class="!leading-tight text-gray-900 w-fit tracking-tight text-balance text-5xl md:text-5xl lg:text-6xl font-bold">
                Manage your <span class="bg-home inline-block p-0.5 text-white px-5 ">farm</span>
                from your mobile</h2>
            <p class="mt-4">Download the Formitra app today and revolutionize your farming experience with cutting-edge
                tools,
                real-time updates, and a supportive community at your fingertips!
            </p>


            <div class="mt-10">
                <div><img src="{{ asset('google-play-and-apple-app-store-logos-22.png') }}" class="w-[320px] " alt="">
                </div>
                <div></div>
            </div>

        </div>
        <div class="flex items-end gap-1 justify-center">
            <img src="{{ asset('2.png') }}" alt="" class="h-[280px] ">
            <img src="{{ asset('1.png') }}" class="h-[440px] " alt="">

        </div>
    </div>

    @extends('footer')