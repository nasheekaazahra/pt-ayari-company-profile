<div class="w-[280px] min-h-screen bg-black text-white p-8 flex flex-col justify-between">

    <!-- TOP -->
    <div>

        <!-- LOGO -->
        <div class="mb-16">

            <h1 class="text-5xl font-bold tracking-wide">
                AYARI
            </h1>

            <p class="text-gray-400 mt-1">
                Kreasi Persada
            </p>

        </div>

        <!-- MENU -->
        <div class="space-y-8 text-base font-semibold">

            <a href="/client"
               class="flex items-center gap-4 hover:text-[#c49b2e] transition">

                Dashboard

            </a>

            <a href="/client/orders"
               class="flex items-center gap-4 hover:text-[#c49b2e] transition">

                My Orders

            </a>

            <a href="/client/status"
               class="flex items-center gap-4 hover:text-[#c49b2e] transition">

                Status Orders

            </a>

            <a href="/client/messages"
               class="flex items-center gap-4 hover:text-[#c49b2e] transition">

                Messages

            </a>

        </div>

    </div>

    <!-- BOTTOM -->
    <div>

        <!-- SETTINGS -->
        <a href="/client/settings"
           class="block w-full text-center bg-[#b8873a] hover:bg-[#9f732e]
                  py-3 rounded-xl font-medium text-base transition">

            ⚙ SETTINGS

        </a>

        <!-- LOGOUT -->
        <form method="POST"
              action="{{ route('logout') }}"
              class="mt-4">

            @csrf

            <button
                class="w-full border border-white py-3 rounded-xl
                       text-base hover:bg-white hover:text-black transition">

                Logout

            </button>

        </form>

    </div>

</div>