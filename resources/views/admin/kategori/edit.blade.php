<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.kategori.update', ['kategori' => $kategori->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nama" :value="__('Nama')" class="dark:text-gray-200" />
                        <x-text-input id="nama"
                            class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 dark:text-white border dark:border-gray-600"
                            type="text" name="nama" :value="$kategori->nama" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2 dark:text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ikon" :value="__('Ikon')" class="dark:text-gray-200" />
                        <img src="{{ Storage::url($kategori->ikon) ?? 'https://cdn4.iconfinder.com/data/icons/picture-sharing-sites/32/No_Image-512.png' }}"
                            alt="{{ $kategori->nama }}" class="rounded-2xl w-[90px] max-h-[90px]">
                        <x-text-input id="ikon"
                            class="block mt-1 w-full bg-gray-100 dark:bg-gray-700 dark:text-white border dark:border-gray-600"
                            type="file" name="ikon" autofocus autocomplete="ikon" />
                        <x-input-error :messages="$errors->get('ikon')" class="mt-2 dark:text-red-400" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 hover:bg-indigo-800 text-white rounded-full transition duration-300">
                            Perbaharui
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
