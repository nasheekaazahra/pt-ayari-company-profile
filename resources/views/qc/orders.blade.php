<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>QC Orders</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-[#f5f5f5] flex">

@include('qc.layouts.sidebar')

<div class="flex-1 p-10">

    <!-- HEADER -->

    <div class="bg-black rounded-3xl p-8 mb-8 text-white">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-5xl font-bold">
                    QC Orders 🔍
                </h1>

                <p class="text-gray-400 mt-2">
                    Verify and inspect products before shipping.
                </p>

            </div>

            <div>

                <p class="text-sm text-gray-500">
                    {{ now()->format('d F Y') }}
                </p>

            </div>

        </div>

    </div>

    <!-- SEARCH & FILTER -->
    <div class="flex justify-between items-center mb-6">

    <input
        type="text"
        placeholder="Search order..."
        class="border rounded-xl px-4 py-3 w-80">

    <select
        class="border rounded-xl px-4 py-3">

        <option>All Status</option>
        <option>Waiting QC</option>
        <option>Approved</option>
        <option>Revision</option>

    </select>

</div>

    <!-- TABLE -->

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full">

            <thead>

                <tr class="bg-[#b8873a] text-white">

                    <th class="p-5 text-left">
                        Order ID
                    </th>

                    <th class="p-5 text-left">
                        Customer
                    </th>

                    <th class="p-5 text-left">
                        Product
                    </th>

                    <th class="p-5 text-left">
                        Status
                    </th>

                    <th class="p-5 text-center">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($orders as $order)

                <tr class="border-b hover:bg-gray-50">

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

                        @if($order->status == 'Approved')

                            <span class="px-4 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Approved
                            </span>

                        @elseif($order->status == 'Rejected')

                            <span class="px-4 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Revision
                            </span>

                        @else

                            <span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                Waiting QC
                            </span>

                        @endif

                    </td>

                    <td class="p-5">

                        <div class="flex justify-center gap-2">

                            <a
                            href="/qc/orders/{{ $order->id }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">

                                <i class="fa-solid fa-eye"></i>
                                Inspect

                            </a>

                            <form
                            action="/qc/orders/{{ $order->id }}/approve"
                            method="POST">

                                @csrf

                                <button
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl">

                                    <i class="fa-solid fa-check"></i>

                                </button>

                            </form>

                            <form
                            action="/qc/orders/{{ $order->id }}/reject"
                            method="POST">

                                @csrf

                                <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>