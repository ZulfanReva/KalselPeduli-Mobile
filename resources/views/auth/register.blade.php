<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" required autofocus
                autocomplete="avatar" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <div class="relative">
                <!-- Input -->
                <x-text-input id="email" class="block mt-1 w-full pr-[140px] pl-3" type="text" name="email"
                    required autocomplete="off" oninput="updateEmailValue()" />

                <!-- Domain -->
                <span id="email-domain"
                    class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 pointer-events-none">
                    @kalselpeduli.com
                </span>
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <script>
            function updateEmailValue() {
                let input = document.getElementById('email');
                let domain = document.getElementById('email-domain');

                // Mencegah pengguna mengetik '@' dan domain lain
                input.value = input.value.replace(/@.*/, '');

                // Mengatur posisi domain agar fleksibel mengikuti teks yang diketik
                let textWidth = getTextWidth(input.value, window.getComputedStyle(input).font);
                domain.style.transform = `translateX(${textWidth + 10}px)`;
            }

            function getTextWidth(text, font) {
                let canvas = document.createElement("canvas");
                let context = canvas.getContext("2d");
                context.font = font;
                return context.measureText(text).width;
            }

            // Tambahkan domain sebelum submit
            document.querySelector("form").addEventListener("submit", function(event) {
                let input = document.getElementById("email");

                // Pastikan domain ditambahkan sebelum submit
                if (!input.value.includes("@kalselpeduli.com")) {
                    input.value = input.value + "@kalselpeduli.com";
                }
            });
        </script>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
