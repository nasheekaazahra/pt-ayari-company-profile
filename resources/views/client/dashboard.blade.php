<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Client Dashboard</title>

    @vite([
        'resources/css/app.css',
        'resources/css/landing.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-[#f3f3f3]">

<div class="flex">

<!-- SIDEBAR -->
@include('client.layouts.sidebar')

    <!-- MAIN CONTENT -->
    <div class="flex-1 p-10">

        <!-- TOP -->
        <div class="flex justify-between items-start mb-12">

            <div>

                <h1 class="text-4xl font-bold text-[#3b3b3b] leading-tight">

                    Welcome, {{ Auth::user()->name }}
                    <br>
                    want to see your project?

                </h1>

            </div>

            <!-- PROFILE -->
            <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-4xl">

                👤

            </div>

        </div>

        <!-- CARDS -->
        <div class="flex gap-8 mb-16">

            <!-- ACTIVE -->
            <a href="/client/orders"
               class="bg-white border border-black rounded-2xl p-6 w-[260px] shadow hover:-translate-y-1 transition block">

                <div class="flex justify-between items-center mb-4">

                    <span class="text-2xl">
                        📋
                    </span>

                    <span>
                        →
                    </span>

                </div>

                <h2 class="font-bold text-lg">
                    My Orders
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Total
                </p>

                <p class="text-4xl font-bold mt-4">
                    8
                </p>

            </a>

            <!-- STATUS -->
            <a href="/client/status"
               class="bg-white border border-black rounded-2xl p-6 w-[260px] shadow hover:-translate-y-1 transition block">

                <div class="flex justify-between items-center mb-4">

                    <span class="text-2xl">
                        📝
                    </span>

                    <span>
                        →
                    </span>

                </div>

                <h2 class="font-bold text-lg">
                    Status Order
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Production Process (78%)
                </p>

                <p class="text-sm mt-4 text-gray-600">
                    Estimated Finish:
                    <br>
                    1 May 2026
                </p>

            </a>

            <!-- MESSAGE -->
            <a href="/client/messages"
               class="bg-white border border-black rounded-2xl p-6 w-[260px] shadow hover:-translate-y-1 transition block">

                <div class="flex justify-between items-center mb-4">

                    <span class="text-2xl">
                        💬
                    </span>

                    <span>
                        →
                    </span>

                </div>

                <h2 class="font-bold text-lg">
                    Message
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Admin Team: Please review the updated production details
                </p>

                <p class="text-sm mt-4 font-semibold">
                    3 New Messages
                </p>

            </a>

            <!-- NEW PROJECT -->
            <div class="flex items-start">

                <button class="bg-[#b8873a] hover:bg-[#9f732e] text-white px-6 py-3 rounded-xl text-sm font-semibold shadow transition">

                    + NEW PROJECT

                </button>

            </div>

        </div>

        <!-- DIVIDER -->
        <div class="w-[400px] h-2 bg-[#b8873a] mx-auto rounded-full mb-16"></div>

        <!-- NEWS -->
        <div class="grid grid-cols-3 gap-8">

            <!-- LEFT -->
            <div class="col-span-2">

                <h2 class="text-3xl font-bold text-[#3b3b3b] mb-8">
                    WHAT’S NEW IN OUR COMPANY
                </h2>

                <!-- NEWS ITEM -->
                <div class="bg-white rounded-2xl p-5 shadow flex gap-5 items-center mb-6">

                    <img src="{{ asset('images/event.jpg') }}"
                         class="w-[220px] h-[140px] object-cover rounded-xl">

                    <div>

                        <h3 class="text-[#b8873a] font-bold text-xl mb-2">
                            EVENT & ACTIVATION
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            We recently held a Medco Energi gathering.
                            Take a look at the event highlights if you're
                            interested in organizing a similar event.
                        </p>

                    </div>

                </div>

                <!-- NEWS ITEM -->
                <div class="bg-white rounded-2xl p-5 shadow flex gap-5 items-center">

                    <img src="{{ asset('images/executive.jpg') }}"
                         class="w-[220px] h-[140px] object-cover rounded-xl">

                    <div>

                        <h3 class="text-[#b8873a] font-bold text-xl mb-2">
                            MERCHANDISING
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            We offer bundle packages that you can choose
                            from directly and customize with your preferred logo design.
                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="space-y-6">

                <!-- RATE -->
                <div class="bg-[#d4c56d] rounded-3xl p-6">

    <h2 class="text-2xl font-bold mb-5">
        Rate Your Order
    </h2>

    <p class="mb-4 text-sm">
        Jacket Custom <br>
        Order #ORD-023
    </p>

    <!-- STARS -->
    <form action="/client/rating/2"
          method="POST">

        @csrf

        <div class="flex gap-2 text-3xl mb-5">

    <button type="submit"
            name="rating"
            value="1"
            class="bg-transparent border-none hover:scale-125 transition">
        ⭐
    </button>

    <button type="submit"
            name="rating"
            value="2"
            class="bg-transparent border-none hover:scale-125 transition">
        ⭐
    </button>

    <button type="submit"
            name="rating"
            value="3"
            class="bg-transparent border-none hover:scale-125 transition">
        ⭐
    </button>

    <button type="submit"
            name="rating"
            value="4"
            class="bg-transparent border-none hover:scale-125 transition">
        ⭐
    </button>

    <button type="submit"
            name="rating"
            value="5"
            class="bg-transparent border-none hover:scale-125 transition">
        ⭐
    </button>

</div>

    </form>

</div>

                <!-- SUPPORT -->
                <div class="bg-black text-white rounded-2xl p-6 shadow">

                    <h2 class="text-2xl font-bold mb-5">
                        PRIORITY SUPPORT
                    </h2>

                    <p class="leading-relaxed text-gray-300 mb-6">
                        Dedicated manager to available 24/7
                        for enterprise partners
                    </p>

                    <button onclick="openManagerModal()"
                        class="bg-[#b8873a] hover:bg-[#9f732e] px-5 py-3 rounded-xl w-full transition">
                        📞 Contact the Manager
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- MANAGER MODAL -->
<div id="managerModal"
     class="hidden fixed inset-0 bg-black/60 z-50 flex items-center justify-center">

    <div class="bg-white w-[420px] rounded-3xl p-8 shadow-2xl relative">

        <!-- CLOSE -->
        <button onclick="closeManagerModal()"
                class="absolute top-5 right-5 text-gray-500 hover:text-black text-2xl">

            ✕

        </button>

        <!-- HEADER -->
        <h2 class="text-3xl font-bold text-[#171733] mb-6">

            Priority Support

        </h2>

        <!-- MANAGER -->
        <div class="flex items-center gap-4 mb-6">

            <div class="w-16 h-16 rounded-full bg-[#b8873a] flex items-center justify-center text-3xl text-white">

                👤

            </div>

            <div>

                <h3 class="font-bold text-lg">
                    Budi Santoso
                </h3>

                <p class="text-gray-500">
                    Account Manager
                </p>

            </div>

        </div>

        <!-- STATUS -->
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5">

            <p class="font-semibold text-green-700">
                🟢 Online
            </p>

            <p class="text-sm text-gray-600 mt-1">
                Average response time: < 15 minutes
            </p>

        </div>

        <!-- CONTACT -->
        <div class="space-y-3 mb-6">

            <p>
                📞 +62 812-3456-7890
            </p>

            <p>
                ✉ manager@ayari.id
            </p>

        </div>

        <!-- ACTION -->
        <a href="https://wa.me/6281234567890"
           target="_blank"
           class="block text-center bg-[#25D366] hover:bg-[#20bd5a] text-white py-3 rounded-xl font-semibold transition">

            Start Chat via WhatsApp

        </a>

    </div>

</div>

<script>

function openManagerModal()
{
    document
        .getElementById('managerModal')
        .classList.remove('hidden');
}

function closeManagerModal()
{
    document
        .getElementById('managerModal')
        .classList.add('hidden');
}

</script>

</body>
</html>