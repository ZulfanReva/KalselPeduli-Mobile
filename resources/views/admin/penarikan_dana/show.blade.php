<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Penarikan Dana') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <h3 class="text-indigo-950 dark:text-gray-200 text-3xl font-bold mb-5">Permintaan Penarikan Dana</h3>
                <div class="flex flex-row gap-x-16">
                    <svg width="100" height="100" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4"
                            d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z"
                            fill="#292D32" />
                        <path
                            d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z"
                            fill="#292D32" />
                        <path
                            d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z"
                            fill="#292D32" />
                        <path
                            d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z"
                            fill="#292D32" />
                        <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#292D32" />
                    </svg>
                    <div class="flex flex-col gap-y-6">
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
                        <div>
                            <p class="text-slate-500 dark:text-slate-400 text-sm">Pemohon Penggalangan</p>
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ optional($penarikanDana->pemohonPenggalangan->user)->nama ?? 'Nama Tidak Tersedia' }}
                            </h3>
                        </div>
                        <div>
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
                    </div>
                    <div>
                        <img src="{{ Storage::url($penarikanDana->proyekPenggalangan->foto) }}" alt="Fundraiser Image"
                            class="rounded-2xl object-cover w-[200px] h-[150px]">
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ $penarikanDana->proyekPenggalangan->nama }}</h3>
                        <p class="text-slate-500 dark:text-gray-400 text-sm text">
                            {{ $penarikanDana->proyekPenggalangan->deskripsi }}</p>
                        <div>
                            {{-- <p class="text-slate-500 dark:text-gray-400 text-sm">Dibuat pada</p> --}}
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                {{ \Carbon\Carbon::parse($penarikanDana->created_at)->setTimezone('Asia/Jakarta')->format('d M Y - H:i:s') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <hr class="my-5 border-gray-300 dark:border-gray-600">
                <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold mb-5">Diminta mengirim ke:</h3>
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
                            {{ $penarikanDana->nama_rekening }}</h3>
                    </div>
                    <div>
                        <p class="text-slate-500 dark:text-gray-400 text-sm">Nomor Rekening</p>
                        <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                            {{ $penarikanDana->nomor_rekening }}</h3>
                    </div>
                </div>

                @if ($penarikanDana->sudah_disetujui)
                    <hr class="my-5 border-gray-300 dark:border-gray-600">
                    <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold mb-5">Bukti Transfer:</h3>
                    <img src="{{ Storage::url($penarikanDana->bukti_penarikan) }}" alt=""
                        class="rounded-2xl object-cover w-[300px] h-[200px] mb-3">
                @else
                    <hr class="my-5 border-gray-300 dark:border-gray-600">
                    <form action="{{ route('admin.penarikan_dana.update', $penarikanDana) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-4 w-fit">
                            <x-input-label for="bukti_penarikan" :value="__('Bukti Transfer')" class="dark:text-white" />
                            <x-text-input id="bukti_penarikan"
                                class="mb-7 block mt-1 w-full dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                type="file" name="bukti_penarikan" required autofocus
                                autocomplete="bukti_penarikan" />
                            <x-input-error :messages="$errors->get('bukti_penarikan')" class="mt-2" />
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white hover:bg-indigo-800 rounded-full transition-all">
                                Perbaharui
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
