<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Donatur') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <!-- Card item for donatur -->
                <div
                    class="item-card flex flex-row justify-between items-center bg-white dark:bg-gray-800 rounded-lg  p-5">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="https://images.unsplash.com/photo-1611174797136-5e167ea90d6c?q=80&w=3120&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nama Donatur
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Villio Jack</h3>
                        </div>
                    </div>

                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Didonasi pada</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">01 Apr 2025</h3>
                    </div>

                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Rp 80000</h3>
                    </div>

                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                        Aktif
                    </span>
                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                        Menunggu
                    </span>

                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Lihat Detail
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Repeat above for more donaturs -->

            </div>
        </div>
    </div>
</x-app-layout>
