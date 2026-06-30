<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QC Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-10">

    <h1 class="text-4xl font-bold mb-10">
        QC Dashboard
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-500 text-white">

                <tr>
                    <th class="p-4 text-left">Customer</th>
                    <th class="p-4 text-left">Product</th>
                    <th class="p-4 text-left">Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($orders as $order)

                <tr class="border-b">

                    <td class="p-4">
                        {{ $order->customer_name }}
                    </td>

                    <td class="p-4">
                        {{ $order->product_name }}
                    </td>

                    <td class="p-4">
                        {{ $order->status }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</body>
</html>