<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

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
    <div class="absolute inset-0 bg-black/45"></div>

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

        <a href="/admin"
           class="bg-yellow-300 hover:bg-yellow-400 px-5 py-2 rounded-lg text-sm shadow">
            Admin
        </a>

    </nav>

    <!-- LOGIN CARD -->
    <div class="relative z-10 flex justify-center items-center min-h-screen px-5">

        <div class="w-full max-w-md bg-white/20 backdrop-blur-md border border-white/20 rounded-3xl p-10 shadow-2xl">

            <h1 class="text-4xl font-bold text-white text-center mb-10">
                LOG IN 
            </h1>

            <!-- SESSION STATUS -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <!-- EMAIL -->
                <div class="mb-5">

                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           autocomplete="username"
                           placeholder="Your Email"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- PASSWORD -->
                <div class="mb-5">

                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="Password"
                           class="w-full rounded-lg bg-white/20 border border-white/20 text-white placeholder:text-gray-300 focus:border-yellow-400 focus:ring-yellow-400">

                </div>

                <!-- REMEMBER -->
                <div class="flex items-center mb-6">

                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-gray-300 text-yellow-500 shadow-sm focus:ring-yellow-400"
                           name="remember">

                    <label for="remember_me"
                           class="ml-2 text-sm text-white">
                        Remember me
                    </label>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="w-full bg-[#c49b2e] hover:bg-[#aa8527] text-white py-3 rounded-xl text-lg font-semibold transition shadow-lg">

                    LOG IN

                </button>

            </form>

            <!-- REGISTER -->
            <p class="text-center text-gray-200 mt-6 text-sm">

                Don’t have an account?

                <a href="/register"
                   class="text-yellow-300 hover:underline">
                    Register
                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>