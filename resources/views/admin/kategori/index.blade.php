<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Kategori') }}
            </h2>
            <a href="{{ route('admin.kategori.create') }}"
                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($item as $kategori)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($kategori->ikon) ?? 'https://cdn4.iconfinder.com/data/icons/picture-sharing-sites/32/No_Image-512.png' }}"
                                alt="{{ $kategori->nama }}" class="rounded-2xl w-[90px] max-h-[90px]">

                            <div class="flex flex-col items-start w-40">
                                <h3
                                    class="text-indigo-950 dark:text-gray-200 text-sm md:text-base font-bold w-40 leading-tight line-clamp-2">
                                    {{ $kategori->nama }}
                                </h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col items-start w-40">
                            <p class="text-slate-500 dark:text-gray-400 text-xs md:text-sm">Dibuat Pada</p>
                            <h3
                                class="text-indigo-950 dark:text-gray-200 text-sm md:text-base font-bold leading-tight line-clamp-2">
                                {{ \Carbon\Carbon::parse($kategori->created_at)->setTimezone('Asia/Jakarta')->format('d M Y') }}
                            </h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105">
                                Edit
                            </a>
                            <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-bold py-4 px-6 bg-red-700 text-white rounded-full transition-transform duration-200 ease-out hover:scale-105"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">Belum ada kategori baru,
                            silahkan tambahkan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
