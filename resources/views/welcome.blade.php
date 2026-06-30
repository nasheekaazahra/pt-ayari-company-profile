<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>PT. AYARI KREASI PERSADA</title>

    @vite([
    'resources/css/app.css',
    'resources/css/landing.css',
    'resources/js/app.js'
])
</head>

<body class="bg-[#f7f3f2]">

    <!-- NAVBAR -->
    <nav class="navbar sticky top-0 z-50 flex justify-between items-center px-10 py-5 shadow-md">

    <h1 class="text-3xl font-extrabold text-[#b08b2d]">
        PT. AYARI KREASI PERSADA
    </h1>

    <ul class="flex gap-16 text-xs font-medium text-black">

    <li>
        <a href="#about" class="hover:text-yellow-700">
            About Us
        </a>
    </li>

    <li>
        <a href="#services" class="hover:text-yellow-700">
            Services
        </a>
    </li>

    <li>
        <a href="#products" class="hover:text-yellow-700">
            Products
        </a>
    </li>

</ul>

    <div class="flex gap-4">

        <a href="/login"
           class="bg-yellow-300 hover:bg-yellow-400 px-5 py-2 rounded-lg text-sm shadow">
            Login
        </a>

    </div>

</nav>

<!-- HERO SECTION -->
<section class="relative min-h-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('images/hero.jpg') }}')">

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/45"></div>

    <!-- CONTENT -->
    <div class="relative z-10 flex items-center min-h-screen px-24">

        <div class="max-w-2xl text-white">

            <h1 class="text-7xl font-extrabold text-yellow-600 mb-2 tracking-wide">
                AYARI
            </h1>

            <h2 class="text-3xl font-light mb-6 tracking-wide">
                Creativity Beyond Boundaries
            </h2>

            <p class="text-2xl leading-relaxed mb-10 text-gray-200">
                Become a leading, trusted, and solution-oriented partner
                in the provision of products and services that deliver
                sustainable value.
            </p>

            <div class="flex gap-5">

                <a href="#proposal"
                class="bg-[#d4a514] hover:bg-[#b88d10] text-white px-10 py-4 rounded-xl text-xl shadow-lg transition duration-300 inline-block">
                    Send Yours
                </a>

                <a href="{{ asset('pdf/company-profile.pdf') }}"
                target="_blank"
                class="border border-white hover:bg-white hover:text-black
                        px-8 py-3 rounded-lg transition inline-flex items-center justify-center">
                    Our Work
                </a>

            </div>

        </div>

    </div>

</section>

<!-- ABOUT SECTION -->
<section id="about" class="bg-[#f7f3f2] py-24 px-16">

    <div class="grid grid-cols-2 gap-20 items-center">

        <!-- LEFT -->
        <div>

            <h1 class="text-6xl tracking-wide text-[#b08b2d] mb-10">
                ABOUT US
            </h1>

            <div class="flex gap-5">

                <!-- GOLD LINE -->
                <div class="w-2 bg-[#b08b2d] rounded-full"></div>

                <!-- TEXT -->
                <div class="space-y-8 text-gray-700 leading-relaxed text-lg">

                    <p>
                        PT Ayari Kreasi Persada is your trusted partner in
                        retail and wholesale solutions, delivering high-quality
                        uniforms and agency apparel (PDH, PDL, PDU), footwear,
                        tactical wear, bags, suitcases, and specialized tactical
                        equipment tailored to operational and corporate needs.
                    </p>

                    <p>
                        Beyond products, we provide end-to-end solutions —
                        from design, printing, and merchandise production
                        to marketing promotional tools, event execution,
                        and brand activation — ensuring every project
                        is delivered with precision, efficiency, and impact.
                    </p>

                    <p>
                        With a strong commitment to quality, reliability,
                        and customer satisfaction, we help brands,
                        institutions, and organizations transform ideas
                        into meaningful experiences and professional
                        brand identities.
                    </p>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div>

            <img src="{{ asset('images/about.jpg') }}"
                 class="rounded-2xl shadow-2xl w-[75%] h-[400px] object-cover ml-auto">

    </div>

    </div>

</section>

