<div class="w-72 bg-[#0A0A0A] min-h-screen relative">

    <!-- LOGO -->
    <div class="px-8 pt-10">

        <h1 class="text-5xl font-bold text-white">
            AYARI
        </h1>

        <p class="text-gray-400 text-sm">
            Kreasi Persada
        </p>

    </div>

    <!-- MENU -->
    <div class="mt-20 px-8 space-y-8">

        <a href="/qc"
        class="block font-medium
        {{ request()->is('qc') ? 'text-[#b8873a]' : 'text-white' }}">
            Dashboard
        </a>

        <a href="/qc/orders"
        class="block font-medium
        {{ request()->is('qc/orders*') ? 'text-[#b8873a]' : 'text-white' }}">
            Queue
        </a>

        <a href="/qc/messages"
        class="block font-medium
        {{ request()->is('qc/messages*') ? 'text-[#b8873a]' : 'text-white' }}">
            Messages
        </a>


    </div>

    <!-- SETTINGS -->
    <div class="absolute bottom-24 left-6 right-6">

        <button
            class="w-full bg-[#b8873a]
                   text-white py-3 rounded-xl
                   font-semibold">

            ⚙ SETTINGS

        </button>

    </div>

    <!-- LOGOUT -->
    <div class="absolute bottom-6 left-6 right-6">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full border border-white
                       text-white py-3 rounded-xl
                       hover:bg-white hover:text-black
                       transition">

                Logout

            </button>

        </form>

    </div>

</div>