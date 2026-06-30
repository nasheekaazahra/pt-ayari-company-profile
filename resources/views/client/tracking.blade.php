<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Tracking Order</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
    
</head>

<body class="bg-[#f5f1ef] flex">
    
@include('client.layouts.sidebar')

<div class="flex-1 p-10">

    <h1 class="text-5xl font-bold text-center mb-5">
        Track Your Order
    </h1>

    <p class="text-center text-gray-500 mb-16">
        Monitor your order progress in real time.
    </p>

        @if(session('error'))

        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-4">

            {{ session('error') }}

        </div>

        @endif
    <!-- SEARCH FORM -->
    <div class="mt-10 mb-10">

    <form action="/client/tracking/search" method="GET">

        <div class="bg-white rounded-full p-2 flex shadow-md">

            <input
                type="text"
                name="product_name"
                placeholder="Search your product..."
                class="flex-1 px-6 border-none outline-none ring-0 focus:ring-0 focus:outline-none bg-transparent">

            <button
                class="bg-[#E0C375] hover:bg-[#d8cd3c]
                       px-8 py-3 rounded-full
                       font-medium">

                🔍 Track Now

            </button>

        </div>

    </form>

</div>

    <div class="bg-white rounded-3xl shadow-lg p-12">

        <p class="text-[#b8873a] font-medium">
            ORDER ID : ORD-{{ $order->id }}
        </p>

        <h2 class="text-2xl font-semibold mb-14">
            {{ $order->product_name }}
        </h2>

        <div class="relative">

            <!-- LINE -->
            <div class="absolute top-7 left-0 w-full h-1 bg-gray-200"></div>

            <div class="flex justify-between relative z-10">

                @php

                $steps = [

                    'Order Received',
                    'Design Approval',
                    'Production',
                    'Quality Control',
                    'Completed'

                ];

                @endphp

                @foreach($steps as $index => $step)

                <div class="flex flex-col items-center">

                    <div
                        class="w-14 h-14 rounded-full flex items-center justify-center font-bold

                        @if(($index + 1) < $order->tracking_step)

                            bg-[#b8873a] text-white

                        @elseif(($index + 1) == $order->tracking_step)

                            border-4 border-black bg-[#b8873a] text-white

                        @else

                            bg-gray-200 text-gray-400

                        @endif
                        ">

                        {{ $index + 1 }}

                    </div>

                    <p class="mt-4 text-sm text-center font-medium">
                        {{ $step }}
                    </p>

                </div>

                @endforeach

            </div>

        </div>

        <div class="mt-12 text-center">

        @if($order->tracking_step == 1)

        <p class="text-lg text-gray-600">
        Pesanan telah diterima dan sedang menunggu proses desain.
        </p>

        @elseif($order->tracking_step == 2)

        <p class="text-lg text-gray-600">
        Tim desain sedang mempersiapkan dan menyesuaikan desain produk.
        </p>

        @elseif($order->tracking_step == 3)

        <p class="text-lg text-gray-600">
        Produk sedang diproduksi sesuai desain yang telah disetujui.
        </p>

        @elseif($order->tracking_step == 4)

        <p class="text-lg text-gray-600">
        Produk sedang melalui proses quality control.
        </p>

        @elseif($order->tracking_step == 5)

        <p class="text-lg text-gray-600">
        Produk sedang dalam proses pengiriman.
        </p>

        @elseif($order->tracking_step == 6)

        <p class="text-lg text-gray-600">
        Pesanan telah selesai diproses dan diterima pelanggan.
        </p>

        @endif

        <div class="mt-4 text-sm text-gray-400">

        @if($order->tracking_step == 1 && $order->received_at)
        {{ \Carbon\Carbon::parse($order->received_at)->format('d M Y H:i') }}

        @elseif($order->tracking_step == 2 && $order->design_at)
        {{ \Carbon\Carbon::parse($order->design_at)->format('d M Y H:i') }}

        @elseif($order->tracking_step == 3 && $order->production_at)
        {{ \Carbon\Carbon::parse($order->production_at)->format('d M Y H:i') }}

        @elseif($order->tracking_step == 4 && $order->qc_at)
        {{ \Carbon\Carbon::parse($order->qc_at)->format('d M Y H:i') }}

        @elseif($order->tracking_step == 5 && $order->shipping_at)
        {{ \Carbon\Carbon::parse($order->shipping_at)->format('d M Y H:i') }}

        @elseif($order->tracking_step == 6 && $order->completed_at)
        {{ \Carbon\Carbon::parse($order->completed_at)->format('d M Y H:i') }}

        @endif

        </div>

        </div>
    </div>

    @if(
    $order->status == 'Revision'
    ||
    $order->status == 'Waiting Client Revision'
)

<div class="bg-red-50 border border-red-200 rounded-3xl p-8 mt-8">

    <h2 class="text-2xl font-bold text-red-600 mb-4">
        ⚠ Revision Request
    </h2>

    <p class="mb-5">
        {{ $order->qc_notes }}
    </p>

    @if($order->qc_photo)

        <img
            src="{{ asset('storage/'.$order->qc_photo) }}"
            class="rounded-2xl w-96 mb-5">

    @endif

    <!-- CLIENT REVISION -->

    <form
        action="/client/orders/{{ $order->id }}/revision"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <textarea
            name="client_revision_notes"
            rows="4"
            placeholder="Write your revision response..."
            class="w-full border rounded-2xl p-4 mb-4"
        ></textarea>

        <input
            type="file"
            name="client_revision_file"
            class="w-full border rounded-xl p-3 mb-4">

        <button
            class="bg-blue-600 text-white px-6 py-3 rounded-xl"
        >
            Send Revision
        </button>

    </form>

</div>

@endif

    @if($order->tracking_step == 6)

<div class="mt-6">

    <a
        href="{{ route('client.orders.invoice',$order->id) }}"
        class="bg-[#b8873a] hover:bg-green-700
               text-white px-6 py-3 rounded-xl"
    >
        📄 Download Invoice
    </a>

</div>

@endif

    <div class="flex justify-center mt-12">

    <a href="/client/status"
       class="bg-[#b8873a]
              hover:bg-[#9f732e]
              text-white
              px-10 py-4
              rounded-2xl
              font-semibold
              shadow-lg
              transition">

        ← Back to Status Orders

    </a>

</div>
</div>

</div>
</body>
</html>