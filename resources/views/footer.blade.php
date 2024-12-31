<footer class=" md:px-24 px-6 py-8 bg-gray-50">
    <div class=" grid lg:grid-cols-12 gap-y-4">
        <div class=" col-span-4">
            <div class=" logo mb-6">
                <img src="{{URL::to('apew_logo_trans.png')}}" alt="" class=" w-36">

            </div>
            <ul class=" flex space-x-4">
                <li class=" w-10 h-10 bg-purple-500 text-white flex justify-center items-center rounded-full">
                    <i class=" fa fa-instagram text-xl"></i>
                </li>
                <li class="w-10 h-10 bg-green-500 text-white flex justify-center items-center rounded-full">
                    <i class=" fa fa-whatsapp  text-xl"></i>
                </li>
                <li class="w-10 h-10 bg-red-500 text-white flex justify-center items-center rounded-full">
                    <i class=" fa fa-youtube  text-xl"></i>
                </li>
                <li class="w-10 h-10 bg-blue-400 text-white flex justify-center items-center rounded-full">
                    <i class=" fa fa-twitter  text-xl"></i>
                </li>
                <li class="w-10 h-10 bg-blue-500 text-white flex justify-center items-center rounded-full">
                    <i class=" fa fa-facebook  text-xl"></i>
                </li>
            </ul>
        </div>
        <div class=" col-span-2">
            <h4 class=" font-bold text-xl mb-2">Company</h4>
            <ul class=" space-y-2">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('features') }}">Features</a></li>
                <li><a href="{{ route('download') }}">Downloads</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
            </ul>
        </div>
        <div class=" sm:col-span-2 col-span-full">
            <h4 class=" font-bold text-xl mb-2">Support</h4>
            <ul class=" space-y-2">
                <li><a href="{{ route('contact') }}">Help Center</a></li>
                <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
            </ul>
        </div>
        <div class=" col-span-4">
            <h2 class=" font-bold text-xl mb-2">Stay up to date</h2>
            <input type="email" placeholder="Your Email address"
                class=" mt-4 bg-green-600 text-white placeholder:text-white">
        </div>
    </div>
</footer>
{{-- Mobile Menu bat --}}
<div id="mobileMenu"
    class="fixed duration-700 transition-all  top-0 left-0 w-full h-full md:h-0 z-50 bg-teal-600/90 backdrop-blur-[1px] ease-in-out overflow-hidden">
    <button class="fixed right-5 top-6" id="menuCloseBtn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="w-10 h-10 text-white stroke-2">
            <path fill-rule="evenodd"
                d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div class="text-white text-center  h-full w-full">
        <ul class=" flex justify-center flex-col items-center h-full w-full space-x-6 gap-8">
            <li class=""><a href="{{route('index')}}" class="secondarycolor font-medium text-4xl  ">Home</a></li>
            <li><a href="{{route('about')}}" class=" hover:text-[#EF9920] font-medium text-4xl ">About Us</a></li>
            <li><a href="{{route('features')}}" class=" hover:text-[#EF9920] font-medium text-4xl ">Features</a></li>
            <li><a href="{{route('download')}}" class=" hover:text-[#EF9920] font-medium text-4xl">Download</a></li>
            <li><a href="{{route('contact')}}" class=" hover:text-[#EF9920] font-medium text-4xl ">Contact us</a></li>
        </ul>
    </div>
</div>

<p class="bg-gray-50 text-center p-4">{{date('Y')}} &copy;Copyright. All Rights Reserved | <b class=" text-green-800">FARMITRA</b>
</p>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 800, // values from 0 to 3000, with step 50ms
  easing: 'ease',
        });
</script>

</body>

</html>