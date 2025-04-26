<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Laporan Penggalangan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <h3 class="text-indigo-950 dark:text-gray-200 text-3xl font-bold mb-5">Laporan Penarikan Dana</h3>
                <div class="flex flex-row gap-x-16">
                    <svg width="100" height="100" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4"
                            d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z"
                            fill="#292D32" class="dark:fill-gray-400" />
                        <path
                            d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z"
                            fill="#292D32" class="dark:fill-gray-400" />
                    </svg>
                    <div class="flex flex-col gap-y-5">
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi Diminta</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Rp
                                {{ number_format($penarikanDana->jumlah_diminta, 0, ',', '.') }}</h3>
                        </div>
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Total Donasi Diterima</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Rp
                                {{ number_format($penarikanDana->proyekPenggalangan->target_donasi, 0, ',', '.') }}</h3>
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
                    </div>

                    <div>
                        <img src="{{ Storage::url($penarikanDana->proyekPenggalangan->foto) }}" alt="Fundraiser Image"
                            class="rounded-2xl object-cover w-[200px] h-[150px] content-center">
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ $penarikanDana->proyekPenggalangan->nama }}</h3>
                        {{-- <p class="text-slate-500 dark:text-gray-400 text-sm">
                            {{ $penarikanDana->proyekPenggalangan->deskripsi }}</p>
                        <div>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ \Carbon\Carbon::parse($penarikanDana->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div> --}}
                    </div>
                </div>

                @if ($penarikanDana->sudah_disetujui)
                    <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                    </div>
                    <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold mb-1">Dikirim ke:</h3>
                    <div class="flex flex-row gap-x-10">
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nama Bank</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ $penarikanDana->nama_bank }}
                            </h3>
                        </div>
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nama Akun Rekening</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ $penarikanDana->nama_rekening }}
                            </h3>
                        </div>
                        <div>
                            <p class="text-slate-500 dark:text-gray-400 text-sm">Nomor Rekening</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ $penarikanDana->nomor_rekening }}
                            </h3>
                        </div>
                    </div>
                    <div class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                    </div>

                    <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold mb-5">Uang sudah ditransfer oleh
                        Admin</h3>
                    <img src="{{ Storage::url($penarikanDana->bukti_penarikan) }}" alt=""
                        class="rounded-2xl object-cover w-[300px] h-[200px] mb-3">

                    @if (!$penarikanDana->sudah_diterima)
                        <div
                            class="w-5/6 mx-auto h-px bg-gradient-to-r from-transparent via-gray-600 to-transparent my-5">
                        </div>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Apakah kamu sudah menerima
                            uang?</h3>
                        <form
                            action="{{ route('admin.laporan_penggalangan.store', $penarikanDana->proyek_penggalangan_id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-input-label for="nama" :value="__('Nama')"
                                    class="text-gray-700 dark:text-gray-300" />
                                <x-text-input id="nama"
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                                    type="text" name="nama" :value="old('nama')" required autofocus
                                    autocomplete="nama" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2 text-red-600 dark:text-red-400" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="catatan" :value="__('Catatan')"
                                    class="text-gray-700 dark:text-gray-300" />
                                <textarea name="catatan" id="catatan" cols="30" rows="5"
                                    class="border-gray-300 dark:border-gray-600 rounded-xl w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"></textarea>
                                <x-input-error :messages="$errors->get('catatan')" class="mt-2 text-red-600 dark:text-red-400" />
                            </div>
                            <div class="mt-4 w-fit">
                                <x-input-label for="foto" :value="__('Foto')"
                                    class="text-gray-700 dark:text-gray-300" />
                                <x-text-input id="foto"
                                    class="mb-7 block mt-1 w-full border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                                    type="file" name="foto" required autofocus autocomplete="foto" />
                                <x-input-error :messages="$errors->get('foto')" class="mt-2 text-red-600 dark:text-red-400" />
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="submit"
                                    class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full hover:bg-indigo-600 transition duration-200">
                                    Perbaharui Laporan
                                </button>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
