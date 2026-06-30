<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>QC Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f5f5] flex">

@include('qc.layouts.sidebar')

    <!-- CONTENT -->
    <div class="flex-1 p-10">

    <div class="bg-black text-white rounded-3xl p-8 mb-8 flex justify-between items-center">

    <div>

        <h1 class="text-5xl font-bold">
            QC Dashboard 🔍
        </h1>

        <p class="text-gray-400 mt-2">
            Monitor and verify product quality before delivery.
        </p>

        <p class="text-sm text-gray-500 mt-4">
            {{ now()->format('l, d F Y') }}
        </p>

    </div>

    <div class="w-16 h-16 rounded-full bg-[#b8873a] flex items-center justify-center text-2xl">
        👤
    </div>

</div>

    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow p-6">

            <i class="fa-solid fa-clock text-[#b8873a] text-2xl"></i>

            <p class="text-gray-500 text-sm mt-3">
                ORDER WAITING
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $pending ?? 0 }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <i class="fa-solid fa-check-circle text-green-500 text-2xl"></i>
            <p class="text-gray-500 text-sm mt-3">
                APPROVED TODAY
            </p>

            <h2 class="text-4xl font-bold mt-3 text-green-600">
                {{ $approved ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <i class="fa-solid fa-rotate-left text-red-500 text-2xl"></i>
            <p class="text-gray-500 text-sm mt-3">
                REVISION NEEDED
            </p>

            <h2 class="text-4xl font-bold mt-3 text-red-500">
                {{ $rejected ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <i class="fa-solid fa-box text-green-500 text-2xl"></i>
            <p class="text-gray-500 text-sm mt-3">
                COMPLETED TOTAL
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $completed ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-8 mt-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                QC Queue
            </h2>

            <a href="/qc/orders"
            class="text-[#b8873a] font-semibold">
                View All
            </a>

        </div>

        <div class="text-gray-500">

            Orders waiting for inspection.

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Production Overview
    </h2>

    <div class="space-y-5">

        <div>
            <div class="flex justify-between">
                <span>Waiting QC</span>
                <span>{{ $pending }}</span>
            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full mt-2">

                <div
                    class="h-3 bg-[#b8873a] rounded-full"
                    style="width: 60%">
                </div>

            </div>
        </div>

    </div>

</div>

    </div>

</div> 

</body>
</html>