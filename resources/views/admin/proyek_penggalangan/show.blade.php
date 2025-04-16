<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Proyek Penggalangan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                <div class="flex flex-col justify-between w-full">
                    @if ($proyekPenggalangan->status_aktif)
                        <span class="text-white text-center font-bold bg-green-500 rounded-2xl w-full p-5">
                            Status: Proyek penggalangan sudah aktif dan dapat menerima donasi
                        </span>
                    @else
                        <span class="text-white text-center font-bold bg-red-500 rounded-2xl w-full p-5">
                            Status: Proyek penggalangan belum disetujui oleh Admin
                        </span>
                        @role('owner')
                            <div class="flex flex-row gap-3 mt-4 items-center justify-center">
                                <form role="owner"
                                    action="{{ route('admin.proyek_penggalangan.status_aktif', $proyekPenggalangan) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full w-fit transition-transform duration-200 ease-out hover:scale-105">
                                        Terima
                                    </button>
                                </form>
                                <form role="owner" action="#" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="font-bold py-4 px-6 bg-red-600 text-white rounded-full w-fit transition-transform duration-200 ease-out hover:scale-105">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        @endrole
                    @endif
                </div>

                <!-- Garis dengan efek gradasi memudar -->
                <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                </div>

                <div class="item-card flex flex-row justify-between items-center gap-x-8">
                    <div class="flex flex-row items-start gap-x-3 w-full md:w-1/2">
                        <img src="{{ Storage::url($proyekPenggalangan->foto) }}" alt="Fundraiser Image"
                            class="rounded-2xl object-cover w-[200px] h-[150px] flex-shrink-0">
                        <div class="flex flex-col w-[200px] h-[150px] justify-center">
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold break-words">
                                {{ $proyekPenggalangan->nama }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-1/6 text-center md:text-left">
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Donatur</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ $proyekPenggalangan->donatur->count() }}
                        </h3>
                    </div>
                    <div class="flex flex-row items-center gap-x-3 w-full md:w-1/3 justify-center md:justify-end">
                        <a href="{{ route('admin.proyek_penggalangan.edit', $proyekPenggalangan) }}"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                            Edit
                        </a>
                        <form action="{{ route('admin.proyek_penggalangan.destroy', $proyekPenggalangan) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-bold py-4 px-6 bg-red-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Garis dengan efek gradasi memudar -->
                <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                </div>

                <div class="flex flex-row justify-between items-center">
                    <div>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ 'Rp ' . number_format($TotalDonasi, 0, ',', '.') }}
                        </h3>
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi Terkumpul</p>
                    </div>
                    <div class="w-[400px] rounded-full h-2.5 bg-slate-300 dark:bg-gray-700">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $persentase }}%"></div>
                    </div>
                    <div>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ 'Rp ' . number_format($proyekPenggalangan->target_donasi, 0, ',', '.') }}
                        </h3>
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Target Donasi</p>
                    </div>
                </div>

                @if ($target_donasi && !$proyekPenggalangan->penarikanDana()->exists())
                    <!-- Garis dengan efek gradasi memudar -->
                    <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                    </div>

                    <h3 class="text-indigo-950 dark:text-gray-200 text-2xl font-bold">Penarikan Dana</h3>

                    <form method="POST" action="{{ route('admin.penarikan_dana.store', $proyekPenggalangan->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="nama_bank" :value="__('Nama Bank')" />
                            <x-text-input id="nama_bank" class="block mt-1 w-full" type="text" name="nama_bank"
                                :value="old('nama_bank')" required autofocus autocomplete="nama_bank" />
                            <x-input-error :messages="$errors->get('nama_bank')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nama_rekening" :value="__('Nama Rekening Bank')" />
                            <x-text-input id="nama_rekening" class="block mt-1 w-full" type="text"
                                name="nama_rekening" :value="old('nama_rekening')" required autofocus
                                autocomplete="nama_rekening" />
                            <x-input-error :messages="$errors->get('nama_rekening')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nomor_rekening" :value="__('Nomor Rekening Bank')" />
                            <x-text-input id="nomor_rekening" class="block mt-1 w-full" type="text"
                                name="nomor_rekening" :value="old('nomor_rekening')" required autofocus
                                autocomplete="nomor_rekening" />
                            <x-input-error :messages="$errors->get('nomor_rekening')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Penarikan Dana
                            </button>
                        </div>
                    </form>
                @else
                    <!-- Ambil data penarikan dana jika ada -->
                    @php
                        $penarikanDana = $proyekPenggalangan->penarikanDana()->first();
                    @endphp

                    <div class="text-center">
                        @if ($penarikanDana && ($penarikanDana->sudah_disetujui || $penarikanDana->sudah_diterima))
                            <p class="text-gray-500 font-bold">
                                Pengajuan penarikan dana sudah dilakukan, silahkan buka halaman laporan penggalangan
                                untuk melihat progres lebih lanjut. Terima kasih.
                            </p>
                        @else
                            <p class="text-gray-500 font-bold">
                                Pengajuan penarikan dana hanya bisa dilakukan ketika target donasi sudah terpenuhi.
                            </p>
                        @endif
                    </div>
                @endif

                <!-- Garis dengan efek gradasi memudar -->
                <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                </div>

                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-col">
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Donatur</h3>
                    </div>
                </div>

                @forelse ($proyekPenggalangan->donatur as $donatur)
                    <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                    {{ 'Rp ' . number_format($donatur->jumlah_donasi, 0, ',', '.') }}</h3>
                                <p class="text-slate-500 dark:text-gray-400 text-sm">{{ $donatur->nama }}</p>
                            </div>
                        </div>

                        <p class="text-slate-500 dark:text-gray-400 text-sm">{{ $donatur->catatan }}</p>
                    </div>

                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 dark:text-gray-500 font-semibold">Belum ada yang memberikan
                            donasi.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-app-layout>
