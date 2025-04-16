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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8 flex flex-col gap-y-6">
                @forelse ($donatur as $donatur)
                    <!-- Card item for donatur -->
                    <div class="item-card flex flex-col md:flex-row justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-6 gap-y-4 md:gap-y-0 md:space-x-5">
                        <!-- Foto + Nama Proyek -->
                        <div class="flex flex-row items-center gap-x-4 w-full md:w-1/3">
                            <div class="w-[120px] h-[90px] rounded-2xl overflow-hidden">
                                <img src="{{ Storage::url($donatur->proyekPenggalangan->foto) }}" alt=""
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <div>
                                <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold break-words max-w-[180px]">
                                    {{ $donatur->proyekPenggalangan->nama }}
                                </h3>
                            </div>
                        </div>
    
                        <!-- Tanggal Donasi -->
                        <div class="flex flex-col w-full md:w-1/5 text-center md:text-left">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Berdonasi pada</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($donatur->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div>
    
                        <!-- Nama Donatur -->
                        <div class="flex flex-col w-full md:w-1/5 text-center md:text-left">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nama Donatur</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                {{ $donatur->nama }}
                            </h3>
                        </div>
    
                        <!-- Jumlah Donasi -->
                        <div class="flex flex-col w-full md:w-1/5 text-center md:text-left">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                {{ 'Rp ' . number_format($donatur->jumlah_donasi, 0, ',', '.') }}
                            </h3>
                        </div>
    
                        <!-- Status -->
                        <div class="w-full md:w-1/6 flex justify-center">
                            @if ($donatur->sudah_dibayar)
                                <span class="w-fit text-sm font-semibold py-2 px-4 rounded-full bg-green-500 text-white">Aktif</span>
                            @else
                                <span class="w-fit text-sm font-semibold py-2 px-4 rounded-full bg-orange-500 text-white">Menunggu</span>
                            @endif
                        </div>
    
                        <!-- Aksi -->
                        <div class="hidden md:flex flex-row items-center gap-x-4 w-1/6 justify-center">
                            <a href="{{ route('admin.donatur.show', $donatur->id) }}"
                                class="font-bold py-2 px-5 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
    
                    <!-- Garis dengan efek gradasi memudar -->
                    @if (!$loop->last)
                        <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent"></div>
                    @endif
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">
                            Belum ada proyek donatur terbaru untuk saat ini.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
