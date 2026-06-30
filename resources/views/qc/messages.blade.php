<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-[#f5f5f5] flex">

@include('qc.layouts.sidebar')

<div class="flex-1 p-10">

    <!-- HEADER -->
    <div class="bg-black rounded-3xl p-8 text-white mb-8">

        <h1 class="text-4xl font-bold">
            QC Messages 💬
        </h1>

        <p class="text-gray-400 mt-2">
            Communicate with Admin
        </p>

    </div>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-[700px] flex">

        <!-- LEFT -->
        <div class="w-[280px] border-r p-4 bg-[#fafafa]">

            <h2 class="font-bold text-xl mb-4">
                Orders
            </h2>

            <div class="space-y-3">

                @foreach($orders as $item)

                <a href="/qc/messages/{{ $item->id }}">

                    <div class="
                    border rounded-2xl p-4 transition

                    @if(isset($order) && $order->id == $item->id)
                        bg-[#b8873a] text-white
                    @else
                        bg-white hover:bg-gray-50
                    @endif
                    ">

                        <p class="font-bold">
                            ORD-{{ $item->id }}
                        </p>

                        <p class="text-sm">
                            {{ $item->product_name }}
                        </p>

                    </div>

                </a>

                @endforeach

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex-1 flex flex-col">

            @if(isset($order))

                <!-- HEADER -->
                <div class="border-b p-6">

                    <h2 class="font-bold text-xl">
                        ORD-{{ $order->id }}
                    </h2>

                    <p class="text-gray-500">
                        {{ $order->product_name }}
                    </p>

                </div>

                <!-- CHAT -->
                <div
                id="chatBox"
                class="flex-1 p-6 overflow-y-auto">
                    @forelse($messages as $message)

                        @if($message->sender_role == 'qc')

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

                        <div class="flex justify-start mb-4">

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

                    <form
                    action="/qc/messages/send"
                    method="POST"
                    class="flex gap-3">

                        @csrf

                        <input
                        type="hidden"
                        name="order_id"
                        value="{{ $order->id }}">

                        <input
                        type="text"
                        name="message"
                        placeholder="Type message..."
                        class="flex-1 border rounded-xl px-4 py-3">

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

                        <h2 class="text-2xl font-bold">
                            Select an Order
                        </h2>

                        <p class="text-gray-400 mt-2">
                            Choose an order from the left panel.
                        </p>

                    </div>

                </div>

            @endif

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