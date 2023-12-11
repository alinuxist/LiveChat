<div>
    <div class="flex flex-col h-screen justify-center items-center">


        <svg class="hidden">
            <symbol id="phoneIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
            </symbol>

        </svg>

        <span class="flex hover:scale-105 transition-all duration-700 justify-center gap-x-5 items-center font-Peyda-SemiBold text-secondary text-4xl mb-3"><div class="flex w-6 h-6 mb-2.5 animate-pulse bg-quaternary rounded-full"></div>LiveChat</span>

        <div class="flex flex-col justify-center py-5 w-80 bg-secondary/10 rounded-2xl drop-shadow-md shadow-secondary">

            <span class="flex justify-center font-Peyda-Medium text-secondary text-2xl mb-5">ورود به حساب کاربری</span>




            @if(!$isOtp)

                <div class="flex mx-10">

                    <span class="text-secondary my-1">شماره موبایل</span>
                </div>
            <form wire:submit="otp">
            <div class="flex flex-col space-y-5 justify-center items-center">

                <div class="flex ">
                <svg class="absolute left-11 mt-2.5 text-secondary my-1 h-5 w-5"><use xlink:href="#phoneIcon"></use></svg>
                <input type="tel" wire:model="phone" class="flex bg-secondary/10 items-center outline-none px-10  text-secondary font-Peyda-Medium w-64 h-10 rounded-xl" dir="ltr">
                </div>

                @error("phone")
                    <span class="text-red-400">{{$message}}</span>
                @enderror



                <button type="submit" class="bg-tertiary h-10 w-64 text-secondary font-Peyda-Medium hover:scale-105 transition-all duration-300 rounded-xl">ارسال کد تایید</button>


                <span class="text-secondary text-xs">ورود شما به معنای پذیرش قوانین <a href="#" class="text-quaternary px-0.5 font-Peyda-SemiBold">LiveChat</a> است.</span>

            </div>

            </form>
            @else
                <div class="flex mx-10">

                    <span class="text-secondary mt-1 mb-4">کد تایید</span>
                </div>
                <div class="flex flex-col space-y-5 justify-center items-center">

                    <div class="flex gap-x-2.5">

                    <input maxlength="1" id="otp1"  type="tel" class="bg-secondary/10 items-center justify-center outline-none text-center text-secondary font-Peyda-Medium w-14 h-10 rounded-xl" dir="ltr"  onfocus="document.getElementById('otp1').value = ''"
                           oninput="document.getElementById('otp1').previousElementSibling ? document.getElementById('otp1').previousElementSibling.focus() : document.getElementById('otp1').blur()">
                    <input maxlength="1" id="otp2"  type="tel" class="bg-secondary/10 items-center justify-center outline-none text-center text-secondary font-Peyda-Medium w-14 h-10 rounded-xl" dir="ltr"  onfocus="document.getElementById('otp2').value = ''"
                           oninput="document.getElementById('otp2').previousElementSibling ? document.getElementById('otp2').previousElementSibling.focus() : document.getElementById('otp2').blur()">
                    <input maxlength="1" id="otp3"  type="tel" class="bg-secondary/10 items-center justify-center outline-none text-center text-secondary font-Peyda-Medium w-14 h-10 rounded-xl" dir="ltr"  onfocus="document.getElementById('otp3').value = ''"
                           oninput="document.getElementById('otp3').previousElementSibling ? document.getElementById('otp3').previousElementSibling.focus() : document.getElementById('otp3').blur()">
                    <input maxlength="1" id="otp4"  type="tel" class="bg-secondary/10 items-center justify-center outline-none text-center text-secondary font-Peyda-Medium w-14 h-10 rounded-xl" dir="ltr"  onfocus="document.getElementById('otp4').value = ''"
                           oninput="document.getElementById('otp4').previousElementSibling ? document.getElementById('otp4').previousElementSibling.focus() : document.getElementById('otp4').blur()">


                    </div>

                    <button type="submit" class="bg-tertiary h-10 w-64 text-secondary font-Peyda-Medium hover:scale-105 transition-all duration-300 rounded-xl">تایید</button>


                    <span class="text-secondary text-xs">ورود شما به معنای پذیرش قوانین <a href="#" class="text-quaternary px-0.5 font-Peyda-SemiBold">LiveChat</a> است.</span>

                </div>
            @endif




        </div>

    </div>
</div>



