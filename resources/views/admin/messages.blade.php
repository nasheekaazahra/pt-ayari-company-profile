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

<div class="bg-black rounded-3xl p-8 text-white mb-8">

    <h1 class="text-4xl font-bold">
        Messages 💬
    </h1>

    <p class="text-gray-400 mt-2">
        Communicate directly with clients
    </p>

</div>

<div class="grid grid-cols-12 gap-6">

    <!-- ORDER LIST -->
    <div class="col-span-4 bg-white rounded-3xl p-6 shadow">

        <h2 class="font-bold text-xl mb-5">
            Orders
        </h2>

        <div class="space-y-3">

            @foreach($orders as $item)

            @php

            $unreadCount = App\Models\Message::where(
                'order_id',
                $item->id
            )
            ->where(
                'sender_role',
                'client'
            )
            ->where(
                'is_read',
                false
            )
            ->count();

            @endphp

            <a
                href="/admin/messages/{{ $item->id }}"
                class="relative block border rounded-xl p-4 hover:bg-gray-50"
            >

                <h3 class="font-semibold">
                    ORD-{{ $item->id }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $item->customer_name }}
                </p>
                
                @if($unreadCount > 0)

                <span
                    class="absolute
                        top-4
                        right-4
                        bg-red-500
                        text-white
                        text-xs
                        font-bold
                        min-w-[22px]
                        h-[22px]
                        px-1
                        rounded-full
                        flex
                        items-center
                        justify-center">

                    {{ $unreadCount }}

                </span>

                @endif

            </a>

            @endforeach

        </div>

    </div>

    <!-- CHAT -->
    <div class="col-span-8 bg-white rounded-3xl p-6 shadow">

        @isset($order)

        <h2 class="font-bold text-xl mb-5">

            Chat with

            {{ $order->customer_name }}

        </h2>

        <div
        id="chatBox"
        class="h-[500px] overflow-y-auto space-y-4 mb-5">

            @foreach($messages as $message)

            <div class="
            flex
            {{ $message->sender_role == 'admin'
            ? 'justify-end'
            : 'justify-start' }}
            ">

                <div class="
                flex flex-col
                {{ $message->sender_role == 'admin'
                ? 'items-end'
                : 'items-start' }}
                ">

                    <div class="
                    w-fit
                    max-w-md
                    px-4 py-3
                    rounded-2xl
                    break-words
                    shadow-sm

                    {{ $message->sender_role == 'admin'
                    ? 'bg-[#b8873a] text-white'
                    : 'bg-gray-100 text-black' }}
                    ">

                        {{ $message->message }}

                    </div>

                    <span class="text-xs text-gray-400 mt-1">

                        {{ $message->created_at->format('H:i') }}

                    </span>

                </div>

            </div>

            @endforeach

        </div>

        <form
            action="/admin/messages/send"
            method="POST"
            class="flex gap-3"
        >

            @csrf

            <input
                type="hidden"
                name="order_id"
                value="{{ $order->id }}"
            >

            <input
                type="text"
                name="message"
                placeholder="Type message..."
                class="flex-1 border rounded-xl px-4"
            >

            <button
                class="bg-[#b8873a] text-white px-6 rounded-xl"
            >
                Send
            </button>

        </form>

        @else

        <div class="h-[500px] flex items-center justify-center text-gray-400">

            Select an order to start chatting

        </div>

        @endisset

    </div>

</div>

</div>

<script>

const chatBox =
document.getElementById('chatBox');

if(chatBox)
{
    chatBox.scrollTop =
    chatBox.scrollHeight;
}

</script>
</body>
</html>