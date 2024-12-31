<header class="">
    <div
        class="z-50 animate_animated animate_fadeInDown p-3 px-8 shadow-2xl bg-white md:my-3 absolute md:w-[80%] w-full md:left-[10%] rounded flex justify-between items-center">
        <div class=" ">
            <a href="{{ route('index') }}">
                <img src="{{URL::to('apew_logo_trans.png')}}" alt="logo" class=" w-24">
            </a>
        </div>
        <div class="hidden md:block ">
            <ul class=" flex justify-start space-x-6">
                <li class=""><a href="{{ route('index') }}" class="secondarycolor">Home</a></li>
                <li><a href="{{ route('about') }}" class=" hover:text-[#EF9920]">About Us</a></li>
                <li><a href="{{ route('features') }}" class=" hover:text-[#EF9920]">Features</a></li>
                <li><a href="{{ route('download') }}" class=" hover:text-[#EF9920]">Download</a></li>
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
</header>