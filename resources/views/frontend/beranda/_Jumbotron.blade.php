<div class="relative py-12 md:py-20">
    <div class="grid lg:grid-cols-2 items-center gap-12">
        <!-- Left Column: Text Content -->
        <div class="space-y-6">
            <div
                class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold tracking-wide">
                Sistem Pelayanan Digital Desa
            </div>

            <div class="space-y-4">
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                    Layanan Desa <br />
                    <span class="text-blue-600">{{ config('app.village_name', 'Nama Desa Anda') }}</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-lg">
                    Akses pelayanan administrasi desa secara cepat, transparan, dan mudah langsung dari genggaman Anda.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="{{ route('layanan') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">
                    Ajukan Layanan
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('profil') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                    Profil Desa
                </a>
            </div>
        </div>

        <!-- Right Column: Visual -->
        <div class="relative">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                <img src="#" alt="Banner Desa"
                    class="w-full h-[300px] md:h-[450px] object-cover"
                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1516900557549-41557d405adf?q=80&w=2000&auto=format&fit=crop';" />
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/60 to-transparent">
                    <p class="text-white text-lg font-bold">Kantor {{ config('app.village_name', 'Nama Desa Anda') }}
                    </p>
                    <p class="text-gray-200 text-xs uppercase tracking-widest">
                        {{ config('app.sub_district', 'Kecamatan') }}, {{ config('app.district', 'Kabupaten') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
