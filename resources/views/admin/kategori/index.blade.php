<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Categories') }}
            </h2>
            <a href="#" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($item as $kategori)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{Storage::url($item->ikon) ?? 'https://cdn4.iconfinder.com/data/icons/picture-sharing-sites/32/No_Image-512.png' }}"
                                alt="{{ $item->nama }}" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $item->nama }}</h3>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Dibuat Pada</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $item->created_at->format('d M Y') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.kategori.edit', $item->id) }}"
                                class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 text-lg font-semibold">Belum ada kategori baru, silahkan tambahkan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
