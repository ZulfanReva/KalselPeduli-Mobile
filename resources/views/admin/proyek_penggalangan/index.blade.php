<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Proyek Penggalangan') }}
            </h2>
            <a href="#"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="https://images.unsplash.com/photo-1552196563-55cd4e45efb3?q=80&w=3426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Fundraiser Image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nama Proyek Penggalangan</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Jumping Jack</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Target Donasi</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Rp 800000</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Donatur</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">193</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Pemohon Penggalangan</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Annima Poppo</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="#"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
