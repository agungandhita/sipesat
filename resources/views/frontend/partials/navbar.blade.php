<!-- Top Bar -->
<div class="bg-gray-50 text-gray-500 py-1.5 hidden lg:block border-b border-gray-100">
    <div class="max-w-[90rem] mx-auto px-4 flex justify-between items-center text-[10px] font-bold uppercase tracking-wider">
        <div class="flex items-center space-x-6">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Jam Layanan: 08:00 - 15:00
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Kontak Desa
            </span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="hover:text-blue-600 transition-colors">Pengaduan</a>
            <a href="#" class="hover:text-blue-600 transition-colors">Bantuan</a>
        </div>
    </div>
</div>

<header class="sticky top-0 z-50 w-full bg-white border-b border-gray-200">
    <nav class="max-w-[90rem] mx-auto px-4">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Brand -->
            <a class="flex items-center gap-2.5 focus:outline-none" href="{{ Route('home') }}">
                <img src="{{ asset('img/logo-desa.png') }}" alt="Logo" class="w-8 lg:w-9 h-auto" onerror="this.src='{{ asset('img/lamongan.png') }}'"/>
                <div class="flex flex-col">
                    <span class="text-gray-900 font-bold text-base lg:text-lg leading-tight">{{ config('app.name', 'SIPESAT') }}</span>
                    <span class="text-gray-500 text-[9px] lg:text-[10px] font-bold uppercase tracking-wider">{{ config('app.village_name', 'Nama Desa Anda') }}</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-4">
                <div class="flex items-center gap-1">
                    <a class="px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-50' : 'text-gray-600 hover:text-gray-900' }}" href="{{ Route('home') }}">Beranda</a>
                    <a class="px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('profil') ? 'text-blue-700 bg-blue-50' : 'text-gray-600 hover:text-gray-900' }}" href="{{ Route('profil') }}">Profil Desa</a>
                    <a class="px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('berita.*') ? 'text-blue-700 bg-blue-50' : 'text-gray-600 hover:text-gray-900' }}" href="{{ Route('berita.index') }}">Pengumuman</a>
                    <a class="px-3 py-2 text-sm font-semibold rounded-lg transition-all {{ request()->routeIs('layanan') ? 'text-blue-700 bg-blue-50' : 'text-gray-600 hover:text-gray-900' }}" href="{{ Route('layanan') }}">Layanan</a>
                </div>

                @guest
                    <div class="flex items-center gap-2 ml-4">
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-bold text-gray-700 hover:text-blue-700 transition-colors">Masuk</a>
                        <a href="/register" class="px-5 py-2 text-sm font-bold text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">Daftar</a>
                    </div>
                @else
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                        <button id="hs-dropdown-account" type="button" class="flex items-center gap-2.5 p-1 pl-3 bg-gray-50 border border-gray-200 rounded-full hover:bg-gray-100 transition-all">
                            <span class="text-xs font-bold text-gray-700">{{ Auth::user()->name }}</span>
                            <div class="w-7 h-7 bg-blue-700 text-white flex items-center justify-center rounded-full text-[10px] font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-200 hs-dropdown-open:opacity-100 opacity-0 hidden min-w-48 bg-white border border-gray-200 shadow-lg rounded-xl p-1.5 mt-2" aria-labelledby="hs-dropdown-account">
                            <a class="flex items-center gap-2 py-2 px-3 rounded-lg text-sm font-semibold text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all" href="{{ route('riwayat.pengajuan') }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Riwayat
                            </a>
                            <div class="h-px bg-gray-100 my-1"></div>
                            <form action="/logout" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2 py-2 px-3 rounded-lg text-sm font-semibold text-red-600 hover:bg-red-50 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile Menu Toggle -->
            <button type="button" class="hs-collapse-toggle lg:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-all"
                data-hs-collapse="#mobile-menu"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation">
                <svg class="hs-collapse-open:hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="hs-collapse-open:block hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu" class="hs-collapse hidden overflow-hidden transition-all duration-300 lg:hidden border-t border-gray-100">
            <div class="flex flex-col gap-1 py-4">
                <a class="px-4 py-2.5 text-sm font-bold {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-50 rounded-lg' : 'text-gray-700' }}" href="{{ Route('home') }}">Beranda</a>
                <a class="px-4 py-2.5 text-sm font-bold {{ request()->routeIs('profil') ? 'text-blue-700 bg-blue-50 rounded-lg' : 'text-gray-700' }}" href="{{ Route('profil') }}">Profil Desa</a>
                <a class="px-4 py-2.5 text-sm font-bold {{ request()->routeIs('berita.*') ? 'text-blue-700 bg-blue-50 rounded-lg' : 'text-gray-700' }}" href="{{ Route('berita.index') }}">Pengumuman</a>
                <a class="px-4 py-2.5 text-sm font-bold {{ request()->routeIs('layanan') ? 'text-blue-700 bg-blue-50 rounded-lg' : 'text-gray-700' }}" href="{{ Route('layanan') }}">Layanan</a>

                <div class="h-px bg-gray-100 my-2"></div>

                @guest
                    <div class="grid grid-cols-2 gap-3 px-4 pt-2">
                        <a href="{{ route('login') }}" class="w-full py-2.5 text-center text-sm font-bold text-gray-700 border border-gray-200 rounded-lg">Masuk</a>
                        <a href="/register" class="w-full py-2.5 text-center text-sm font-bold text-white bg-blue-700 rounded-lg">Daftar</a>
                    </div>
                @else
                    <div class="px-4 pt-2 flex flex-col gap-1">
                        <a href="{{ route('riwayat.pengajuan') }}" class="px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 rounded-lg flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Riwayat Pengajuan
                        </a>
                        <form action="/logout" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 rounded-lg flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
