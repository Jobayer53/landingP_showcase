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

    <title>Showcase</title>
<style>
    .loader {
    border-top-color: #3498db;
    animation: spin 1s infinite linear;
    }

    @keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    .hidden {
    display: none;
    }

    .form-container {
    position: relative;
    }

    .faded {
    opacity: 0.5;
    pointer-events: none; /* Prevent interaction */
    }
</style>
<style>
        /* For Webkit browsers (Chrome, Safari, Edge) */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #0d9488; /* Scrollbar thumb color */
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: transparent; /* Make the track fully transparent */
        border: none; /* Ensure no borders */
    }

    ::-webkit-scrollbar-track-piece {
        background: transparent !important; /* Ensure inner part of track is transparent */
    }
/* For Firefox */


</style>
  </head>
  <body class="font-anek">
    @php
        $landing = App\Models\LandingPage::find(1);
        $feedback = explode(',', $landing?->feedback_image);
        $benefitLists = App\Models\BenefitList::where('landing_page_id',$landing?->id)->get();
    @endphp
    <section class="bg-green-500">
      <div class="max-w-[1200px] w-full mx-auto py-8 px-4">
        <h1
          class="text-center text-[30px] sm:text-[40px] md:text-[50px] font-bold text-white leading-tight"
        >
          {{ $landing?->header }}
        </h1>

        <h3
          class="max-w-[980px] w-full text-center mx-auto text-[20px] sm:text-[26px] md:text-[30px] font-semibold leading-[30px] sm:leading-[36px] md:leading-[46px] text-white mt-10"
        >
          {{ $landing?->short_description }}
        </h3>

        <div class="flex justify-center pt-8">
          <a href="#form-container"
            class="bg-red-500 text-white font-semibold py-3 px-6 rounded-full shadow-lg hover:bg-green-600"
          >
            অর্ডার করতে ক্লিক করুন
          </a>
        </div>
      </div>
    </section>
    <!-- product showcase -->
    <section>
      <div class="max-w-[1200px] w-full mx-auto py-8 px-4">
        <h2
          class="bg-[#00b294] text-center py-4 text-white text-[20px] sm:text-[22px] font-semibold rounded-md"
        >
        {{ $landing?->quote_one }}
        </h2>

        <div
          class="flex flex-col md:flex-row justify-between items-center gap-4 pt-7"
        >
          <!-- Left: Video -->
          <div class="w-full md:w-1/2">
            {{-- <iframe
              class="w-full aspect-square rounded-md"
              src="https://www.youtube.com/embed/MhXCj8E9CZU?si=QJWEzdQRAkyTx1N8"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
            >
            </iframe> --}}
            @if($landing?->youtube_link)
                {!! $landing?->youtube_link !!}
            @endif
            @if ($landing?->video)
                <video class="mt-3"  width="90%" height="auto" controls >
                    <source src="{{ asset('uploads/landing/'.$landing->video) }}" type="video/mp4">
                    <source src="{{ asset('uploads/landing/'.$landing->video) }}" type="video/ogg">
                </video>
            @endif
          </div>

          <!-- Right: Image -->
          <div class="w-full md:w-1/2">

            <img
              class="w-full rounded-md"
              src="{{ asset('uploads/landing/'.$landing?->image) }}"
              alt="Product Image"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- product showcase -->
    <!-- review  -->
    <section>
      <div class="max-w-[1200px] w-full mx-auto px-4">
        <h2
          class="bg-[#00b294] text-center py-4 text-white text-[20px] sm:text-[22px] font-semibold rounded-md"
        >
        {{ $landing?->quote_two }}
        </h2>
        <div
          class="flex flex-col md:flex-row justify-between items-center gap-6 pt-6"
        >
        @foreach ($feedback as $data )
            <div class="w-full md:w-1/3">
                <img
                class="w-full rounded-md"
                src="{{ asset('uploads/landing/'.$data) }}"
                alt="Review 1"
                />
          </div>
        @endforeach

        </div>
      </div>
    </section>
    <!-- review  -->
    <!-- product offer -->

    <section class="w-full mx-auto py-8 px-4 bg-[#00AB99]">
      <div
        class="max-w-[1200px] w-full mx-auto flex flex-col justify-center items-center"
      >
        <!-- Countdown Timer -->
        <div
        id="timer"
          class="text-[30px] font-normal text-white text-center flex gap-x-3 flex-wrap justify-center"
        >
          <div
            class="bg-[#FF184B] w-[120px] sm:w-[142px] text-white text-center font-semibold py-4 px-6 rounded-[25px]"
          >
            <p id="hours" class="text-xl sm:text-2xl">24</p>
            <p class="text-sm sm:text-base">Hours</p>
          </div>
          <div
            class="bg-[#FF184B] w-[120px] sm:w-[142px] text-white text-center font-semibold py-4 px-6 rounded-[25px]"
          >
            <p id="minutes" class="text-xl sm:text-2xl">00</p>
            <p class="text-sm sm:text-base">Minutes</p>
          </div>
          <div
            class="bg-[#FF184B] w-[120px] sm:w-[142px] text-white text-center font-semibold py-4 px-6 rounded-[25px]"
          >
            <p id="seconds" class="text-xl sm:text-2xl">00</p>
            <p class="text-sm sm:text-base">Seconds</p>
          </div>
        </div>

        <!-- Discounted Price Section -->
        <div class="text-white text-[30px] sm:text-[50px] mt-8 text-center">
          <span>প্যাকেজের পূর্বমূল্য</span>
          <span class="line-through text-red-700 mx-2">১১৯৯ টাকা</span>
          <span>এখন ছাড়ে</span>
          <span class="text-yellow-400 bg-transparent px-2 py-1">৯৯৯ টাকা</span>
        </div>

        <!-- Urgency Section -->
        <div class="text-white text-xl sm:text-4xl mt-8 sm:mt-16 text-center">
          <span class="text-black">স্টক লিমিটেড, তাই দেরি না করে</span>
          <span class="relative">
            <span class="text-white"
              >অফারটি শেষ হওয়ার আগে এখনই অর্ডার করুন</span
            >
          </span>
        </div>

        <!-- Delivery Free Section -->
        <div
          class="text-white text-2xl sm:text-4xl font-bold relative inline-block mt-12 sm:mt-20 text-center"
        >
          <span>ডেলিভারি চার্জ সম্পূর্ণ ফ্রি</span>
          <div
            class="absolute left-0 right-0 bottom-0 h-[10px] bg-green-400 opacity-70 blur-md rounded-full"
          ></div>
        </div>

        <!-- Order Button -->
        <a
          href="#form-container"
          class="bg-[#FF184B] text-white py-3 px-6 rounded-full border-2 border-white shadow-lg hover:bg-[#00AB99] transition duration-300 ease-in-out mt-10 text-xl sm:text-[20px] font-semibold"
          style="box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5)"
        >
          অর্ডার করতে ক্লিক করুন
        </a>
      </div>
    </section>

    <!-- product offer -->

    <!-- order now  -->

    <section class="max-w-[1200px] w-full mx-auto py-8 px-4">
      <div class="flex flex-col md:flex-row justify-between items-center gap-6">
        <!-- Left: Text Section -->
        <div class="w-full md:w-1/2">
          <h2
            class="text-[#00C181] text-[35px] leading-[50px] font-semibold mb-6"
          >
            {{ $landing?->benefit_title }}
          </h2>
          <ul class="space-y-4 font-semibold">
            @foreach($benefitLists as $benefit)
            <li class="flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-green-500 mr-3"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                />
              </svg>
              <span class="text-black text-[20px] font-normal">
               {{ $benefit->list }}
              </span>
            </li>
            @endforeach

          </ul>
        </div>

        <!-- Right: Product Image Section -->
        <div class="w-full md:w-1/2">
          <div
            class="bg-white rounded-md p-4 border border-green-500 shadow-lg"
          >
            <img
              class="w-full h-auto"
              src="{{ asset('uploads/landing/'.$landing?->benefit_image) }}"
              alt="Product Image"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- order now  -->

    <!--payment form  -->
    <section class="bg-teal-600 py-8 px-4">
      <div
        class="max-w-[1200px] w-full mx-auto flex flex-col items-center text-center"
      >
        <div class="text-white text-center">
          <h2
            class="text-2xl sm:text-3xl md:text-4xl font-bold py-4 sm:py-6 md:py-8"
          >
            {{ $landing?->uses_title }}
          </h2>
          <p
            class="mb-8 sm:mb-12 md:mb-16 w-full sm:w-[600px] md:w-[750px] lg:w-[900px] text-[18px] sm:text-[24px] md:text-[30px] font-semibold leading-[32px] sm:leading-[40px] md:leading-[46px]"
          >
            {{ $landing?->uses }}
          </p>
          <p class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">
            অর্ডার করতে সঠিক আপনার সঠিক তথ্য দিয়ে নিচের ফর্মটি পূরণ করুন👇
          </p>
        </div>

      </div>

      <div
        id="form-container"
        class=" form-container  max-w-[1000px] bg-white py-16 px-8 w-full mx-auto flex flex-col md:flex-row justify-between rounded-[15px] border-4 border-[#2ED2C2]"
        style="box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.63)"
      >
      <div id="loader-overlay" class=" hidden absolute "  style="top:35%; left: 35%;" >
        <iframe  src="https://lottie.host/embed/3af63497-3b94-4582-a966-7a58d960472c/Q92o4Yu5Ue.json"></iframe>
        {{-- <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div> --}}
      </div>


        <!-- Left Section -->
        <div class="w-full md:w-[48%] mb-8 md:mb-0 set_faded">

          <div>
            <h2 class="text-xl font-semibold mb-6">প্রডাক্ট শিপিং ডিটেলস</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span class="text-red-500">{{ $error }}</span><br>
                @endforeach
            @endif
            <form id="payment_form" method="POST" action="{{ route('order.store') }}">
              @csrf
              <!-- Name Field -->
              <div class="mb-4">
                <label
                  for="name"
                  class="block text-[17px] text-[#004A7C] font-medium mb-2"
                  >আপনার নাম লিখুন *</label
                >
                <input
                  type="text"
                  id="name"
                  name="name"
                  placeholder="নাম লিখুন"
                  class="w-full p-3 border-2 border-green-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                />
                <span class="text-red-500 text-sm hidden" id="nameError"
                  > নাম প্রয়োজন</span
                >
              </div>

              <!-- Address Field -->
              <div class="mb-4">
                <label
                  for="address"
                  class="block text-[17px] text-[#004A7C] font-medium mb-2"
                  >আপনার সম্পূর্ণ ঠিকানা *</label
                >
                <input
                  type="text"
                  id="address"
                  name="address"
                  placeholder="ডেলিভারীর পূর্ণ ঠিকানা (গ্রাম, থানা, জেলা সহ)"
                  class="w-full p-3 border-2 border-green-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                />
                <span class="text-red-500 text-sm hidden" id="addressError"
                  > ঠিকানা প্রয়োজন</span
                >
              </div>

              <!-- Mobile Number Field -->
              <div class="mb-4">
                <label
                  for="mobile"
                  class="block text-[17px] text-[#004A7C] font-medium mb-2"
                  >আপনার মোবাইল নাম্বার লিখুন *</label
                >
                <input
                  type="number"
                  id="mobile"
                  name="mobile"
                  placeholder="মোবাইল নাম্বার লিখুন"
                  class="w-full p-3 border-2 border-green-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                />
                <span class="text-red-500 text-sm hidden" id="mobileError"
                  >  মোবাইল নাম্বার প্রয়োজন (11 ডিজিট)</span
                >
              </div>
              <input type="hidden" name="total_price" id="total_price" value="999">

            </form>
          </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-[48%] set_faded">
          <div>
            <h2 class="text-xl font-semibold mb-4">আপনার অর্ডার</h2>

            <!-- Table Headers -->
            <div
              class="grid grid-cols-2 mb-4 border-b border-dashed border-gray-300 pb-2"
            >
              <p class="font-semibold text-[#004A7C]">Product</p>
              <p class="font-semibold text-right text-[#004A7C]">Subtotal</p>
            </div>

            <!-- Product Details -->
            <div
              class="grid grid-cols-2 items-center mb-2 border-b border-dashed border-gray-300 pb-2"
            >
              <div class="flex items-center space-x-3">

                <img
                  src="{{  asset('uploads/landing/'.$landing->product_image) }}"
                  alt="Product Image"
                  class="w-16 h-16 object-cover rounded-lg"
                />
                <div class="flex justify-between">
                  <h3 class="text-[0.95em] font-semibold">
                   {{ $landing->product_name }}
                  </h3>
                </div>
              </div>
              <p class="font-semibold text-right">
                <span class="text-sm mr-4">× 1</span> ৳ {{ $landing->product_price }}.00
              </p>
            </div>

            <!-- Subtotal -->
            <div
              class="grid grid-cols-2 mb-2 border-b border-dashed border-gray-300 pb-2"
            >
              <p class="font-normal text-[#004A7C]">Subtotal</p>
              <p class="font-normal text-right">৳ {{ $landing->product_price }}.00</p>
            </div>

            <!-- Total -->
            <div class="grid grid-cols-2">
              <p class="font-semibold text-[#004A7C]">Total</p>
              <p class="font-semibold text-right text-base">৳ {{ $landing->product_price }}.00</p>
            </div>
          </div>

          <!-- Order Info -->
          <div class="p-4 mb-6 bg-[#e5e7eb]">
            <p class="font-medium text-[17px] mb-2">
              অথবা কোন টাকা ছাড়াই অর্ডার করুন 👇
            </p>
            <div class="relative bg-gray-100 p-4 rounded-lg">
              <div
                class="absolute top-0 left-5 -mt-3 w-0 h-0 border-l-[15px] border-l-transparent border-r-[15px] border-r-transparent border-b-[15px] border-b-gray-100"
              ></div>
              <p class="text-[#515151]">পণ্য হাতে পেয়ে মূল্য পরিশোধ করবেন।</p>
            </div>
          </div>

          <!-- Privacy Policy -->
          <p class="text-sm font-normal text-[#777] text-justify">
            Your personal data will be used to process your order, support your
            experience throughout this website, and for other purposes described
            in our privacy policy.
            {{-- <a
              href="https://harbalhomesbd.com/?page_id=3"
              target="_blank"
              class="text-red-500 underline"
              >privacy policy</a
            >. --}}
          </p>

          <!-- Submit Button -->
          <button
            id="submitBtn"
            class="w-full bg-[#FF184B] text-white font-semibold text-[20px] py-4 rounded-full shadow-lg flex items-center justify-center space-x-3 border-2 border-white hover:bg-[#358981] transition duration-300 ease-in-out mt-5"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-white"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 11v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <span>অর্ডার করুন</span>
            <span>৳ 999.00</span>
          </button>
        </div>
      </div>

    </section>

    <!--payment form  -->

    <!-- fopoter -->
    <footer
      class="bg-teal-600 py-4 text-center text-[17px] font-medium text-white"
    >
      <div class="space-x-6">
        {{-- <a
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
        > --}}
      </div>
      <p class="mt-2">
        Copyright © 2024 <a href="https://synexdigital.com"> Synex Digital</a> | All rights reserved
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
     <script>
        window.onload = function() {
            var hoursSpan = document.getElementById('hours');
            var minutesSpan = document.getElementById('minutes');
            var secondsSpan = document.getElementById('seconds');

            function startTimer(duration, display) {
                var timer = duration, hours, minutes, seconds;
                setInterval(function () {
                    hours = parseInt(timer / 3600, 10);
                    minutes = parseInt((timer % 3600) / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    hours = hours < 10 ? "0" + hours : hours;
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    hoursSpan.textContent = hours;
                    minutesSpan.textContent = minutes;
                    secondsSpan.textContent = seconds;

                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }

            startTimer(24 * 3600 + 00 * 60 + 00, hoursSpan, minutesSpan, secondsSpan);
        };
    </script>
  </body>
</html>
