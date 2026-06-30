<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    @vite([
        'resources/css/app.css',
        'resources/css/landing.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-[#f7f3f2]">

<!-- BACKGROUND -->
<div class="min-h-screen bg-cover bg-center relative"
     style="background-image: url('{{ asset('images/hero.jpg') }}')">

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- NAVBAR -->
    <nav class="navbar sticky top-0 z-50 flex justify-between items-center px-10 py-5 shadow-md relative">

        <h1 class="text-3xl font-extrabold text-[#b08b2d]">
            PT. AYARI KREASI PERSADA
        </h1>

        <ul class="flex gap-12 text-xs font-medium text-black">

            <li>
                <a href="/" class="hover:text-yellow-400">
                    Home
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-yellow-400">
                    Services
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-yellow-400">
                    Products
                </a>
            </li>

        </ul>

        <a href="/login"
           class="bg-yellow-300 hover:bg-yellow-400 px-5 py-2 rounded-lg text-sm shadow">
            Client Login
        </a>

    </nav>

    <!-- REGISTER CARD -->
    <div class="relative z-10 flex justify-center items-center min-h-screen px-5 py-10">

        <div class="w-full max-w-md bg-white/20 backdrop-blur-md border border-white/20 rounded-3xl p-10 shadow-2xl">

            <h1 class="text-4xl font-bold text-white text-center mb-10">
                CREATE ACCOUNT
            </h1>

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <!-- NAME -->
                <div class="mb-5">

                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name"
                           placeholder="Full Name"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- EMAIL -->
                <div class="mb-5">

                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="username"
                           placeholder="Email Address"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- PASSWORD -->
                <div class="mb-5">

                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="Password"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-6">

                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="Confirm Password"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="w-full bg-[#c49b2e] hover:bg-[#aa8527] text-white py-3 rounded-xl text-lg font-semibold transition shadow-lg">

                    REGISTER

                </button>

            </form>

            <!-- LOGIN -->
            <p class="text-center text-gray-200 mt-6 text-sm">

                Already have an account?

                <a href="/login"
                   class="text-yellow-300 hover:underline">
                    Login
                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>