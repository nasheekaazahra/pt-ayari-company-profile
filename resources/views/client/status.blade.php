<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Status Orders</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-[#f3f3f3] flex">

<!-- SIDEBAR -->
@include('client.layouts.sidebar')

<!-- CONTENT -->
<div class="flex-1 p-10">

    <h1 class="text-5xl font-bold text-[#2b2b2b]">
        Status Orders
    </h1>

    <p class="text-gray-500 mt-2 mb-10">
        Monitor your project progress.
    </p>

    <!-- ORDER LIST -->
    <div class="space-y-6">

        @foreach($orders as $order)

        <div class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition mb-8">

                <!-- TOP -->
                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="text-2xl font-bold">

                            #ORD-{{ $order->id }}

                        </h2>

                        <p class="text-gray-500">

                            {{ $order->product_name }}

                        </p>
                        

                    </div>


                    <div>

                        @if($order->status == 'Pending')

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm">

                                Pending

                            </span>

                        @elseif($order->status == 'Approved')

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                                Approved

                            </span>

                        @elseif($order->status == 'Rejected')

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm">

                                Rejected

                            </span>

                        @else

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm">

                                {{ $order->status }}

                            </span>

                        @endif

                    </div>

                </div>

                

                <!-- PROGRESS -->
                <div class="mt-6">

                    <div class="flex justify-between mb-2">

                        <span class="text-gray-500">
                            Progress
                        </span>

                        <span class="font-bold">
                            {{ $order->progress ?? 0 }}%
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div
                            class="bg-[#c49b2e] h-3 rounded-full"
                            style="width: {{ $order->progress ?? 0 }}%">
                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="flex justify-between items-center mt-6">

                <p class="text-sm text-gray-400">
                    Created:
                    {{ $order->created_at->format('d M Y') }}
                </p>

                <div class="flex items-center gap-3">

                    <a
                        href="/client/tracking/{{ $order->id }}"
                        class="text-[#c49b2e] font-semibold"
                    >
                        View Detail →
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>