<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Pemohon Penggalangan Dana') }}
            </h2>
        </div>
    </x-slot>

    @role('owner')
        <div class="daftar-penggalangan py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                    @foreach ($pemohonPenggalangans as $pemohon)
                        <div class="kartu-item flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="{{ Storage::url($pemohon->user->avatar) }}" alt="Foto Pemohon"
                                    class="rounded-2xl object-cover w-[90px] h-[90px]">
                                <div class="flex flex-col">
                                    <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                        {{ $pemohon->user->nama }}
                                    </h3>
                                </div>
                            </div>

                            <div class="hidden md:flex flex-col">
                                <p class="text-slate-500 dark:text-gray-400 text-sm">Tanggal Pengajuan</p>
                                <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">
                                    {{ \Carbon\Carbon::parse($pemohon->created_at)->setTimezone('Asia/Jakarta')->format('d M Y') }}
                                </h3>
                            </div>

                            {{-- Status --}}
                            <div class="flex flex-col items-center">
                                <span
                                    class="w-fit text-sm font-bold py-2 px-3 rounded-full text-white 
                                {{ $pemohon->status_aktif ? 'bg-green-500' : 'bg-orange-500' }}">
                                    {{ $pemohon->status_aktif ? 'Aktif' : 'Menunggu' }}
                                </span>
                            </div>

                            {{-- Aksi --}}
                            <div class="flex flex-col items-center">
                                @if ($pemohon->status_aktif)
                                    <div class="hidden md:flex flex-row items-center gap-x-3">
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-bold py-4 px-6 bg-red-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="hidden md:flex flex-row items-center gap-x-3">
                                        <form action="{{ route ('admin.pemohon_penggalangan.update', $pemohon) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                                Terima
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="daftar-penggalangan py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                    <div class="kartu-item flex flex-col justify-between items-center gap-y-5">
                        <div class="flex flex-row items-center gap-x-3">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M19 9C19 10.45 18.57 11.78 17.83 12.89C16.75 14.49 15.04 15.62 13.05 15.91C12.71 15.97 12.36 16 12 16C11.64 16 11.29 15.97 10.95 15.91C8.96 15.62 7.25 14.49 6.17 12.89C5.43 11.78 5 10.45 5 9C5 5.13 8.13 2 12 2C15.87 2 19 5.13 19 9Z"
                                    fill="#292D32" />
                                <path
                                    d="M21.2491 18.4699L19.5991 18.8599C19.2291 18.9499 18.9391 19.2299 18.8591 19.5999L18.5091 21.0699C18.3191 21.8699 17.2991 22.1099 16.7691 21.4799L11.9991 15.9999L7.2291 21.4899C6.6991 22.1199 5.6791 21.8799 5.4891 21.0799L5.1391 19.6099C5.0491 19.2399 4.7591 18.9499 4.3991 18.8699L2.7491 18.4799C1.9891 18.2999 1.7191 17.3499 2.2691 16.7999L6.1691 12.8999C7.2491 14.4999 8.9591 15.6299 10.9491 15.9199C11.2891 15.9799 11.6391 16.0099 11.9991 16.0099C12.3591 16.0099 12.7091 15.9799 13.0491 15.9199C15.0391 15.6299 16.7491 14.4999 17.8291 12.8999L21.7291 16.7999C22.2791 17.3399 22.0091 18.2899 21.2491 18.4699Z"
                                    fill="#292D32" />
                            </svg>
                        </div>
                        <div class="flex flex-col text-center">
                            <h3 class="text-indigo-950 dark:text-gray-200 text-xl font-bold">Tebarkan Kebaikan</h3>
                            <p class="text-slate-500 dark:text-gray-400 text-base">
                                Jadilah bagian dari kami untuk membantu mereka yang membutuhkan.
                            </p>
                        </div>

                        <!-- Menampilkan pesan sukses atau error jika ada -->
                        @if (session('success'))
                            <div class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.pemohon_penggalangan.daftar') }}" method="POST">
                            @csrf

                            @if ($StatusPemohonPenggalangan == 'MENUNGGU')
                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                    MENUNGGU
                                </span>
                            @elseif($StatusPemohonPenggalangan == 'AKTIF')
                                <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                    <span class="transition-transform duration-200 ease-out hover:scale-105 inline-block">
                                        BUAT PENGGALANGAN DANA
                                    </span>
                                </button>
                            @else
                                <button type="submit"
                                    class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                    JADI PENGGALANG DANA
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endrole
</x-app-layout>
