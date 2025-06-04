@extends('frontend.layouts.app')

@section('title', 'Kalsel Peduli')

@section('content')
    <section class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-white overflow-x-hidden pb-[134px]">
        <div class="header flex flex-col bg-gradient-to-b from-[#3CBBDB] to-[#EAD380] rounded-b-[50px] overflow-hidden">
            <nav class="pt-5 px-3 flex justify-between items-center">
                <div class="flex items-center gap-[10px]">
                    <div class="w-10 h-10 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/loc.svg') }}" alt="icon">
                    </div>
                    <div class="flex flex-col text-white">
                        <p class="text- leading-[18px]">Lokasi</p>
                        <p class="font-semibold text-sm">Indonesia</p>
                    </div>
                </div>
                <a href="" class="w-10 h-10 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/menu.svg') }}" alt="icon">
                </a>
            </nav>
            <div class="mt-[30px] z-10">
                <h1 class="font-extrabold text-2xl leading-[36px] text-white text-center">
                    Bantu Sesama<br>Hidup Lebih Bermakna!
                </h1>
            </div>
            <div class="w-full h-fit overflow-hidden -mt-[33px]">
                <img src="{{ asset('assets/images/backgrounds/hero-background.png') }}" class="w-full h-full object-contain"
                    alt="background">
            </div>
        </div>

        <div id="popular-fundrising" class="mt-8">
            <div class="px-4 flex justify-between items-center">
                <h2 class="font-bold text-lg">Penggalangan <br>Populer</h2>
                <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Telurusi Semua</a>
            </div>
            <div class="main-carousel mt-[14px]">

                @forelse ($kategori as $kategori)
                    <div class="px-2 first-of-type:pl-4 last-of-type:pr-4">
                        <a href="{{ route('frontend.kategori', $kategori) }}"
                            class="fundrising-card rounded-[30px] w-[135px] min-h-[160px] flex flex-col items-center gap-3 p-5 border border-[#E8E9EE]">
                            <div class="w-[60px] h-[60px] flex shrink-0 overflow-hidden">
                                <img src="{{ Storage::url($kategori->ikon) }}" alt="icon">
                            </div>
                            <span class="font-semibold text-center my-auto">{{ $kategori->nama }}</span>
                        </a>
                    </div>
                @empty
                    <div class="text-center py-10 w-full">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">Belum ada penggalangan dana saat
                            ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div id="best-choices" class="mt-8 -mb-6">
            <div class="px-4 flex justify-between items-center">
                <h2 class="font-bold text-lg">Penggalangan <br>Pilihan Terbaik</h2>
                <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Telusuri Semua</a>
            </div>
            <div class="main-carousel mt-[14px]">
                @forelse ($proyekPenggalangan as $proyek)
                    <div class="px-2 first-of-type:pl-4 last-of-type:pr-4 mb-6">
                        <div class="flex flex-col gap-[14px] rounded-2xl border border-[#E8E9EE] p-[14px] w-[208px]">
                            <a href="{{ route('frontend.detail', $proyek) }}">
                                <div class="rounded-2xl w-full h-[120px] flex shrink-0 overflow-hidden">
                                    <img src="{{ Storage::url($proyek->foto) }}" class="w-full h-full object-cover"
                                        alt="thumbnail">
                                </div>
                            </a>
                            <div class="flex flex-col gap-[6px]">
                                <a href="{{ route('frontend.detail', $proyek) }}"
                                    class="font-bold line-clamp-2 hover:line-clamp-none block">{{ $proyek->nama }}</a>

                                <p class="text-xs leading-[18px] block">
                                    Target Donasi <br>
                                    <span class="font-bold text-[#FF7815] block">
                                        {{ 'Rp ' . number_format($proyek->target_donasi, 0, ',', '.') }}
                                    </span>
                                </p>
                            </div>
                            <progress id="fund" value="{{ $proyek->AtributPersentase() }}" max="100"
                                class="w-full h-[6px] rounded-full overflow-hidden"></progress>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 w-full">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">Belum ada penggalangan dana saat
                            ini.</p>
                    </div>
                @endforelse
            </div>
        </div>


        <div id="latest-fundrising" class="mt-8">
            <div class="px-4 flex justify-between items-center">
                <h2 class="font-bold text-lg">Penggalangan <br>Terbaru</h2>
                <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Telusuri Semua</a>
            </div>

            <div class="flex flex-col gap-4 mt-[14px] px-4">
                @forelse ($proyekPenggalangan as $proyek)
                    <a href="{{ route('frontend.detail', $proyek) }}" class="card">
                        <div class="w-full border border-[#E8E9EE] flex items-center p-[14px] gap-3 rounded-2xl bg-white">
                            <div class="w-20 h-[90px] flex shrink-0 rounded-2xl overflow-hidden">
                                <img src="{{ Storage::url($proyek->foto) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="font-bold line-clamp-1 hover:line-clamp-none">{{ $proyek->nama }}</p>
                                <p class="text-xs leading-[18px]">Target Donasi <span
                                        class="font-bold text-[#FF7815]">{{ 'Rp ' . number_format($proyek->target_donasi, 0, ',', '.') }}</span>
                                </p>
                                <div class="flex items-center gap-1 sm:flex-row-reverse sm:justify-end">
                                    <p class="font-semibold sm:font-medium text-xs leading-[18px]">
                                        {{ $proyek->pemohonPenggalangan->user->nama }}</p>
                                    <div class="flex shrink-0">
                                        <img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-500 dark:text-gray-400 text-lg font-semibold">Belum ada penggalangan dana saat
                            ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div id="menu"
            class="max-w-[341px] w-full fixed bottom-[20px] p-3 flex items-center justify-between rounded-[30px] bg-[#1E2037] transform -translate-x-1/2 left-1/2">
            <a href="" class="p-[14px_16px] flex items-center gap-[6px] rounded-full bg-[#FF7815]">
                <div class="flex shrink-0">
                    <img src="{{ asset('assets/images/icons/heart.svg') }}" alt="icon">
                </div>
                <span class="font-semibold text-sm text-white">Discover</span>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/crown.svg') }}" alt="icon">
                </div>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/3dcube.svg') }}" alt="icon">
                </div>
            </a>
            <a href="" class="flex items-center justify-center w-[56px] h-[52px] p-[14px_16px]">
                <div class="flex shrink-0 w-6 h-6 overflow-hidden">
                    <img src="{{ asset('assets/images/icons/setting-2.svg') }}" alt="icon">
                </div>
            </a>
        </div>
    </section>
@endsection

{{-- @push('after-style')
    <script src="{{ asset('js/contohtambahan.js') }}"></script>
@endpush --}}

{{-- @push('after-script')
    <script src="{{ asset('js/contohtambahan.js') }}"></script>
@endpush --}}
