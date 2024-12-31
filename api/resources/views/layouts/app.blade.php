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
<script src="https://cdn.tiny.cloud/1/dyvcdak6c5yaohddgjqsep6um1xmk9lcuvrs9i0xmqr44zkm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
    </head>
    
    <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
    {{-- Toast --}}
    <x-mary-toast />
         {{-- The navbar with `sticky` and `full-width` --}}
        {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width>
 
        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
 
            {{-- Brand --}}
            <div>FARMITRA ADMIN</div>
        </x-slot:brand>
 
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
        </x-slot:actions>
    </x-mary-nav>
        {{-- MAIN --}}
        <x-mary-main full-width class="flex h-screen">
            
            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible  collapse-text="Hide it" class="bg-green-50 lg:bg-green-50 fixed shadow-lg ">
                {{-- MENU --}}
                <x-mary-menu activate-by-route>
     
                    {{-- User --}}
                    @if($user = auth()->user())
                        <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                            <x-slot:actions>
                                <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                            </x-slot:actions>
                        </x-mary-list-item>
                        <x-mary-menu-separator />
                    @endif
                    <x-mary-menu-item title="Dashboard" icon="o-home" link="{{route('dashboard')}}" />
                    <x-mary-menu-item title="Experts Management" icon="o-hand-raised" link="{{route('expert-management')}}" />
                    <x-mary-menu-item title="Blogs" icon="o-calendar-days" link="{{route('blog-management')}}" />
                    <x-mary-menu-item title="User Management" icon="o-user" link="{{route('user-management')}}" />
                    <x-mary-menu-sub title="Crop Management" icon="o-viewfinder-circle">
                        <x-mary-menu-item title="Add Crop Category" icon="o-plus-circle"  link="{{route('crop-management')}}" />
                        <x-mary-menu-item title="Add Crops" icon="o-plus-circle"  link="{{route('sub-crop')}}" />
                        <x-mary-menu-item title="Crop Timeline" icon="o-clock" link="{{route('crop-timeline')}}" />
                        <x-mary-menu-item title="Crop Advisory" icon="o-book-open" link="{{route('crop-advisory-stages')}}" />
                        <x-mary-menu-item title="Crop Protection" icon="o-shield-check" link="{{route('crop-protection')}}" />
                        
                    </x-mary-menu-sub>
                    <x-mary-menu-item title="Farm Management" icon="o-building-office-2" link="#" />
                    <x-mary-menu-sub title="Feed Management" icon="o-chat-bubble-oval-left-ellipsis">
                        <x-mary-menu-item title="All Feed Analytics" icon="o-inbox" link="{{route('feed-management')}}" />
                        <x-mary-menu-item title="Post Feed " icon="o-chat-bubble-bottom-center-text" link="{{route('post-feed-management')}}" />
                        <x-mary-menu-item title="Video Feed " icon="o-video-camera" link="{{route('video-feed-management')}}" />
                        <x-mary-menu-item title="News Feed " icon="o-newspaper" link="{{route('news-feed-management')}}" />
                    </x-mary-menu-sub>
                    
                    <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-mary-menu-item title="App Settings" icon="o-play" link="####" />
                    </x-mary-menu-sub>
                </x-mary-menu>
            </x-slot:sidebar>
                <x-slot:content class="flex-1 md:ml-64 md:w-[calc(100vw-273px)]">
                    {{ $slot }}
                </x-slot:content>
            {{-- The `$slot` goes here --}}
            
        </x-mary-main>
        @stack('js')
    </body>
</html>
