<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Proyek Penggalangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.proyek_penggalangan.store') }}" enctype="multipart/form-data"
                    onsubmit="unformatRupiah(document.getElementById('target_donasi'))">
                    @csrf

                    <div>
                        <x-input-label for="nama" :value="__('Nama Proyek')" class="text-gray-700 dark:text-gray-200" />
                        <x-text-input id="nama"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                            type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto Proyek')" class="text-gray-700 dark:text-gray-200" />
                        <x-text-input id="foto"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                            type="file" name="foto" required autofocus autocomplete="foto" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="target_donasi" :value="__('Target Donasi')" class="text-gray-700 dark:text-gray-200" />
                        <x-text-input id="target_donasi"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                            type="text" name="target_donasi" :value="old('target_donasi')" required autofocus
                            autocomplete="target_donasi" oninput="formatRupiah(this)" />
                        <x-input-error :messages="$errors->get('target_donasi')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kategori" :value="__('Kategori')" class="text-gray-700 dark:text-gray-200" />
                        <select name="kategori_id" id="kategori_id"
                            class="py-3 rounded-lg pl-3 w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                            <option value="" class="dark:bg-gray-700 dark:text-gray-200">Pilih Kategori</option>
                            @foreach ($item as $kategori)
                                <option value="{{ $kategori->id }}" class="dark:bg-gray-700 dark:text-gray-200">
                                    {{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kategori')" class="mt-2 text-red-500" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" class="text-gray-700 dark:text-gray-200" />
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                            class="border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2 text-red-500" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                            Tambah Proyek Penggalangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
</x-app-layout>
