<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Proyek Penggalangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <!-- Tampilkan pesan error jika ada -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white dark:bg-red-700">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <!-- Form Edit -->
                <form method="POST" action="{{ route('admin.proyek_penggalangan.update', $proyekPenggalangan->id) }}"
                    enctype="multipart/form-data" onsubmit="unformatRupiah(document.getElementById('target_donasi'))">
                    @csrf
                    @method('PUT')

                    <!-- Nama Proyek -->
                    <div>
                        <x-input-label for="nama" :value="__('Nama Proyek')" class="dark:text-gray-200" />
                        <x-text-input id="nama"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            type="text" name="nama" :value="old('nama', $proyekPenggalangan->nama)" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2 dark:text-red-400" />
                    </div>

                    <!-- Foto Proyek -->
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto Proyek')" class="dark:text-gray-200" />
                        @if ($proyekPenggalangan->foto)
                            <img src="{{ Storage::url($proyekPenggalangan->foto) }}" alt="Fundraiser Image"
                                class="rounded-2xl object-cover w-[120px] h-[90px]">
                        @endif
                        <x-text-input id="foto"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            type="file" name="foto" autofocus autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2 dark:text-red-400" />
                    </div>

                    <!-- Target Donasi -->
                    <div class="mt-4">
                        <x-input-label for="target_donasi" :value="__('Target Donasi')" class="dark:text-gray-200" />
                        <x-text-input id="target_donasi"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            type="text" name="target_donasi" :value="old(
                                'target_donasi',
                                number_format($proyekPenggalangan->target_donasi, 0, ',', '.'),
                            )" required
                            oninput="formatRupiah(this)" />
                        <x-input-error :messages="$errors->get('target_donasi')" class="mt-2 dark:text-red-400" />
                    </div>

                    <!-- JavaScript untuk format dan unformat Rupiah -->
                    <script>
                        // Fungsi untuk format rupiah pada input
                        function formatRupiah(input) {
                            let angka = input.value.replace(/\D/g, ""); // Hanya ambil angka
                            let formatted = new Intl.NumberFormat("id-ID", {
                                style: "currency",
                                currency: "IDR",
                                minimumFractionDigits: 0
                            }).format(angka);

                            input.value = formatted.replace("Rp", "").trim(); // Hapus "Rp" agar tetap angka
                        }

                        // Fungsi untuk mengubah format rupiah menjadi angka biasa sebelum submit
                        function unformatRupiah(input) {
                            let angka = input.value.replace(/\D/g, ""); // Hanya ambil angka
                            input.value = angka; // Set nilai input menjadi angka
                        }
                    </script>

                    <!-- Kategori -->
                    <div class="mt-4">
                        <x-input-label for="kategori_id" :value="__('Kategori')" class="dark:text-gray-200" />
                        <select name="kategori_id" id="kategori_id"
                            class="py-3 rounded-lg pl-3 w-full border border-slate-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $kategori->id == $proyekPenggalangan->kategori_id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kategori_id')" class="mt-2 dark:text-red-400" />
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" class="dark:text-gray-200" />
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                            class="border border-slate-300 rounded-xl w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">{{ old('deskripsi', $proyekPenggalangan->deskripsi) }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2 dark:text-red-400" />
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                            Perbarui
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
