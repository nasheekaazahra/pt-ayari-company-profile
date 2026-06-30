<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Messages</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-[#f3f3f3] flex">

@include('client.layouts.sidebar')

<!-- CONTENT -->
<div class="flex-1 p-10">

    <h1 class="text-5xl font-bold text-[#2b2b2b]">
        Messages
    </h1>

    <p class="text-gray-500 mt-2 mb-10">
        Communicate directly with our team regarding your project.
    </p>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-[700px] flex">

        <!-- LEFT SIDE -->
        <div
        style="background:#f8f8f8"
        class="w-[260px] p-4 space-y-4 border-r border-[#c8962d]">
        

    @foreach($orders as $item)

    <a href="/client/messages/{{ $item->id }}">

        <div class="
        @if(isset($order) && $order->id == $item->id)
            bg-[#b8873a] text-white border-[#b8873a]
        @else
            bg-white hover:bg-[#f7f3ea] hover:border-[#b8873a]
        @endif
        border rounded-2xl p-4 cursor-pointer transition shadow-sm">

            <p class="font-bold">
                ORD-{{ $item->id }}
            </p>

            <p class="text-sm text-gray-600">
                {{ $item->product_name }}
            </p>

        </div>

    </a>

    @endforeach

</div>

        <!-- RIGHT SIDE -->
<div class="flex-1 flex flex-col">

@if(isset($order))

    <!-- HEADER -->
    <div class="border-b p-6">

        <h2 class="text-xl font-bold">
            ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
        </h2>

        <p class="text-gray-500">
            {{ $order->product_name }}
        </p>

    </div>

    <!-- CHAT AREA -->
    <div class="flex-1 p-6 overflow-y-auto">

        @forelse($messages as $message)

    @if($message->sender_role == 'client')

        <div class="flex justify-end mb-4">

            <div class="flex flex-col items-end">

                <div class="bg-[#b8873a] text-white px-5 py-3 rounded-2xl max-w-md">
                    {{ $message->message }}
                </div>

                <span class="text-xs text-gray-400 mt-1">
                    {{ $message->created_at->format('H:i') }}
                </span>

            </div>

        </div>

    @else

        <div class="flex mb-4">

            <div class="flex flex-col items-start">

                <div class="bg-gray-100 px-5 py-3 rounded-2xl max-w-md">
                    {{ $message->message }}
                </div>

                <span class="text-xs text-gray-400 mt-1">
                    {{ $message->created_at->format('H:i') }}
                </span>

            </div>

        </div>

    @endif

@empty

    <p class="text-gray-400">
        No messages yet.
    </p>

@endforelse

    </div>

    <!-- INPUT -->
    <div class="border-t p-5">

        <form action="/client/messages/send" method="POST" class="flex gap-3">

            @csrf

            <input
                type="hidden"
                name="order_id"
                value="{{ $order->id }}">

            <input
                type="text"
                name="message"
                placeholder="Type your message..."
                class="flex-1 border border-gray-300 rounded-xl px-5 py-3">

            <button
                class="bg-[#b8873a] text-white px-8 rounded-xl">

                Send

            </button>

        </form>

    </div>

@else

    <div class="flex-1 flex items-center justify-center">

        <div class="text-center">

            <div class="text-6xl mb-4">
                💬
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                Select a Conversation
            </h2>

            <p class="text-gray-400 mt-2">
                Choose an order from the left panel
                to start chatting with our team.
            </p>

        </div>

    </div>

@endif

</div>

        </div>

    </div>

</div>

</body>
</html>