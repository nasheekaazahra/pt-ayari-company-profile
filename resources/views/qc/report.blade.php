<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>
QC Report
</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="p-10 bg-white">

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center border-b pb-5">

        <div>

            <h1 class="text-4xl font-bold">
                QC REPORT
            </h1>

            <p class="text-gray-500">
                PT. AYARI KREASI PERSADA
            </p>

        </div>

        <div class="text-right">

            <p>
                ORD-{{ $order->id }}
            </p>

            <p>
                {{ now()->format('d F Y') }}
            </p>

        </div>

    </div>

    <div class="mt-10">

        <h2 class="font-bold text-xl mb-5">
            Customer Information
        </h2>

        <table class="w-full border">

            <tr>
                <td class="border p-3 font-semibold">
                    Customer
                </td>

                <td class="border p-3">
                    {{ $order->customer_name }}
                </td>
            </tr>

            <tr>
                <td class="border p-3 font-semibold">
                    Email
                </td>

                <td class="border p-3">
                    {{ $order->email }}
                </td>
            </tr>

            <tr>
                <td class="border p-3 font-semibold">
                    Product
                </td>

                <td class="border p-3">
                    {{ $order->product_name }}
                </td>
            </tr>

            <tr>
                <td class="border p-3 font-semibold">
                    Service
                </td>

                <td class="border p-3">
                    {{ $order->service_type }}
                </td>
            </tr>

            <tr>
                <td class="border p-3 font-semibold">
                    Status
                </td>

                <td class="border p-3">
                    {{ $order->status }}
                </td>
            </tr>

        </table>

    </div>

    <div class="mt-10">

        <h2 class="font-bold text-xl mb-5">
            QC Checklist
        </h2>

        <table class="w-full border">

            <tr>
                <th class="border p-3">
                    Inspection Item
                </th>

                <th class="border p-3">
                    Result
                </th>
            </tr>

            <tr>
                <td class="border p-3">
                    Logo Alignment
                </td>

                <td class="border p-3">
                    PASSED
                </td>
            </tr>

            <tr>
                <td class="border p-3">
                    Color Accuracy
                </td>

                <td class="border p-3">
                    PASSED
                </td>
            </tr>

            <tr>
                <td class="border p-3">
                    Printing Quality
                </td>

                <td class="border p-3">
                    PASSED
                </td>
            </tr>

            <tr>
                <td class="border p-3">
                    Packaging Quality
                </td>

                <td class="border p-3">
                    PASSED
                </td>
            </tr>

        </table>

    </div>

    <div class="mt-10 flex gap-4 print:hidden">


            <h2 class="font-bold text-xl mb-4">
                QC Notes
            </h2>

            <div class="border p-4 rounded">

                {{ $order->qc_notes ?? 'No notes available' }}

            </div>

        </div>
        <button
        onclick="window.print()"
        class="bg-blue-600 text-white px-6 py-3 rounded-xl">

            Print / Save PDF

        </button>

        <a
        href="/qc/orders"
        class="border px-6 py-3 rounded-xl">

            Back

        </a>

    </div>

</div>

</body>
</html>