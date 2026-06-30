<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-[#f5f5f5] flex">

@include('admin.layouts.sidebar')

<div class="flex-1 p-10">

@php
$progress = ($order->tracking_step / 6) * 100;
@endphp

<!-- HEADER -->
<div class="bg-black rounded-3xl p-8 mb-8 text-white">

    <div class="flex justify-between items-start">

        <div>

            <h1 class="text-5xl font-bold">
                Order Detail 📦
            </h1>

            <p class="text-gray-400 mt-3">
                View complete order information, payment details,
                and production progress.
            </p>

            <p class="text-sm text-gray-500 mt-6">
                {{ now()->format('l, d F Y') }}
            </p>

        </div>

        <div class="text-right">

            <p class="text-gray-400">
                Order ID
            </p>

            <h2 class="text-4xl font-bold text-[#b8873a]">
                ORD-{{ $order->id }}
            </h2>

        </div>

    </div>

</div>

<!-- CUSTOMER + PAYMENT -->
<div class="grid grid-cols-12 gap-6 mb-6">

    <!-- CUSTOMER INFO -->
    <div class="col-span-8 bg-white rounded-3xl p-8 shadow-sm">

        <h2 class="font-bold text-2xl mb-8">
            <i class="fa-solid fa-user text-[#b8873a] mr-2"></i>
            Customer Information
        </h2>

        <div class="grid grid-cols-2 gap-8">

            <div>
                <p class="text-gray-500 text-sm">Customer Name</p>
                <h3 class="font-bold text-2xl">
                    {{ $order->customer_name }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Email</p>
                <h3 class="font-semibold">
                    {{ $order->email ?? '-' }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Phone</p>
                <h3 class="font-semibold">
                    {{ $order->phone ?? '-' }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Address</p>
                <h3 class="font-semibold">
                    {{ $order->address ?? '-' }}
                </h3>
            </div>

        </div>

    </div>

    <!-- PAYMENT -->
    <div class="col-span-4 bg-white rounded-3xl p-8 shadow-sm">

        <h2 class="font-bold text-2xl mb-8">
            <i class="fa-solid fa-credit-card text-[#b8873a] mr-2"></i>
            Payment
        </h2>

        <div class="grid grid-cols-3 gap-6 mb-6">

            <div>
                <p class="text-gray-500 text-sm">Invoice</p>
                <p class="font-bold">INV-{{ $order->id }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Status</p>

                @if($order->payment_status == 'Paid')
                    <p class="font-bold text-green-600">Paid</p>
                @elseif($order->payment_status == 'Partial')
                    <p class="font-bold text-yellow-500">Partial</p>
                @else
                    <p class="font-bold text-red-500">Unpaid</p>
                @endif
            </div>

            <div>
                <p class="text-gray-500 text-sm">Amount</p>
                <p class="font-bold">
                    Rp {{ number_format($order->price,0,',','.') }}
                </p>
            </div>

        </div>

        <div class="grid grid-cols-3 gap-6 mb-6">

            <div>
                <p class="text-gray-500 text-sm">DP</p>
                <p class="font-bold text-green-600">
                    Rp {{ number_format($order->dp,0,',','.') }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Remaining</p>
                <p class="font-bold text-red-500">
                    Rp {{ number_format($order->remaining_payment,0,',','.') }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Progress</p>
                <p class="font-bold">
                    {{ $order->price > 0 ? intval(($order->dp / $order->price) * 100) : 0 }}%
                </p>
            </div>

        </div>

        <div class="w-full h-2 bg-gray-200 rounded-full mb-6">

            <div
                class="h-2 bg-[#b8873a] rounded-full"
                style="width: {{ $order->price > 0 ? ($order->dp / $order->price) * 100 : 0 }}%">
            </div>

        </div>

        <a
            href="{{ route('admin.orders.payment', $order->id) }}"
            class="bg-[#b8873a] text-white px-6 py-3 rounded-xl inline-flex items-center gap-2"
        >
            <i class="fa-solid fa-credit-card"></i>
            Update Payment
        </a>

    </div>

</div>

<!-- PROJECT DETAIL -->
<div class="bg-white rounded-3xl p-8 shadow-sm mb-6">

    <h2 class="font-bold text-2xl mb-8">
        <i class="fa-solid fa-box text-[#b8873a] mr-2"></i>
        Project Detail
    </h2>

    <div class="grid grid-cols-4 gap-6">

        <div>
            <p class="text-gray-500 text-sm">Service Type</p>
            <p class="font-bold">
                {{ $order->service_type ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Product</p>
            <p class="font-bold">
                {{ $order->product_name }}
            </p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Quantity</p>
            <p class="font-bold">
                {{ $order->quantity ?? 0 }} pcs
            </p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Deadline</p>
            <p class="font-bold text-red-500">
                {{ $order->deadline ?? '-' }}
            </p>
        </div>

    </div>

</div>

@php

$steps = [
    1 => [
        'icon' => 'fa-box',
        'name' => 'Received'
    ],
    2 => [
        'icon' => 'fa-pen-ruler',
        'name' => 'Design'
    ],
    3 => [
        'icon' => 'fa-gears',
        'name' => 'Production'
    ],
    4 => [
        'icon' => 'fa-magnifying-glass',
        'name' => 'QC'
    ],
    5 => [
        'icon' => 'fa-truck',
        'name' => 'Shipping'
    ],
    6 => [
        'icon' => 'fa-circle-check',
        'name' => 'Completed'
    ],
];

@endphp

<!-- TRACKING -->
<div class="bg-white rounded-3xl p-8 shadow-sm mb-6">

    <h2 class="font-bold text-2xl mb-8">
        Production Tracking
    </h2>

    <div class="flex justify-between items-center">

        @foreach($steps as $step => $data)

        <div class="flex flex-col items-center flex-1">

            <div class="
                w-16 h-16 rounded-full flex items-center justify-center
                {{ $order->tracking_step >= $step
                ? 'bg-[#b8873a] text-white'
                : 'bg-gray-100 text-gray-500' }}
            ">
                <i class="fa-solid {{ $data['icon'] }}"></i>
            </div>

            <span class="mt-3 text-sm">
                {{ $data['name'] }}
            </span>

        </div>

        @endforeach

    </div>

</div>

<!-- TIMELINE + NOTES -->
<div class="grid grid-cols-12 gap-6">

    <!-- TIMELINE -->
    <div class="col-span-7 bg-white rounded-3xl p-8 shadow-sm">

        <h2 class="font-bold text-2xl mb-6">
            Timeline History
        </h2>

        <div class="space-y-6">

            <div>
                <h3 class="font-semibold">Order Received</h3>
                <p class="text-sm text-gray-500">
                    {{ $order->received_at ?? 'Waiting...' }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold">Design</h3>
                <p class="text-sm text-gray-500">
                    {{ $order->design_at ?? 'Waiting...' }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold">Production</h3>
                <p class="text-sm text-gray-500">
                    {{ $order->production_at ?? 'Waiting...' }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold">QC</h3>
                <p class="text-sm text-gray-500">
                    {{ $order->qc_at ?? 'Waiting...' }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold">Shipping</h3>
                <p class="text-sm text-gray-500">
                    {{ $order->shipping_at ?? 'Waiting...' }}
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-green-600">
                    Completed
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $order->completed_at ?? 'Waiting...' }}
                </p>
            </div>

        </div>

    </div>

    <!-- DESIGN -->
<div class="col-span-5 bg-white rounded-3xl p-8 shadow-sm">

    <h2 class="font-bold text-2xl mb-6">
        Design Asset
    </h2>

    @if($order->design_file)

        <a
            href="{{ asset('storage/'.$order->design_file) }}"
            target="_blank"
        >

            <img
                src="{{ asset('storage/'.$order->design_file) }}"
                class="w-full h-72 object-cover rounded-2xl"
            >

        </a>

    @else

        <div class="bg-gray-50 rounded-2xl h-72 flex items-center justify-center">
            <p class="text-gray-400">
                No design uploaded
            </p>
        </div>

    @endif

    <form
    action="/admin/orders/{{ $order->id }}/design"
    method="POST"
    class="flex gap-3 mt-5"
>

    @csrf

    <button
        name="design_status"
        value="Approved"
        class="bg-green-600 text-white px-4 py-2 rounded-xl"
    >
        Approve Design
    </button>

    <button
        name="design_status"
        value="Revision"
        class="bg-red-500 text-white px-4 py-2 rounded-xl"
    >
        Request Revision
    </button>

</form>

</div>

<!-- NOTES -->
<div class="col-span-12 bg-white rounded-3xl p-8 shadow-sm">

    <h2 class="font-bold text-2xl mb-6">
        Customer Notes
    </h2>

    <div class="bg-gray-50 rounded-2xl p-5 min-h-[150px]">

        <p class="text-gray-600 whitespace-pre-line">
            {{ $order->notes ?? 'No notes available.' }}
        </p>

    </div>

</div>

</div>

@if($order->status == 'Revision')

<div class="bg-red-50 border border-red-200 rounded-3xl p-6 mb-6">

    <h2 class="font-bold text-red-600 text-xl mb-3">

        ⚠ Revision Request From QC

    </h2>

    <p>

        {{ $order->qc_notes }}

    </p>

</div>

@endif

<!-- QC REPORT -->
<div class="
rounded-3xl p-6 shadow mt-6

{{ $order->status == 'Revision'
    ? 'bg-red-50 border border-red-200'
    : 'bg-white' }}
">

    <h2 class="font-bold text-xl mb-4">

    @if($order->status == 'Revision')
        Revision Report
    @else
        QC Report
    @endif

    </h2>

    <p class="mb-4">

        {{ $order->qc_notes ?? 'No notes yet' }}

    </p>

    <div class="space-y-2">

        <p>

            {!! $order->logo_alignment ? '✅' : '❌' !!}
            Logo Alignment

        </p>

        <p>

            {!! $order->color_accuracy ? '✅' : '❌' !!}
            Color Accuracy

        </p>

        <p>

            {!! $order->printing_quality ? '✅' : '❌' !!}
            Printing Quality

        </p>

        <p>

            {!! $order->packaging_quality ? '✅' : '❌' !!}
            Packaging Quality

        </p>

    </div>

    

    @if($order->qc_photo)

        <img
        src="{{ asset('storage/'.$order->qc_photo) }}"
        class="mt-5 rounded-2xl w-80">

    @endif

    @if($order->status == 'Client Revision Submitted')

    <div class="bg-blue-50 border border-blue-200 rounded-3xl p-6 mt-6">

        <h2 class="font-bold text-xl text-blue-600 mb-4">

            Client Revision Submission

        </h2>

        <p class="mb-4">

            {{ $order->client_revision_notes }}

        </p>

        @if($order->client_revision_file)

            <a
                href="{{ asset('storage/'.$order->client_revision_file) }}"
                target="_blank"
                class="bg-blue-600 text-white px-4 py-2 rounded-xl inline-block">

                View Revision File

            </a>

        @endif

    </div>

    @endif

    <form
    action="/admin/orders/{{ $order->id }}/send-qc-review"
    method="POST"
    class="mt-4"
>

    @csrf

    <button
        class="bg-green-600 text-white px-6 py-3 rounded-xl">

        ✅ Send To QC

    </button>

</form>

    @if($order->status == 'Revision')

    <form
        action="/admin/orders/{{ $order->id }}/send-revision"
        method="POST"
        class="mt-5">

        @csrf

        <button
            class="bg-red-500 hover:bg-red-600
                text-white px-6 py-3 rounded-xl">

            📤 Send Revision To Client

        </button>

    </form>

    @endif

</div>

<!-- BUTTON -->
<div class="col-span-2 mt-8 flex justify-end gap-3">

    <a
        href="/admin/orders"
        class="px-5 py-3 rounded-xl border border-gray-300"
    >
        Back
    </a>

     @if($order->tracking_step == 6)

    <a
        href="{{ route('admin.orders.invoice', $order->id) }}"
        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl inline-flex items-center gap-2"
    >
        <i class="fa-solid fa-file-pdf"></i>
        Download Invoice
    </a>

    @endif

</div>




</div>

</body>
</html>