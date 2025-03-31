<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white text-center">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.kategori.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="nama" :value="__('Nama')" class="dark:text-gray-200" />
                        <x-text-input id="nama" class="block mt-1 w-full dark:bg-gray-700 dark:text-white"
                            type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2 dark:text-red-400" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ikon" :value="__('Ikon')" class="dark:text-gray-200" />
                        <x-text-input id="ikon" class="block mt-1 w-full dark:bg-gray-700 dark:text-white"
                            type="file" name="ikon" required autofocus autocomplete="ikon" />
                        <x-input-error :messages="$errors->get('ikon')" class="mt-2 dark:text-red-400" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                            Tambah Kategori
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
