@php

use App\Models\Notification;

$newOrders = Notification::where(
    'title',
    'New Order'
)->where('is_read', false)->count();

$newMessages = Notification::where(
    'title',
    'Client Message'
)->where('is_read', false)->count();

$newQcMessages = Notification::whereIn(
    'title',
    [
        'QC Message',
        'QC Review',
        'QC Revision',
        'Client Revision'
    ]
)->where('is_read', false)->count();

@endphp

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

        <a href="/admin"
        class="block font-medium
        {{ request()->is('admin') ? 'text-[#b8873a]' : 'text-white' }}">
            Dashboard
        </a>

        <a href="/admin/orders"
        class="flex justify-between items-center font-medium
        {{ request()->is('admin/orders*') ? 'text-[#b8873a]' : 'text-white' }}">

            <span>Orders</span>

            @if($newOrders > 0)
                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ $newOrders }}
                </span>
            @endif

        </a>

        <a href="/admin/messages"
        class="flex justify-between items-center font-medium
        {{ request()->is('admin/messages*') ? 'text-[#b8873a]' : 'text-white' }}">

            <span>Messages</span>

            @if($newMessages > 0)
                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ $newMessages }}
                </span>
            @endif

        </a>

        <a href="/admin/qc-messages"
        class="flex justify-between items-center font-medium
        {{ request()->is('admin/qc-messages*')
        ? 'text-[#b8873a]'
        : 'text-white' }}">

            <span>QC Messages</span>

            @if($newQcMessages > 0)
                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ $newQcMessages }}
                </span>
            @endif

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