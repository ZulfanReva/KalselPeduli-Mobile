<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @role('owner')
                        <x-nav-link :href="route('admin.kategori.index')" :active="request()->routeIs('admin.kategori.index')">
                            {{ __('Kategori') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.donatur.index')" :active="request()->routeIs('admin.donatur.index')">
                            {{ __('Donatur') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.penarikan_dana.index')" :active="request()->routeIs('admin.penarikan_dana.index')">
                            {{ __('Penarikan Dana') }}
                        </x-nav-link>
                    @endrole

                    <x-nav-link :href="route('admin.pemohon_penggalangan.index')" :active="request()->routeIs('admin.pemohon_penggalangan.index')">
                        {{ __('Pemohon Penggalangan') }}
                    </x-nav-link>

                    @role('owner|pemohon_penggalangan')
                        <x-nav-link :href="route('admin.proyek_penggalangan.index')" :active="request()->routeIs('admin.proyek_penggalangan.index')">
                            {{ __('Proyek Penggalangan') }}
                        </x-nav-link>
                    @endrole

                    @role('pemohon_penggalangan')
                        <x-nav-link :href="route('admin.laporan_penggalangan.index')" :active="request()->routeIs('admin.laporan_penggalangan.index')">
                            {{ __('Laporan Penggalangan') }}
                        </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Settings & Dark Mode -->
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = (darkMode === 'true' ? 'false' : 'true')"
                    class="p-2 rounded-md text-gray-800 dark:text-gray-200 transition duration-300">
                    <i class="bi" :class="darkMode === 'true' ? 'bi-sun-fill' : 'bi-moon-fill'"></i>
                </button>


                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->nama }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap Icons di layout utama jika belum ada -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</nav>
