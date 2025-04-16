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
                        {{-- Gambar + Nama Proyek --}}
                        <div class="flex items-start gap-4 w-full md:w-[22%]">
                            <div class="w-[120px] h-[90px] rounded-2xl overflow-hidden">
                                <img src="{{ Storage::url($penarikanDana->proyekPenggalangan->foto) }}"
                                    alt="Fundraiser Image" class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <div class="h-[90px] flex items-center">
                                <h3
                                    class="text-indigo-950 dark:text-gray-200 text-lg font-bold max-w-[180px] break-words leading-tight">
                                    {{ $penarikanDana->proyekPenggalangan->nama }}
                                </h3>
                            </div>
                        </div>

                        {{-- Total Donasi --}}
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi Terkumpul</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ 'Rp ' . number_format($penarikanDana->jumlah_diminta, 0, ',', '.') }}
                            </h3>
                        </div>

                        {{-- Tanggal --}}
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Dibuat pada</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ \Carbon\Carbon::parse($penarikanDana->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div>

                        {{-- Nama Pemohon --}}
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Pemohon Penggalangan</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ optional($penarikanDana->pemohonPenggalangan->user)->nama ?? 'Nama Tidak Tersedia' }}
                            </h3>
                        </div>

                        {{-- Status --}}
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

                        {{-- Aksi --}}
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.penarikan_dana.show', $penarikanDana) }}"
                                class="font-bold py-2 px-5 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    <!-- Garis dengan efek gradasi memudar -->
                    @if (!$loop->last)
                        <div class="w-1/2 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent">
                        </div>
                    @endif
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
