@extends('frontend.layouts.app')
@section('title', 'Detail Penggalangan Dana')

@section('content')
    <section class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-white overflow-x-hidden">
        <div class="header flex flex-col bg-[#56BBC5] overflow-hidden h-[350px] relative -mb-[92px]">
            <nav class="pt-5 px-3 flex justify-between items-center relative z-20">
                <div class="flex items-center gap-[10px]">
                    <a href="{{ route('frontend.index') }}" class="w-10 h-10 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/back.svg') }}" alt="icon">
                    </a>
                </div>
                <div class="flex flex-col items-center text-center">
                    <p class="text-xs leading-[18px] text-white">Detail</p>
                    <p class="font-semibold text-sm text-white">#KalselPeduli</p>
                </div>
                <a href="" class="w-10 h-10 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/like.svg') }}" alt="icon">
                </a>
            </nav>
            <div class="w-full h-full absolute bg-white overflow-hidden">
                <div class="w-full h-[266px] bg-gradient-to-b from-black/90 to-[#080925]/0 absolute z-10"></div>
                <img src="{{ Storage::url($proyek->foto) }}" class="w-full h-full object-cover" alt="cover">
            </div>
        </div>
        <div class="flex flex-col z-30">


            @if ($proyek->sudah_selesai)
                <div id="status"
                    class="w-full h-[92px] bg-[#76AE43] rounded-t-[40px] pt-3 pb-[50px] flex gap-2 justify-center items-center -mb-[38px]">
                    <div class="w-[30px] h-[30px] flex shrink-0">
                        <img src="{{ asset('assets/images/icons/lovely.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm text-white">Penggalangan Dana Sudah Selesai</p>
                </div>
            @else
                <div id="status"
                    class="w-full h-[92px] bg-[#FF7815] rounded-t-[40px] pt-3 pb-[50px] flex gap-2 justify-center items-center -mb-[38px]">
                    <div class="w-[30px] h-[30px] flex shrink-0">
                        <img src="{{ asset('assets/images/icons/lovely.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-sm text-white">Semua Orang Pantas Menerima Bantuan Terbaik Darimu.</p>
                </div>
            @endif
            <div id="content" class="w-full bg-white rounded-t-[40px] flex flex-col gap-5 p-[30px_24px_120px]">
                <div class="flex flex-col gap-[10px]">

                    @if ($proyek->sudah_selesai)
                        <p
                            class="badge bg-[#76AE43] rounded-full p-[6px_12px] font-bold text-xs text-white w-fit leading-[18px]">
                            SELESAI</p>
                    @else
                        <p
                            class="badge bg-[#40BCD9] rounded-full p-[6px_12px] font-bold text-xs text-white w-fit leading-[18px]">
                            PROSES</p>
                    @endif

                    <h1 class="font-extrabold text-[26px] leading-[39px]">{{ $proyek->nama }}
                    </h1>
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ Storage::url($proyek->pemohonPenggalangan->user->avatar) }}"
                                class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex gap-1 items-center">
                            <p class="font-semibold text-sm">{{ $proyek->pemohonPenggalangan->user->nama }}</p>
                            <div class="flex shrink-0">
                                <img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="font-semibold text-sm">Progress</h2>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-[#66697A]">
                            {{ 'Rp ' . number_format($proyek->TotalDonasiTerkumpul(), 0, ',', '.') }}</p>
                        <p class="font-bold text-[20px] leading-[30px] text-[#76AE43]">
                            {{ 'Rp ' . number_format($proyek->target_donasi, 0, ',', '.') }}</p>
                    </div>
                    <progress id="fund" value="{{ $proyek->AtributPersentase() }}" max="100"
                        class="w-full h-[6px] rounded-full overflow-hidden"></progress>
                </div>
                <div class="flex flex-col gap-[2px]">
                    <h2 class="font-semibold text-sm">Deskripsi</h2>
                    <p class="desc-less text-sm leading-[26px]">{{ $proyek->deskripsi }}</p>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Donatur ({{ number_format($proyek->donatur->count(), 0, ',', '.') }})
                        </h2>
                        <a href="" class="p-[6px_12px] rounded-full bg-[#E8E9EE] font-semibold text-sm">Lihat
                            Semua</a>
                    </div>
                    @forelse ($proyek->donatur as $donatur)
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{ asset('assets/images/photos/avatar-default.svg') }}"
                                        class="w-full h-full object-cover" alt="avatar">
                                </div>
                                <div class="flex flex-col gap-[2px] w-full">
                                    <div class="flex items-center justify-between">
                                        <p class="font-bold">
                                            {{ 'Rp ' . number_format($donatur->jumlah_donasi, 0, ',', '.') }}</p>
                                        <p class="font-semibold text-[10px] leading-[15px] text-right text-[#66697A]">by
                                            {{ $donatur->nama }}</p>
                                    </div>
                                    <p class="caption text-xs leading-[18px] text-[#66697A]">“{{ $donatur->catatan }}”
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <p class="text-white text-lg font-semibold"> Belum ada yang memberikan donasi saat ini.
                            </p>
                        </div>
                    @endforelse
                </div>


            </div>
        </div>
        <a href="send-support.html"
            class="p-[14px_20px] bg-[#76AE43] rounded-full text-white w-fit mx-auto font-semibold hover:shadow-[0_12px_20px_0_#76AE4380] transition-all duration-300 fixed bottom-[30px] transform -translate-x-1/2 left-1/2 z-40 text-nowrap">Mulai Berdonasi</a>
    </section>
@endsection
