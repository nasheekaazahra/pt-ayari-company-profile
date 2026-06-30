<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f5f5] flex">

    <!-- SIDEBAR -->
    @include('admin.layouts.sidebar')

    <!-- CONTENT -->
<div class="flex-1 p-10">


    <!-- HERO CARD -->
    <div class="bg-[#0A0A0A]
                rounded-3xl
                p-8
                mb-8
                w-full
                text-white
                shadow-xl
                flex
                justify-between
                items-start
                mb-8">

        <div>

            <h1 class="text-4xl font-bold">
                Welcome, Admin 👋
            </h1>

            <p class="text-gray-400 mt-2">
                Monitor and manage custom product orders.
            </p>

            <p class="text-xs text-gray-500 mt-4">
                Friday, 30 May 2026
            </p>
        </div>

        <div
        class="w-12 h-12 rounded-full bg-[#d7b3ff]
        flex items-center justify-center text-black font-bold">
        👤
        </div>

    </div>

    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow">
            <i class="fa-solid fa-box-open text-[#b8873a] text-xl"></i>
            <h2 class="text-gray-500">
                Total Orders
            </h2>

            <p class="text-4xl font-bold mt-3">
                {{ $totalOrders }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <i class="fa-solid fa-comment text-[#b8873a] text-xl"></i>
            <h2 class="text-gray-500">
                Message
            </h2>

            <p class="text-4xl font-bold mt-3">
                {{ $messageCount }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <i class="fa-solid fa-users text-[#b8873a] text-xl"></i>
            <h2 class="text-gray-500">
                Clients
            </h2>

            <p class="text-4xl font-bold mt-3">
                {{ $clients }}
            </p>
        </div>

    </div>

    <div class="grid grid-cols-3 gap-6 mt-8">

    <!-- RECENT ORDER -->
    <div class="col-span-2 bg-white rounded-2xl p-6 shadow">

    <h2 class="font-bold text-xl mb-5">
        Recent Orders
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100 text-gray-500 text-sm">

                    <th class="p-3 text-left rounded-l-xl">
                        Order ID
                    </th>

                    <th class="p-3 text-left">
                        Product
                    </th>

                    <th class="p-3 text-left">
                        Client
                    </th>

                    <th class="p-3 text-left">
                        Status
                    </th>

                    <th class="p-3 text-left rounded-r-xl">
                        Date
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($orders as $order)

                <tr class="border-b">

                    <td class="py-4">
                        ORD-{{ $order->id }}
                    </td>

                    <td>
                        {{ $order->product_name }}
                    </td>

                    <td>
                        {{ $order->customer_name }}
                    </td>

                    <td>

                        <span class="
                            px-3 py-1 rounded-full text-xs

                            @if($order->status == 'Approved')
                                bg-green-100 text-green-700
                            @elseif($order->status == 'Rejected')
                                bg-red-100 text-red-700
                            @else
                                bg-yellow-100 text-yellow-700
                            @endif
                        ">

                            {{ $order->status }}

                        </span>

                    </td>

                    <td>
                        {{ $order->created_at->format('d M') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="bg-white rounded-3xl p-8 shadow mt-8">

    <h2 class="text-2xl font-bold mb-6">

        🔔 Notifications

    </h2>

    <div class="space-y-4">

        @forelse($notifications as $notification)

            <div class="border-b pb-3">

                <h3 class="font-semibold">

                    {{ $notification->title }}

                </h3>

                <p class="text-gray-500 text-sm">

                    {{ $notification->message }}

                </p>

                <p class="text-xs text-gray-400 mt-1">

                    {{ $notification->created_at->diffForHumans() }}

                </p>

            </div>

        @empty

            <p class="text-gray-400">

                No notifications

            </p>

        @endforelse

    </div>

</div>

    <!-- TRANSACTION -->
    <div class="bg-white rounded-2xl p-6 shadow">
        <div class="space-y-4 max-h-[220px] overflow-y-auto"></div>

        <h2 class="font-bold text-xl mb-5">
            Transaction History
        </h2>

<div class="space-y-4">

    <div class="space-y-4">

    @foreach($histories as $history)

    <div class="border-l-4 border-[#b8873a] pl-4">

        <p class="font-semibold">
            {{ $history->title }}
        </p>

        <p class="text-sm text-gray-500">
            {{ $history->message }}
        </p>

        <p class="text-xs text-gray-400 mt-1">
            {{ $history->created_at->diffForHumans() }}
        </p>

    </div>

    @endforeach

    </div>

</div>

</div>
</div>

<!-- PRODUCTION OVERVIEW -->

<div class="bg-white rounded-2xl p-6 shadow mt-6">

    <h2 class="font-bold text-xl mb-6">
        Production Overview
    </h2>

    <div class="space-y-4">

        <!-- RECEIVED -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    📦 Order Received
                </span>

                <span class="font-bold">
                    {{ $received }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-[#b8873a] rounded-full"
                     style="width: {{ $totalOrders ? ($received/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

        <!-- DESIGN -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    🎨 Design Review
                </span>

                <span class="font-bold">
                    {{ $design }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-[#b8873a] rounded-full"
                     style="width: {{ $totalOrders ? ($design/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

        <!-- PRODUCTION -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    ⚙️ Production
                </span>

                <span class="font-bold">
                    {{ $production }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-[#b8873a] rounded-full"
                     style="width: {{ $totalOrders ? ($production/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

        <!-- QC -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    🔍 QC
                </span>

                <span class="font-bold">
                    {{ $qc }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-[#b8873a] rounded-full"
                     style="width: {{ $totalOrders ? ($qc/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

        <!-- SHIPPING -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    🚚 Shipping
                </span>

                <span class="font-bold">
                    {{ $shipping }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-[#b8873a] rounded-full"
                     style="width: {{ $totalOrders ? ($shipping/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

        <!-- COMPLETED -->
        <div>

            <div class="flex justify-between mb-2">

                <span class="font-medium">
                    ✅ Completed
                </span>

                <span class="font-bold">
                    {{ $completed }}
                </span>

            </div>

            <div class="w-full h-3 bg-gray-200 rounded-full">

                <div class="h-3 bg-green-500 rounded-full"
                     style="width: {{ $totalOrders ? ($completed/$totalOrders)*100 : 0 }}%">
                </div>

            </div>

        </div>

    </div>

</div>


</div>
</body>
</html>