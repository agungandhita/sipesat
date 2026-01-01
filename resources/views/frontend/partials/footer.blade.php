<footer class="bg-gray-900 text-gray-400 pt-12 pb-8">
    <div class="max-w-[90rem] mx-auto px-4">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 mb-12">
            <!-- Brand Column -->
            <div class="lg:col-span-4">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('img/logo-desa.png') }}" alt="Logo" class="w-10 h-auto" onerror="this.src='{{ asset('img/lamongan.png') }}'"/>
                    <div>
                        <h3 class="text-white font-bold text-xl leading-none tracking-tight uppercase">{{ config('app.name', 'SIPESAT') }}</h3>
                        <p class="text-[9px] font-bold uppercase tracking-wider text-gray-500 mt-1">{{ config('app.village_name', 'Nama Desa Anda') }}</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed mb-6 text-gray-400 max-w-sm">
                    Sistem Pelayanan Digital Terpadu yang berdedikasi untuk memberikan kemudahan akses layanan publik bagi seluruh warga secara transparan dan akuntabel.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1V12h3l-.5 3H13v6.8c4.56-.93 8-4.96 8-9.8z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Links Column 1 -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold mb-6 text-xs uppercase tracking-wider">
                    Navigasi
                </h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-blue-500 transition-colors">Profil Desa</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-blue-500 transition-colors">Pengumuman</a></li>
                    <li><a href="{{ route('layanan') }}" class="hover:text-blue-500 transition-colors">Layanan</a></li>
                </ul>
            </div>

            <!-- Links Column 2 -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold mb-6 text-xs uppercase tracking-wider">
                    Tautan Luar
                </h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" target="_blank" class="hover:text-blue-500 transition-colors">Pemerintah Kabupaten</a></li>
                    <li><a href="#" target="_blank" class="hover:text-blue-500 transition-colors">Kementerian Desa</a></li>
                    <li><a href="#" target="_blank" class="hover:text-blue-500 transition-colors">Pemerintah Provinsi</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="lg:col-span-4">
                <h4 class="text-white font-bold mb-6 text-xs uppercase tracking-wider">
                    Informasi Kontak
                </h4>
                <div class="space-y-5 text-sm">
                    <div class="flex gap-3">
                        <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-0.5">Alamat Kantor</p>
                            <p class="text-gray-300">{{ config('app.village_address', 'Alamat Lengkap Kantor Desa Anda') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-0.5">Email Resmi</p>
                            <p class="text-gray-300">{{ config('app.village_email', 'desa@example.com') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
            <p class="text-xs font-medium">&copy; {{ date('Y') }} {{ config('app.name', 'SIPESAT') }} {{ config('app.village_name', 'Nama Desa Anda') }}. All rights reserved.</p>
            <div class="flex items-center gap-6 text-[10px] font-bold uppercase tracking-widest">
                <a href="#" class="hover:text-white transition-colors">Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