<!-- SERVICES SECTION -->
<section id="services" class="px-16 py-20 bg-[#f7f3f2]">

    <h2 class="text-5xl text-[#b58a2d] mb-14 tracking-wide">
        OUR SERVICES
    </h2>

    <div class="grid grid-cols-4 gap-10">

        <!-- CARD 1 -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300">

            <div class="mb-5 flex justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
            class="w-10 h-10 text-[#b58a2d]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M3 17l6-6 4 4 8-8" />

            </svg>

            </div>

            <h3 class="text-lg font-semibold mb-4 text-[#b58a2d]">
                MARKETING STRATEGY
            </h3>

            <p class="text-gray-600 leading-relaxed text-sm">
                We support your strategy, campaign, budgeting,
                and business evaluation.
            </p>

        </div>

        <!-- CARD 2 -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300">

            <div class="mb-5 flex justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-10 h-10 text-[#b58a2d]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 10L4 17V7m8 4v10" />

        </svg>

        </div>

            <h3 class="text-lg font-semibold mb-4 text-[#b58a2d]">
                MERCHANDISING
            </h3>

            <p class="text-gray-600 leading-relaxed text-sm">
                Professional merchandise design
                and production services.
            </p>

        </div>

        <!-- CARD 3 -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300">

            <div class="mb-5 flex justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-10 h-10 text-[#b58a2d]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M9 19V6l12-2v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-2c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z" />

        </svg>

        </div>

            <h3 class="text-lg font-semibold mb-4 text-[#b58a2d]">
                EVENT ACTIVATION
            </h3>

            <p class="text-gray-600 leading-relaxed text-sm">
                Interactive event experiences
                to engage your audience.
            </p>

        </div>

        <!-- CARD 4 -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300">

            <div class="mb-5 flex justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-10 h-10 text-[#b58a2d]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-10 0h8v4H8v-4z" />

        </svg>

        </div>

            <h3 class="text-lg font-semibold mb-4 text-[#b58a2d]">
                PRINTING & PRODUCTION
            </h3>

            <p class="text-gray-600 leading-relaxed text-sm">
                High quality printing and
                production for your business needs.
            </p>

        </div>

    </div>

</section>

<!-- PRODUCT SECTION -->
<section id="products" class="px-16 py-28 bg-[#f7f3f2]">

    <!-- TITLE -->
    <div class="text-center mb-16">

        <h2 class="text-5xl tracking-[6px] text-[#b58a2d] font-light">
            PRODUCT REFERENCES
        </h2>

        <div class="w-72 h-1 bg-[#b58a2d] mx-auto mt-6 rounded-full"></div>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-2 gap-8 max-w-4xl mx-auto">

        <!-- LEFT BIG IMAGE -->
        <div>

            <img src="{{ asset('images/merchandise.jpg') }}"
                 class="rounded-xl shadow-xl w-full h-full object-cover hover:scale-[1.02] transition duration-500">

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex flex-col gap-8">

            <img src="{{ asset('images/uniform.jpg') }}"
                 class="rounded-xl shadow-xl w-full h-[280px] object-cover hover:scale-[1.02] transition duration-500">

            <img src="{{ asset('images/executive.jpg') }}"
                 class="rounded-xl shadow-xl w-full h-[180px] object-cover hover:scale-[1.02] transition duration-500">

        </div>

    </div>


</section>

<!-- SEND PROJECT SECTION -->
<section id="proposal" 
    class="px-16 py-20 bg-[#E7E1B1]">

    <div class="bg-[#171733] rounded-[28px] py-14 px-10 text-center max-w-5xl mx-auto shadow-xl">

        <h2 class="text-4xl font-bold text-white mb-5">
            Send Your Project
        </h2>

        <p class="text-gray-300 text-base mb-10 max-w-xl mx-auto leading-relaxed">
            Ready to redefine your brand’s presence?
            Our team is ready to bring your vision to life.
        </p>

        <!-- FORM -->
        <form action="/proposal"
              method="POST"
              enctype="multipart/form-data"
              class="flex justify-center items-center">

            @csrf

            <!-- UPLOAD -->
            <label class="bg-white px-4 py-3 rounded-xl cursor-pointer hover:bg-gray-100 transition">
            📎

            <input type="file"
                    name="attachment"
                    class="hidden">

            </label>

            <input type="email"
                   name="email"
                   placeholder="Your Email"
                   class="w-[300px] px-5 py-3 rounded-l-xl outline-none text-black">

            <button class="bg-[#c49b2e] hover:bg-[#aa8527] px-6 py-3 rounded-r-xl text-white transition">
                Send Proposal
            </button>

        </form>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-[#a97428] text-white px-16 py-12">

    <div class="flex justify-between items-start">

        <!-- LEFT -->
        <div>

            <h2 class="text-5xl font-bold tracking-wide mb-2">
                AYARI
            </h2>

            <p class="text-[#f3e7d2]">
                Kreasi Persada
            </p>

        </div>

        <!-- RIGHT -->
        <div class="space-y-3 text-sm text-right">

            <p>
                📷 @ayarikreasipersada
            </p>

            <p>
                🌐 @ayari.id
            </p>

            <p>
                ✉ support@ayari.id
            </p>

        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="flex justify-center mt-12">

        <div class="border border-black rounded-full px-8 py-3 text-sm bg-[#c89a57] text-black shadow">

            © 2026 PT Ayari Kreasi Persada.
            All Rights Reserved.

        </div>

    </div>

</footer>

<!-- BACK TO TOP BUTTON -->
<button id="topBtn"
        class="fixed bottom-8 right-8 bg-[#b58a2d] hover:bg-[#9e7924] text-white w-14 h-14 rounded-full shadow-xl hidden z-50 transition">

    ↑

</button>

<script>

    const topBtn = document.getElementById("topBtn");

    // SHOW BUTTON WHEN SCROLL
    window.onscroll = function () {

        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {

            topBtn.style.display = "block";

        } else {

            topBtn.style.display = "none";

        }

    };

    // SCROLL TO TOP
    topBtn.addEventListener("click", function () {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });

</script>
</body>
</html>