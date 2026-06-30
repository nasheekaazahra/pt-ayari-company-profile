<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>
Invoice ORD-{{ $order->id }}
</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow">

    <div class="flex justify-between items-center border-b pb-6">

    <!-- Company -->
    <div>

        <h1 class="text-4xl font-bold">
            AYARI
        </h1>

        <p class="text-gray-500">
            Kreasi Persada
        </p>

    </div>

    <!-- Logo -->
    <div>

        <img
            src="{{ asset('images/logo-ayari.jpg') }}"
            alt="AYARI Logo"
            class="w-24 h-24 object-contain"
        >

    </div>

    <!-- Invoice -->
    <div class="text-right">

        <h2 class="text-3xl font-bold">
            INVOICE
        </h2>

        <p class="text-gray-500 mt-2">
            INV-{{ $order->id }}
        </p>

    </div>

</div>

    <div class="grid grid-cols-2 gap-10 mt-10">

        <div>

            <p class="text-gray-500">
                Customer
            </p>

            <h3 class="text-2xl font-bold">
                {{ $order->customer_name }}
            </h3>

        </div>

        <div>

            <p class="text-gray-500">
                Date
            </p>

            <h3 class="font-semibold">
                {{ now()->format('d F Y') }}
            </h3>

        </div>

    </div>

    <div class="mt-10">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Product
                    </th>

                    <th class="text-left py-3">
                        Amount
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td class="py-4">
                        {{ $order->product_name }}
                    </td>

                    <td class="py-4">
                        Rp {{ number_format($order->price,0,',','.') }}
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <div class="mt-10 border-t pt-6">

    <h3 class="font-bold text-lg mb-4">
        Order Summary
    </h3>

    <div class="grid grid-cols-2 gap-y-3">

        <p class="text-gray-600">
            Order Number
        </p>

        <p class="font-semibold text-right">
            ORD-{{ $order->id }}
        </p>

        <p class="text-gray-600">
            Product
        </p>

        <p class="font-semibold text-right">
            {{ $order->product_name }}
        </p>

        <p class="text-gray-600">
            Payment Status
        </p>

        <p class="font-semibold text-right">
            {{ strtoupper($order->payment_status) }}
        </p>

        <p class="text-gray-600">
            Production Status
        </p>

        <p class="font-semibold text-right">

@if($order->tracking_step == 1)
    Order Received

@elseif($order->tracking_step == 2)
    Design Review

@elseif($order->tracking_step == 3)
    Production

@elseif($order->tracking_step == 4)
    Quality Control

@elseif($order->tracking_step == 5)
    Shipping

@elseif($order->tracking_step == 6)
    Completed

@endif

</p>

    </div>

</div>

    <div class="mt-10 flex justify-end">

        <div class="w-80">

            <div class="flex justify-between mb-3">

                <span>Total</span>

                <span>
                    Rp {{ number_format($order->price,0,',','.') }}
                </span>

            </div>

            <div class="flex justify-between mb-3">

                <span>DP Paid</span>

                <span>
                    Rp {{ number_format($order->dp,0,',','.') }}
                </span>

            </div>

            <div class="flex justify-between mb-3">

                <span>Remaining</span>

                <span>
                    Rp {{ number_format($order->remaining_payment,0,',','.') }}
                </span>

            </div>

            <hr class="my-3">

            <div class="flex justify-between text-xl font-bold">

                <span>Status</span>

                <span>
                    {{ strtoupper($order->payment_status) }}
                </span>

            </div>

        </div>

    </div>

    <div class="mt-20 text-center">

        <p class="text-gray-500">
            Thank you for your order.
        </p>

        <p class="font-bold mt-2">
            AYARI Kreasi Persada
        </p>

    </div>

    <div class="mt-20 flex justify-between">

    <div>

        <p class="text-gray-500 mb-16">
            Customer Signature
        </p>

        <div class="border-t border-black w-52"></div>

        <p class="mt-2">
            {{ $order->customer_name }}
        </p>

    </div>

    <div class="text-center">

        <img
            src="{{ asset('images/logo-ayari.jpg') }}"
            class="w-20 mx-auto mb-2"
        >

        <div class="border-t border-black w-52"></div>

        <p class="mt-2 font-semibold">
            AYARI Kreasi Persada
        </p>

        <p class="text-sm text-gray-500">
            Authorized Signature
        </p>

    </div>

</div>

</div>

<div class="text-center mt-8">

<style>
@media print{
    .no-print{
        display:none;
    }
}
</style>
    <div class="no-print">
    <button onclick="window.print()">
        Print / Save PDF
    </button>
</div>

</div>

</body>
</html>