<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-[#f3f3f3]">

<div class="flex">

<!-- SIDEBAR -->
@include('client.layouts.sidebar')

    <!-- CONTENT -->
    <div class="flex-1 p-12">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-10">

            <h1 class="text-3xl font-bold text-[#3b3b3b]">
                FILL YOUR FORM ORDER
            </h1>

            <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center text-5xl">
                👤
            </div>

        </div>

        <!-- FORM CARD -->
        <div class="bg-white rounded-3xl shadow-xl p-10">

            <form action="/client/order/store"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- ROW 1 -->
                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <label class="font-medium text-gray-700">
                            Name
                        </label>

                        <input type="text"
                               name="customer_name"
                               class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">
                    </div>

                    <div>
                        <label class="font-medium text-gray-700">
                            Address
                        </label>

                        <input type="text"
                               name="address"
                               class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">
                    </div>

                </div>

                <!-- ROW 2 -->
                <div class="grid grid-cols-2 gap-6 mt-6">

                    <div>
                        <label class="font-medium text-gray-700">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">
                    </div>

                    <div>
                        <label class="font-medium text-gray-700">
                            WhatsApp Number
                        </label>

                        <input type="text"
                               name="phone"
                               class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">
                    </div>

                </div>

                <!-- SERVICE -->
                <div class="mt-8">

                    <label class="font-medium text-gray-700">
                        Service Type
                    </label>

                    <select name="service_type"
                            class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">

                        <option>Custom Uniform</option>
                        <option>Merchandising</option>
                        <option>Event & Activation</option>
                        <option>Printing & Production</option>

                    </select>

                </div>

                <!-- PRODUCT -->
                <div class="mt-6">

                    <label class="font-medium text-gray-700">
                        Product Name
                    </label>

                    <input type="text"
                           name="product_name"
                           placeholder="Example : Polo Shirt"
                           class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">

                </div>

                <!-- QUANTITY -->
                <div class="mt-6">

                    <label class="font-medium text-gray-700">
                        Quantity
                    </label>

                    <input
    type="number"
    name="quantity"
    min="1"
    placeholder="Example : 100 pcs"
    class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">

                </div>

                <!-- DEADLINE -->
                <div class="mt-6">

                    <label class="font-medium text-gray-700">
                        Deadline Needed
                    </label>

                    <input
                        type="date"
                        name="deadline"
                        class="w-full mt-2 border border-gray-300 rounded-xl p-3 focus:border-[#c49b2e] outline-none">

                </div>

                <!-- UPLOAD FILE -->
                <div class="grid grid-cols-2 gap-6 mt-8">

    <!-- UPLOAD -->
    <div>

        <label class="font-medium text-gray-700 block mb-4">
            Upload Design Assets
        </label>

        <label
            class="block
                   bg-[#fcfaf7]
                   border border-[#d9c29a]
                   focus-border-[#c49b2e]
                   focus-ring-[#c49b2e]
                   rounded-3xl
                   h-[260px]
                   cursor-pointer
                   hover:shadow-lg
                   transition-all duration-300">

            <div class="h-full flex flex-col justify-center items-center">

                <div class="text-[#b8873a] text-3xl mb-4">
                    ☁
                </div>

                <p class="text-gray-600 text-sm font-medium">
                    Drag and drop your files
                </p>

                <p class="text-gray-400 text-xs mt-2">
                    Support: AI, PSD, PDF, SVG
                </p>

                <div
                    class="mt-5 px-6 py-2
                           border border-[#b8873a]
                           rounded-lg
                           text-[#b8873a]
                           text-sm">
                    Browse Files
                </div>

                <p id="file-name"
                class="mt-4 text-sm text-[#b8873a] font-medium">
                    No file selected
                </p>

            </div>

            <input
            type="file"
            id="design_file"
            name="design_file"
            accept=".jpg,.jpeg,.png,.pdf,.ai,.psd,.svg"
            class="hidden">

        </label>

    </div>

    <!-- NOTES -->
    <div>

        <label class="font-medium text-gray-700 block mb-4">
            Project Notes
        </label>

        <textarea
            name="notes"
            placeholder="Tell us about your project..."
            class="w-full
                   h-[260px]
                   border border-[#d9c29a]
                   rounded-3xl
                   p-5
                   resize-none
                   outline-none
                   focus:border-[#c49b2e]"></textarea>

    </div>

</div>

                <!-- BUTTON -->
                <div class="mt-10 flex justify-end">

                    <button
                        type="submit"
                        class="bg-[#c49b2e] hover:bg-[#aa8527] text-white px-10 py-4 rounded-xl shadow-lg transition">

                        Submit Order

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('design_file').addEventListener('change', function() {

    let fileName = this.files[0]?.name;

    document.getElementById('file-name').textContent =
        fileName ?? 'No file selected';

});

</script>

</body>
</html>