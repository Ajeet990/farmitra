<div>
    <div class="w-full h-full flex relative">
        <div
            class="bg-home md:-skew-x-[25deg] flex justify-center md:items-end items-center  md:-ml-16  h-56 md:w-3/5 w-full ">
            <h2 class="font-bold md:text-5xl md:pb-[45px] text-white text-4xl md:skew-x-[25deg]">Contact Us</h2>
        </div>

    </div>

    <div style="background-image: url('{{asset('bg-map.png')}}')"
        class="min-h-screen grid pb-10 px-7 md:grid-cols-2 bg-bottom gap-12 w-full md:px-20  bg-no-repeat bg-contain mt-10">

        <div>
            <h3 class="font-semibold text-3xl first-letter:text-home">
                Contact Us
            </h3>

            <div class="md:mt-[70px] mt-7 bg-white w-full  p-5 flex gap-7 items-center">
                <div>
                    <img src="{{ asset('location.png') }}" alt="" class="w-[50px]">
                </div>
                <div>
                    <h3 class="font-medium text-xl mb-0.5">Address</h3>
                    <p>Apartments, B-1, B-2, Ranjit Nagar Commercial Complex, New Delhi – 110 008</p>
                </div>
            </div>
            <div class="mt-7 bg-white w-full p-5 flex gap-7 items-center">
                <div>
                    <img src="{{ asset('email.png') }}" alt="" class="w-[50px]">
                </div>
                <div>
                    <h3 class="font-medium text-xl mb-0.5">Email</h3>
                    <p>testing@gmail.com</p>
                </div>
            </div>
            <div class="mt-7 bg-white w-full p-5 flex gap-7 items-center">
                <div>
                    <img src="{{ asset('phone-call.png') }}" alt="" class="w-[50px]">
                </div>
                <div>
                    <h3 class="font-medium text-xl mb-0.5">Phone</h3>

                    <p>+91 9988998899</p>
                </div>
            </div>

        </div>
        <div class="md:p-4">
            <h3 class="font-semibold text-3xl first-letter:text-home">Send a Message
            </h3>

            <div class="mt-5">
                <label for="" class="font-medium">Name :</label>
                <input placeholder="Name" type="text"
                    class="w-full shadow-main py-3 border-transparent rounded-sm  mt-2 " name="" id="">

            </div>
            <div class="mt-3">
                <label for="" class="font-medium">Email :</label>
                <input placeholder="jogn@gmail.com" type="text"
                    class="w-full shadow-main py-3 border-transparent rounded-sm  mt-2 " name="" id="">

            </div>
            <div class="mt-3">
                <label for="" class="font-medium">Phone No. :</label>
                <input placeholder="9900990099" type="text"
                    class="w-full shadow-main py-3 border-transparent rounded-sm  mt-2 " name="" id="">

            </div>
            <div class="mt-3">
                <label for="" class="font-medium
                ">Message :</label>
                <textarea name="" class="w-full shadow-main py-3 border-transparent rounded-sm  mt-2 " id="" cols="30"
                    rows="5" placeholder="Enter Message Here"></textarea>
            </div>
            <div class="mt-3">
                <button class="px-10 py-2 rounded-sm font-medium bg-home text-white ">Submit</button>
            </div>

        </div>

    </div>
</div>