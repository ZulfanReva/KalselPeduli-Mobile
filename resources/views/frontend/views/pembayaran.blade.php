@extends('frontend.layouts.app')
@section('title', 'Pembayaran')

@section('content')
    <section class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#FCF7F1] overflow-x-hidden">
        <div class="header flex flex-col overflow-hidden h-[220px] relative">
            <nav class="pt-5 px-3 flex justify-between items-center relative z-20">
                <div class="flex items-center gap-[10px]">
                    <a href="details.html" class="w-10 h-10 flex shrink-0">
                        <img src="{{ asset('assets/images/icons/back.svg') }}" alt="icon">
                    </a>
                </div>
                <div class="flex flex-col items-center text-center">
                    <p class="font-semibold text-sm">#KalselPedli</p>
                </div>
                <a href="" class="w-10 h-10 flex shrink-0">
                    <img src="{{ asset('assets/images/icons/menu-dot.svg') }}" alt="icon">
                </a>
            </nav>
            <div class="flex items-center px-4 my-auto gap-[14px]">
                <div class="w-[90px] h-[100px] flex shrink-0 rounded-2xl overflow-hidden relative">
                    <img src="{{ asset('assets/images/thumbnails/th4.png') }}" class="w-full h-full object-cover"
                        alt="thumbnail">
                    <p
                        class="w-[90px] h-[23px] bg-[#4541FF] text-center p-[4px_12px] absolute bottom-0 font-bold text-[10px] leading-[15px] text-white">
                        VERIFIKASI</p>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="font-bold">{{ $proyek->nama }}</p>
                    <p class="text-xs leading-[18px]">Target <span
                            class="font-bold text-[#FF7815]">{{ 'Rp ' . number_format($proyek->target_donasi, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col z-30">
            <div id="content"
                class="w-full min-h-[calc(100vh-220px)] h-full bg-white rounded-t-[40px] flex flex-col gap-5 p-[30px_24px_30px]">
                <form method="POST"
                    action="{{ route('frontend.store', ['proyekPenggalangan' => $proyek->slug, 'jumlah_donasi' => $jumlah_donasi]) }}"
                    class="flex flex-col gap-5" enctype="multipart/form-data">
                    <div class="flex flex-col gap-[10px]">
                        @csrf
                        <p class="font-semibold text-sm">Jumlah Donasi Anda</p>
                        <div class="bg-[#E8E9EE] w-full flex items-center rounded-2xl p-[14px_16px] gap-[10px]">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/images/icons/dollar-circle.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold">{{ 'Rp ' . number_format($jumlah_donasi, 0, ',', '.') }}</p>
                        </div>
                        <input type="hidden" id="amount" name="jumlah_donasi" value="1000000">
                    </div>
                    <hr class="border-dashed">
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold text-sm">Kirim Pembayaran Ke</p>
                        <div class="w-full p-4 rounded-2xl border border-[#E8E9EE]">
                            <button type="button" class="accordion-button flex w-full justify-between items-center"
                                data-accordion="accordion-faq-1">
                                <div class="flex shrink-0 h-6 overflow-hidden">
                                    <img src="{{ asset('assets/images/icons/Bank_Central_Asia.webp') }}"
                                        class="object-contain" alt="icon">
                                </div>
                                <div class="arrow w-5 h-5 flex shrink-0 transition-all duration-300">
                                    <img src="{{ asset('assets/images/icons/arrow-down.svg') }}" class=""
                                        alt="icon">
                                </div>
                            </button>
                            <div id="accordion-faq-1" class="accordion-content open">
                                <div class="pt-3 flex flex-col gap-3">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-[#66697A]">Nama Bank</span>
                                        <span class="font-semibold text-sm">Bank Central Asia</span>
                                        <input type="hidden" id="bank" name="nama_bank" value="BCA">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-[#66697A]">Nomor Rekening</span>
                                        <span class="font-semibold text-sm">893092093</span>
                                        <input type="hidden" id="number" name="nomor_rekening" value="893092093">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-[#66697A]">Nama Akun Rekening</span>
                                        <span class="font-semibold text-sm">Kalsel Peduli</span>
                                        <input type="hidden" id="account" name="nama_rekening" value="AnggaMustHelp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="border-dashed">
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold text-sm">Nama Kamu</p>
                        <div
                            class="flex items-center w-full p-[14px_16px] rounded-2xl border border-[#E8E9EE] focus-within:border-[#292E4B] transition-all duration-300">
                            <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('assets/images/icons/user.svg') }}" class="h-full w-full object-contain"
                                    alt="icon">
                            </div>
                            <input type="text"
                                class="font-semibold placeholder:text-[#292E4B] placeholder:font-normal w-full outline-none"
                                placeholder="Nama Kamu?" name="nama">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold text-sm">No. WhatsApp</p>
                        <div
                            class="flex items-center w-full p-[14px_16px] rounded-2xl border border-[#E8E9EE] focus-within:border-[#292E4B] transition-all duration-300">
                            <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('assets/images/icons/call.svg') }}" class="h-full w-full object-contain"
                                    alt="icon">
                            </div>
                            <input type="number"
                                class="font-semibold placeholder:text-[#292E4B] placeholder:font-normal w-full outline-none"
                                placeholder="Nomor WhatsApp?" name="nomor_whatsapp">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold text-sm">Bukti Pembayaran</p>
                        <div class="relative">
                            <button type="button"
                                class="p-[14px_16px] rounded-2xl flex gap-[10px] w-full border border-[#E8E9EE] focus-within:border-[#292E4B] transition-all duration-300"
                                onclick="document.getElementById('file').click()">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('assets/images/icons/receipt-text.svg') }}" alt="icon">
                                </div>
                                <p id="fileLabel">Lampirkan Bukti Pembayaran</p>
                            </button>
                            <input id="file" type="file" name="bukti_pembayaran" class="hidden"
                                onchange="updateFileName(this)">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <p class="font-semibold text-sm">Pesan Kamu</p>
                        <div
                            class="flex w-full p-[14px_16px] rounded-2xl border border-[#E8E9EE] focus-within:border-[#292E4B] transition-all duration-300">
                            <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('assets/images/icons/sms.svg') }}"
                                    class="h-full w-full object-contain" alt="icon">
                            </div>
                            <textarea name="catatan" id="catatan"
                                class="font-semibold placeholder:text-[#292E4B] placeholder:font-normal w-full outline-none" cols="30"
                                rows="4" placeholder="Tinggalkan pesan"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="p-[14px_20px] bg-[#76AE43] rounded-full text-white w-full mx-auto font-semibold hover:shadow-[0_12px_20px_0_#76AE4380] transition-all duration-300 text-nowrap text-center">
                        Konfirmasi Donasi</button>
                </form>
            </div>
        </div>

    </section>
@endsection
