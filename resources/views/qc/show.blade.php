<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<title>QC Inspection</title>

</head>

<body class="bg-[#f5f5f5] flex">

@include('qc.layouts.sidebar')

<div class="flex-1 p-8">

    <!-- HEADER -->

    <div class="mb-8">

        <h1 class="text-4xl font-bold">
            QC Inspection 🔍
        </h1>

        <p class="text-gray-500 mt-2">
            Verify product quality before shipping.
        </p>

    </div>

    <div class="grid grid-cols-12 gap-6">

        <!-- LEFT -->

        <div class="col-span-8">

            <!-- PRODUCT PREVIEW -->

            <div class="bg-white rounded-3xl shadow p-6 mb-6">

                <h2 class="font-bold text-xl mb-5">
                    Product Preview
                </h2>

                @if($order->design_file)

                    <img
                    src="{{ asset('storage/'.$order->design_file) }}"
                    class="w-full rounded-2xl max-h-[500px] object-contain">

                @else

                    <div class="h-80 bg-gray-100 rounded-2xl flex items-center justify-center">

                        <p class="text-gray-400">
                            No Design Uploaded
                        </p>

                    </div>

                @endif

            </div>

            <!-- CUSTOMER -->

            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="font-bold text-xl mb-6">

                    Customer Information

                </h2>

            <!-- TIMELINE -->
             <div class="bg-white rounded-3xl shadow p-6 mt-6">

    <h2 class="font-bold text-xl mb-5">
        Verification Timeline
    </h2>

    <div class="flex justify-between items-center">

        <div class="text-center">
            <div class="w-10 h-10 bg-green-600 rounded-full mx-auto"></div>
            <p class="text-sm mt-2">Production</p>
        </div>

        <div class="text-center">
            <div class="w-10 h-10 bg-yellow-500 rounded-full mx-auto"></div>
            <p class="text-sm mt-2">QC</p>
        </div>

        <div class="text-center">
            <div class="w-10 h-10 bg-gray-300 rounded-full mx-auto"></div>
            <p class="text-sm mt-2">Revision</p>
        </div>

        <div class="text-center">
            <div class="w-10 h-10 bg-gray-300 rounded-full mx-auto"></div>
            <p class="text-sm mt-2">Approval</p>
        </div>

        <div class="text-center">
            <div class="w-10 h-10 bg-gray-300 rounded-full mx-auto"></div>
            <p class="text-sm mt-2">Shipping</p>
        </div>

    </div>

</div>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <p class="text-gray-500 text-sm">Name</p>
                        <p class="font-semibold">
                            {{ $order->customer_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Email</p>
                        <p class="font-semibold">
                            {{ $order->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Phone</p>
                        <p class="font-semibold">
                            {{ $order->phone }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Address</p>
                        <p class="font-semibold">
                            {{ $order->address }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="col-span-4">

            <!-- PRODUCT DETAIL -->

            <div class="bg-white rounded-3xl shadow p-6 mb-6">

                <h2 class="font-bold text-xl mb-5">

                    Product Detail

                </h2>

                <div class="space-y-4">

                    <div>
                        <p class="text-gray-500 text-sm">
                            Product
                        </p>

                        <p class="font-semibold">
                            {{ $order->product_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Service
                        </p>

                        <p class="font-semibold">
                            {{ $order->service_type }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Quantity
                        </p>

                        <p class="font-semibold">
                            {{ $order->quantity }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Deadline
                        </p>

                        <p class="font-semibold text-red-500">
                            {{ $order->deadline }}
                        </p>
                    </div>

                </div>

            </div>

            <!-- CARD REVISION -->
             @if($order->client_revision_file)

            <div class="bg-blue-50 border border-blue-200 rounded-3xl p-6 mb-6">

                <h2 class="font-bold text-xl text-blue-600 mb-4">

                    Client Revision Submission

                </h2>

                <p class="mb-4">

                    {{ $order->client_revision_notes }}

                </p>

                <a
                    href="{{ asset('storage/'.$order->client_revision_file) }}"
                    target="_blank"
                    class="bg-blue-600 text-white px-4 py-2 rounded-xl">

                    View Revision File

                </a>

            </div>

            @endif

            <!-- ACTION -->

            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="font-bold text-xl mb-5">

                    Verification Actions

                </h2>

                <div class="space-y-3">

                    <form
                    action="/qc/orders/{{ $order->id }}/approve"
                    method="POST">

                    @csrf

                    <textarea
                    name="qc_notes"
                    rows="4"
                    placeholder="Write inspection findings..."
                    class="w-full border rounded-xl p-4 mb-4"></textarea>

                    <button
                    class="w-full bg-green-600 text-white py-3 rounded-xl">

                    ✅ Approve Product

                    </button>

                    </form>

                    <form
                    action="/qc/orders/{{ $order->id }}/reject"
                    method="POST"
                    enctype="multipart/form-data">

                        @csrf

                        <div class="space-y-3 mb-5">

                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="logo_alignment" value="1">
                                Logo Alignment
                            </label>

                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="color_accuracy" value="1">
                                Color Accuracy
                            </label>

                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="printing_quality" value="1">
                                Printing Quality
                            </label>

                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="packaging_quality" value="1">
                                Packaging Quality
                            </label>

                        </div>

                        <input
                        type="file"
                        name="qc_photo"
                        class="border rounded-xl p-2 w-full mb-4">

                        <textarea
                        name="qc_notes"
                        rows="5"
                        placeholder="Write revision notes..."
                        class="w-full border rounded-xl p-4 mb-4"></textarea>

                        <button
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-xl">

                            🔄 Request Revision

                        </button>

                    </form>
                    <a
                    href="/qc/orders/{{ $order->id }}/report"
                    class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl">

                    📄 Export QC Report

                    </a>

                    <a
                    href="/qc/orders"
                    class="block text-center border py-3 rounded-xl">

                        Back

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>