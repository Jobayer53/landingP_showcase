<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('frontend/css/output.css') }}" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css?family=Anek Bangla"
      rel="stylesheet"
    />

    <title>Thank You</title>

  </head>
  <body class="font-anek">
      <section class="bg-green-500">
        <a href="{{ route('index') }}"  class="bg-red-500 text-white font-semibold py-3 px-6  rounded-full shadow-lg hover:bg-green-600 absolute  " style="top: 30px; left:-30px; padding-left: 46px !important">BACK</a>
      <div class="max-w-[1200px] w-full  mx-auto py-8 px-4" style="height: 100vh">
        <h1
          class="text-center text-[30px] sm:text-[40px] md:text-[50px] font-bold text-white leading-tight"
        >
        Order Placed Successfully ! <br>
        Thank you so much for buying from us.
        </h1>

        <h3
          class="max-w-[980px] w-full text-center mx-auto text-[20px] sm:text-[26px] md:text-[30px] font-semibold leading-[30px] sm:leading-[36px] md:leading-[46px] text-white mt-10"
        >
        যদি কোনো কারণে আপনি পণ্য ফেরত বা বিনিময় করতে চান, আমরা একটি সহজ এবং কার্যকরী পদ্ধতি তৈরি করেছি।বিনিময় নীতিমালা <br>
        ১. বিনিময়ের শর্তাবলী পণ্যটি যদি মেয়াদ উত্তীর্ণ হয়, ওজনে ভুল থাকে বা পণ্যে ত্রুটি থাকে, আপনি পণ্য বিনিময়ের অনুরোধ করতে পারেন। পণ্য গ্রহণের ১০ দিনের মধ্যে বিনিময়ের জন্য অনুরোধ করা যাবে। <br>
        ২. বিনিময় প্রক্রিয়া আমাদের অবহিত করুন: বিনিময়ের জন্য আমাদের কাস্টমার কেয়ার টিমের সাথে যোগাযোগ করুন: কাস্টমার কেয়ার: +৮৮০ ৯৬৩৯-৮১২৫২৫
        </h3>

        <div class="flex justify-center pt-8">
          <button
            class="bg-red-500 text-white font-semibold py-3 px-6 rounded-full shadow-lg hover:bg-green-600"
          >
          নতুন অর্ডার করতে ক্লিক করুন
          </button>
        </div>
      </div>
    </section>
    <!-- product showcase -->




    <!-- product offer -->

    <!-- order now  -->



    <!-- fopoter -->
    <footer
      class="bg-teal-600 py-4 text-center text-[17px] font-medium text-white"
    >
      <div class="space-x-6">
        <a
          href="https://nutrix.com.bd/privacy-policy"
          target="_blank"
          class="hover:underline"
          >Privacy Policy</a
        >
        <a
          href="https://nutrix.com.bd/terms-and-conditions/"
          target="_blank"
          class="hover:underline"
          >Terms & conditions</a
        >
      </div>
      <p class="mt-2">
        Copyright © 2023 harbalhomesbd.com | All rights reserved
      </p>
    </footer>

    <!-- fopoter -->
    {{-- <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <dotlottie-player src="https://lottie.host/3af63497-3b94-4582-a966-7a58d960472c/Q92o4Yu5Ue.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let name = $('#name');
            let address = $('#address');
            let mobile = $('#mobile');
            let nameError = $('#nameError');
            let addressError = $('#addressError');
            let mobileError = $('#mobileError');
            let btn = $('#submitBtn');
            let form = $('#payment_form');

            btn.on('click', function() {
                if(name.val().trim() === "" || address.val().trim() === "" || mobile.val().trim() === "") {
                    if(name.val().trim() === "") { nameError.removeClass('hidden'); }
                    if(address.val().trim() === "") { addressError.removeClass('hidden'); }
                    if(mobile.val().trim() === "") { mobileError.removeClass('hidden'); }
                }
                else{
                    if(mobile.val().trim()){

                        if(!mobile.length == 11 || !mobile.val().startsWith('01')){
                            mobileError.val('মোবাইল নাম্বার হতে হবে');
                            mobileError.removeClass('hidden');
                        }else{
                            mobileError.addClass('hidden');
                            form.submit();
                            $(".set_faded").addClass("faded");
                            $("#loader-overlay").removeClass("hidden");
                        }
                    }
                }
            });

            // Add event listeners for the blur event (when the user leaves the input field)
            name.on('input', function() {
              if(name.val().trim() === "") {
                nameError.removeClass('hidden');
              }else{
                nameError.addClass('hidden');
              }
            });
            address.on('input', function() {
              if(address.val().trim() === "") {
                addressError.removeClass('hidden');
              }else{
                addressError.addClass('hidden');
              }
            });
            mobile.on('input', function() {
              if(mobile.val().trim() === "" || mobile.val().length < 11 || mobile.val().length > 11) {
                mobileError.removeClass('hidden');
              }else{
                mobileError.addClass('hidden');
              }
            });
        });

    </script>
  </body>
</html>
