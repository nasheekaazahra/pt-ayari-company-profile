<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>My Orders</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f3f3f3] flex">
<!-- SIDEBAR -->
@include('client.layouts.sidebar')

</div>
    <div class="flex-1 p-12">
    <div class="flex justify-between items-center mb-10">

        <h1 class="text-5xl font-bold text-[#2b2b2b] mb-2">
        My Orders
    </h1>

    <p class="text-gray-500">
        Monitor all your custom product orders.
    </p>

        <form action="/admin/orders"
              method="POST"
              class="flex gap-4">

            @csrf

            

            <a href="/client/create-order"
            class="bg-[#b8873a] text-white px-6 py-3 rounded-xl">
            Create Order
            </a>

        </form>

    </div>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden mt-10">

        <table class="w-full">

            <thead class="bg-[#171733] text-white">

                <tr>
                    <th class="p-4 text-left">Order ID</th>
                    <th class="p-4 text-left">Customer</th>
                    <th class="p-4 text-left">Product</th>
                    <th class="p-4 text-left">Created Date</th>
                    <th class="p-4 text-left">Status</th>
                </tr>

            </thead>

            <tbody>

            <div class="space-y-8">
                @foreach ($orders as $order)

                <tr class="border-b">

                    <td class="p-4 font-semibold text-[#b8873a]">
                        #ORD-{{ $order->id }}
                    </td>

                    <td class="p-4">
                        {{ $order->customer_name }}
                    </td>

                    <td class="p-4">
                        {{ $order->product_name }}
                    </td>

                    <td class="p-4 text-gray-500">
                        {{ $order->created_at->format('d M Y') }}
                    </td>

                    <td class="p-4">

                    <span class="px-4 py-2 rounded-full text-sm
                    @if($order->status == 'Pending')
                        bg-yellow-100 text-yellow-700
                    @elseif($order->status == 'Approved')
                        bg-green-100 text-green-700
                    @elseif($order->status == 'Rejected')
                        bg-red-100 text-red-700
                    @endif
                    ">

                        {{ $order->status }}

                    </span>

                </td>

                </tr>

                @endforeach
            </div>
            </tbody>

        </table>

    </div>
    </div>
</body>
</html>