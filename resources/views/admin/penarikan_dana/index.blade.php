<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Penarikan Dana') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($penarikanDana as $penarikanDana)
                    <div
                        class="item-card flex flex-row justify-between items-center bg-white dark:bg-gray-800 rounded-lg p-6 space-x-5">
                        <img src="{{ Storage::url($penarikanDana->proyekPenggalangan->foto) }}" alt="Fundraiser Image"
                            class="rounded-2xl object-cover w-[120px] h-[90px]">

                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi Terkumpul</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ 'Rp ' . number_format($penarikanDana->jumlah_diminta, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Dibuat pada</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ \Carbon\Carbon::parse($penarikanDana->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Pemohon Penggalangan</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ optional($penarikanDana->pemohonPenggalangan->user)->nama ?? 'Nama Tidak Tersedia' }}
                            </h3>
                        </div>

                        @if ($penarikanDana->sudah_diterima)
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                BERHASIL
                            </span>
                        @elseif($penarikanDana->sudah_disetujui)
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                DIPROSES
                            </span>
                        @else
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-gray-500 text-white">
                                MENUNGGU
                            </span>
                        @endif

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.penarikan_dana.show', $penarikanDana) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-600 transition duration-200">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">
                            Belum ada yang mengajukan penarikan dana untuk saat ini.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
