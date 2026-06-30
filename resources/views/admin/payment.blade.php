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

    <!-- HEADER -->
    <div class="bg-black rounded-3xl p-8 mb-8 text-white">

        <div class="flex justify-between">

            <div>

                <h1 class="text-5xl font-bold">
                    Payment Management 💳
                </h1>

                <p class="text-gray-400 mt-3">
                    Manage customer payment and invoice details.
                </p>

            </div>

            <div class="text-right">

                <p class="text-gray-400">
                    Invoice
                </p>

                <h2 class="text-4xl font-bold text-[#b8873a]">
                    INV-{{ $order->id }}
                </h2>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="bg-white rounded-2xl shadow p-8">

        <form
            action="{{ route('admin.orders.payment.update', $order->id) }}"
            method="POST"
        >

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 font-semibold">
                        Customer Name
                    </label>

                    <input
                        type="text"
                        value="{{ $order->customer_name }}"
                        disabled
                        class="w-full border rounded-xl px-4 py-3 bg-gray-100"
                    >

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Product
                    </label>

                    <input
                        type="text"
                        value="{{ $order->product_name }}"
                        disabled
                        class="w-full border rounded-xl px-4 py-3 bg-gray-100"
                    >

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Total Price
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ $order->price }}"
                        class="w-full border rounded-xl px-4 py-3"
                        required
                    >

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        DP Paid
                    </label>

                    <input
                        type="number"
                        name="dp"
                        value="{{ $order->dp }}"
                        class="w-full border rounded-xl px-4 py-3"
                        required
                    >

                </div>

                <div class="col-span-2">

                    <label class="block mb-2 font-semibold">
                        Payment Status
                    </label>

                    <select
                        name="payment_status"
                        class="w-full border rounded-xl px-4 py-3"
                    >

                        <option value="Unpaid"
                        {{ $order->payment_status == 'Unpaid' ? 'selected' : '' }}>
                            Unpaid
                        </option>

                        <option value="Partial"
                        {{ $order->payment_status == 'Partial' ? 'selected' : '' }}>
                            Partial
                        </option>

                        <option value="Paid"
                        {{ $order->payment_status == 'Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                    </select>

                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a
                    href="{{ route('admin.orders.show',$order->id) }}"
                    class="px-5 py-3 border rounded-xl"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 bg-[#b8873a] text-white rounded-xl"
                >
                    Save Payment
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>