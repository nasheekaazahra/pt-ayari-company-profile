<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f5] flex">

@include('admin.layouts.sidebar')

<div class="flex-1 p-10">

<!-- HEADER -->
<div class="bg-black rounded-3xl p-8 text-white mb-8">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-5xl font-bold">
                Orders Management 📦
            </h1>

            <p class="text-gray-300 mt-3">
                Monitor, manage, and update production orders in real time.
            </p>

            <p class="text-sm text-gray-400 mt-4">
                {{ now()->format('l, d F Y') }}
            </p>

        </div>

        <div class="text-right">

            <p class="text-gray-400">
                Active Orders
            </p>

            <h2 class="text-5xl font-bold text-[#b8873a]">
                {{ $orders->where('tracking_step', '<', 6)->count() }}
            </h2>

        </div>

    </div>

</div>


    <!-- STATS -->
    <div class="grid grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Total Orders
                    </p>
                    <h2 class="text-4xl font-bold mt-2">
                        {{ $orders->count() }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-[#b8873a]/10 flex items-center justify-center">
                    <i class="fa-solid fa-box text-[#b8873a] text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Production
                    </p>
                    <h2 class="text-4xl font-bold mt-2 text-blue-500">
                        {{ $orders->where('tracking_step',3)->count() }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
                    <i class="fa-solid fa-gears text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        QC
                    </p>
                    <h2 class="text-4xl font-bold mt-2 text-purple-500">
                        {{ $orders->where('tracking_step',4)->count() }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass text-purple-500 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Completed
                    </p>
                    <h2 class="text-4xl font-bold mt-2 text-green-500">
                        {{ $orders->where('tracking_step',6)->count() }}
                    </h2>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">
                    <i class="fa-solid fa-circle-check text-green-500 text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- SEARCH -->
    <div class="bg-white rounded-2xl p-5 shadow mb-8">

    <form method="GET" action="/admin/orders">

        <div class="flex gap-4">

            <div class="relative flex-1">

                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search order, client, product..."
                    class="w-full border border-gray-200 rounded-xl pl-12 pr-4 py-3"
                >

            </div>

            <select
                name="status"
                onchange="this.form.submit()"
                class="border border-gray-200 rounded-xl px-4 py-3 min-w-[180px]"
            >

                <option value="">
                    All Status
                </option>

                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>
                    Order Received
                </option>

                <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>
                    Design Review
                </option>

                <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>
                    Production
                </option>

                <option value="4" {{ request('status') == 4 ? 'selected' : '' }}>
                    QC
                </option>

                <option value="5" {{ request('status') == 5 ? 'selected' : '' }}>
                    Shipping
                </option>

                <option value="6" {{ request('status') == 6 ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            <button
                class="bg-[#b8873a] text-white px-6 rounded-xl"
            >
                Search
            </button>

        </div>

    </form>

</div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-5 text-left">Order ID</th>
                    <th class="p-5 text-left">Client</th>
                    <th class="p-5 text-left">Product</th>
                    <th class="p-5 text-left">Status</th>
                    <th class="p-5 text-left">Tracking</th>
                    <th class="p-5 text-left">Update</th>
                    <th class="p-5 text-left">Progress</th>
                    <th class="p-5 text-left">Detail</th>

                </tr>

            </thead>

            <tbody>

            @foreach($orders as $order)

                @php
                    $progress = ($order->tracking_step / 6) * 100;
                @endphp

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="p-5 font-semibold">
                        ORD-{{ $order->id }}
                    </td>

                    <td class="p-5">
                        {{ $order->customer_name }}
                    </td>

                    <td class="p-5">
                        {{ $order->product_name }}
                    </td>

                    <td class="p-5">

                        @if($order->tracking_step == 6)

                            <span class="inline-flex px-4 py-1 rounded-full bg-green-100 text-green-600 text-sm font-medium">
                                Completed
                            </span>

                        @elseif($order->tracking_step >= 3)

                            <span class="inline-flex px-4 py-1 rounded-full bg-blue-100 text-blue-600 text-sm font-medium whitespace-nowrap">
                                In Progress
                            </span>

                        @else

                            <span class="inline-flex px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td class="p-5">

                        @switch($order->tracking_step)

                            @case(1)
                                Order Received
                                @break

                            @case(2)
                                Design Review
                                @break

                            @case(3)
                                Production
                                @break

                            @case(4)
                                QC
                                @break

                            @case(5)
                                Shipping
                                @break

                            @default
                                Completed

                        @endswitch

                    </td>

                    <td class="p-5">

                    
                        <form
                            action="/admin/orders/{{ $order->id }}/tracking"
                            method="POST"
                            class="flex items-center gap-2"
                        >

                            @csrf
                            @method('PATCH')

                            <select
                                name="tracking_step"
                                class="border rounded-xl px-3 py-2"
                            >

                                <option value="1" {{ $order->tracking_step == 1 ? 'selected' : '' }}>Received</option>
                                <option value="2" {{ $order->tracking_step == 2 ? 'selected' : '' }}>Design</option>
                                <option value="3" {{ $order->tracking_step == 3 ? 'selected' : '' }}>Production</option>
                                <option value="4" {{ $order->tracking_step == 4 ? 'selected' : '' }}>QC</option>
                                <option value="5" {{ $order->tracking_step == 5 ? 'selected' : '' }}>Shipping</option>
                                <option value="6" {{ $order->tracking_step == 6 ? 'selected' : '' }}>Completed</option>

                            </select>

                            <button
                                class="bg-[#b8873a] hover:bg-[#a67831] text-white px-4 py-2 rounded-xl transition"
                            >
                                Update
                            </button>

                        </form>

                    </td>

                    <td class="p-5 w-64">

                        <div class="w-full h-3 bg-gray-200 rounded-full">

                            <div
                                class="h-3 bg-[#b8873a] rounded-full"
                                style="width: {{ $progress }}%"
                            ></div>

                        </div>

                        <span class="text-xs text-gray-500 mt-2 block">
                            {{ intval($progress) }}%
                        </span>

                    </td>

                    <td class="p-5">

                    <a
                    href="/admin/orders/{{ $order->id }}"
                    class="relative bg-gray-500 text-white px-5 py-2 rounded-xl">

                    View

                    @if(
                        $order->status == 'Revision'
                        ||
                        $order->status == 'Client Revision Submitted'
                    )

                    <span
                        class="absolute -top-2 -right-2
                            bg-red-500 text-white
                            text-xs font-bold
                            w-5 h-5 rounded-full
                            flex items-center justify-center">

                        1

                    </span>

                    @endif

                </a>

    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>