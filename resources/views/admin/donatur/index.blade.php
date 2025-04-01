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
                    <div
                        class="item-card flex flex-row justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-6 space-x-5">
                        <div class="flex flex-row items-center gap-x-4 w-1/3">
                            <img src="{{ Storage::url($donatur->proyekPenggalangan->foto) }}" alt=""
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                    {{ $donatur->nama }}
                                </h3>
                            </div>
                        </div>

                        <div class="flex flex-col w-1/4 text-center md:text-left">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Berdonasi pada</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($donatur->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div>

                        <div class="flex flex-col w-1/4 text-center md:text-left">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-semibold whitespace-nowrap">
                                {{ 'Rp ' . number_format($donatur->jumlah_donasi, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="w-1/6 flex justify-center">
                            @if ($donatur->sudah_dibayar)
                                <span
                                    class="w-fit text-sm font-semibold py-2 px-4 rounded-full bg-green-500 text-white">
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="w-fit text-sm font-semibold py-2 px-4 rounded-full bg-orange-500 text-white">
                                    Menunggu
                                </span>
                            @endif
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-4 w-1/6 justify-center">
                            <a href="{{ route('admin.donatur.show', $donatur->id) }}" type="submit"
                                class="font-semibold py-3 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-600 transition duration-200">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
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
