<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Proyek Penggalangan') }}
            </h2>
            <a href="{{ route('admin.proyek_penggalangan.create') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-8">
                @forelse ($proyekPenggalangan as $proyek)
                    <div class="item-card flex flex-col md:flex-row md:items-center md:justify-between gap-5 pb-5">
                        {{-- Gambar dan Nama --}}
                        <div class="flex items-start gap-4 w-full md:w-[22%]">
                            <div class="w-[120px] h-[90px] rounded-2xl overflow-hidden">
                                <img src="{{ Storage::url($proyek->foto) }}" alt="Fundraiser Image"
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <div class="h-[90px] flex items-center">
                                <h3 class="text-indigo-950 dark:text-gray-200 text-lg font-bold max-w-[180px] break-words leading-tight">
                                    {{ $proyek->nama }}
                                </h3>
                            </div>
                        </div>
    
                        {{-- Detail Info --}}
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm md:text-base w-full md:w-[60%]">
                            <div>
                                <p class="text-slate-500 dark:text-gray-400">Kategori</p>
                                <h4 class="text-indigo-950 dark:text-gray-200 font-semibold">
                                    {{ $proyek->kategori->nama }}
                                </h4>
                            </div>
                            <div>
                                <p class="text-slate-500 dark:text-gray-400">Target Donasi</p>
                                <h4 class="text-indigo-950 dark:text-gray-200 font-semibold">
                                    {{ 'Rp ' . number_format($proyek->target_donasi, 0, ',', '.') }}
                                </h4>
                            </div>
                            <div>
                                <p class="text-slate-500 dark:text-gray-400">Donatur</p>
                                <h4 class="text-indigo-950 dark:text-gray-200 font-semibold">
                                    {{ $proyek->donatur->count() }}
                                </h4>
                            </div>
                            <div>
                                <p class="text-slate-500 dark:text-gray-400">Pemohon</p>
                                <h4 class="text-indigo-950 dark:text-gray-200 font-semibold">
                                    {{ optional($proyek->pemohonPenggalangan->user)->nama ?? 'Nama Tidak Tersedia' }}
                                </h4>
                            </div>
                        </div>
    
                        {{-- Tombol Aksi --}}
                        <div class="w-full md:w-auto mt-4 md:mt-0 flex justify-end md:justify-center">
                            <a href="{{ route('admin.proyek_penggalangan.show', $proyek) }}"
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
                            Belum ada proyek penggalangan.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-app-layout>
