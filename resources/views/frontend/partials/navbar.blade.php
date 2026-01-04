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
                <img src="{{ asset('img/logo-desa.png') }}" alt="Logo" class="w-8 lg:w-9 h-auto" onerror="this.onerror=null; this.src='{{ asset('img/lamongan.png') }}'"/>
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
                    <!-- Dropdown Akun (Desktop, Tamu) -->
                    <div class="relative inline-flex ml-4" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" type="button" class="flex items-center gap-2 px-3 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <!-- Avatar Icon -->
                            <div class="w-7 h-7 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-700">Tamu</span>
                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click="open = false"
                             class="absolute right-0 top-full mt-2 w-56 bg-white border border-gray-200 shadow-lg rounded-xl overflow-hidden z-50"
                             style="display: none;">

                            <!-- User Info Header -->
                            <div class="px-4 py-3 bg-gradient-to-br from-blue-50 to-gray-50 border-b border-gray-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 640 640" fill="currentColor">
                                            <path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-gray-900 truncate">Anda belum masuk</p>
                                        <p class="text-xs text-gray-500 truncate">Silakan login atau daftar</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="p-1.5">
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-semibold text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all" href="{{ route('login') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>Masuk</span>
                                </a>
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-semibold text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all" href="/register">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    <span>Daftar Akun</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Dropdown Account (Desktop, Logged In) -->
                    <div class="relative inline-flex ml-4" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" type="button" class="flex items-center gap-2 px-3 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <!-- Avatar dengan foto atau inisial -->
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-7 h-7 rounded-full object-cover" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-7 h-7 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white text-xs font-bold" style="display: none;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @else
                                <div class="w-7 h-7  rounded-full flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="text-sm font-semibold text-gray-700 max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             @click="open = false"
                             class="absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200 shadow-lg rounded-xl overflow-hidden z-50"
                             style="display: none;">

                            <!-- User Info Header -->
                            <div class="px-4 py-3 bg-gradient-to-br from-blue-50 to-indigo-50 border-b border-gray-100">
                                <div class="flex items-center gap-3">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="w-12 h-12  rounded-full flex items-center justify-center text-white text-lg font-bold border-2 border-white shadow-sm" style="display: none;">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                    @else
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white text-lg font-bold border-2 border-white shadow-sm">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="p-1.5">
                                <a class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-semibold text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all" href="{{ route('riwayat.pengajuan') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Riwayat Pengajuan</span>
                                </a>

                                <div class="h-px bg-gray-100 my-1"></div>

                                <form action="/logout" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-semibold text-red-600 hover:bg-red-50 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </div>
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
                    <!-- User Info Mobile (Tamu) -->
                    <div class="px-4 pb-2">
                        <div class="flex items-center gap-3 p-3 bg-gradient-to-br from-blue-50 to-gray-50 rounded-lg border border-gray-100">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 truncate">Tamu</p>
                                <p class="text-xs text-gray-500 truncate">Silakan login atau daftar</p>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 flex flex-col gap-2 pt-1">
                        <a href="{{ route('login') }}" class="w-full px-4 py-2.5 text-sm font-bold text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all text-center">
                            Masuk
                        </a>
                        <a href="/register" class="w-full px-4 py-2.5 text-sm font-bold text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition-all text-center">
                            Daftar
                        </a>
                    </div>
                @else
                    <!-- User Info Mobile -->
                    <div class="px-4 pb-2">
                        <div class="flex items-center gap-3 p-3 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg border border-gray-100">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm flex-shrink-0" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white text-lg font-bold border-2 border-white shadow-sm flex-shrink-0" style="display: none;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @else
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white text-lg font-bold border-2 border-white shadow-sm flex-shrink-0">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 flex flex-col gap-1">
                        <a href="{{ route('riwayat.pengajuan') }}" class="px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 rounded-lg flex items-center gap-2 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Riwayat Pengajuan
                        </a>
                        <form action="/logout" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 rounded-lg flex items-center gap-2 transition-all">
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

<!-- Alpine.js Script (Tambahkan di layout utama jika belum ada) -->
@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
