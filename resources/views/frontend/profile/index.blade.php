@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gray-50 text-slate-900 min-h-screen font-sans">
        <!-- Hero Section -->
        <div class="relative bg-indigo-900 text-white overflow-hidden py-24 md:py-32" style="background: linear-gradient(135deg, {{ config('template.colors.bg_gradient_start', '#1e1b4b') }} 0%, {{ config('template.colors.bg_gradient_end', '#312e81') }} 100%)">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg class="h-full w-full" fill="none" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-2/3 text-center lg:text-left">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-indigo-200 text-sm font-semibold mb-6 border border-white/20 uppercase tracking-wider">Profil Desa</span>
                        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 tracking-tight">
                           Desa Anda
                        </h1>
                        <p class="text-lg md:text-xl text-indigo-100 max-w-2xl leading-relaxed opacity-90">
                            Kecamatan dan provinsi anda
                        </p>
                    </div>
                    <div class="lg:w-1/3 flex justify-center">
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                            <div class="relative bg-white/10 backdrop-blur-xl p-6 rounded-full border border-white/20 shadow-2xl">
                                <img src="{{ asset(config('template.images.logo', 'img/logo-desa.png')) }}" alt="logo" class="w-32 md:w-48 h-auto drop-shadow-2xl" onerror="this.src='{{ asset(config('template.images.logo_fallback', 'img/lamongan.png')) }}'"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wave Transition -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
                <svg class="relative block w-[calc(100%+1.3px)] h-[50px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1200" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V46.29C28.48,53.42,75.09,59.34,121.39,56.44Z" class="fill-gray-50"></path>
                </svg>
            </div>
        </div>

        <!-- Search Section -->
        <section class="py-12 -mt-10 relative z-20">
            <div class="container mx-auto px-6">
                <div class="max-w-5xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl shadow-indigo-100/50 border border-gray-100 overflow-hidden">
                        <div class="p-8 md:p-10">
                            <div class="mb-8">
                                <h2 class="text-2xl font-bold text-gray-800">Cari Data Penduduk</h2>
                                <p class="text-gray-500 mt-1">Gunakan formulir di bawah untuk mencari informasi penduduk berdasarkan nama atau dusun.</p>
                            </div>

                            <form action="{{ route('profil') }}" method="GET" class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
                                    <div class="md:col-span-7">
                                        <label for="search" class="block mb-2 text-sm font-semibold text-gray-700">Nama Penduduk</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300"
                                                placeholder="Contoh: Ahmad Subarjo" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="dusun" class="block mb-2 text-sm font-semibold text-gray-700">Dusun</label>
                                        <select id="dusun" name="dusun"
                                            class="block w-full px-4 py-3.5 bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 appearance-none">
                                            <option value="">Semua Dusun</option>
                                            @if(isset($dusunList) && $dusunList->count() > 0)
                                                @foreach ($dusunList as $dusun)
                                                    <option value="{{ $dusun }}" {{ request('dusun') == $dusun ? 'selected' : '' }}>{{ $dusun }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="md:col-span-2 flex items-end">
                                        <button type="submit" class="w-full py-3.5 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95">
                                            Cari
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Results Table -->
                            @if (isset($penduduk) && $penduduk->count() > 0)
                                <div class="mt-12 border-t border-gray-100 pt-10">
                                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                                        <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                            <span class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center text-sm">
                                                {{ $penduduk->total() }}
                                            </span>
                                            Hasil Pencarian
                                        </h3>
                                    </div>

                                    <div class="overflow-hidden rounded-2xl border border-gray-100">
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-sm text-left">
                                                <thead>
                                                    <tr class="bg-gray-50/50 text-gray-600 font-semibold border-b border-gray-100">
                                                        <th class="px-6 py-4">Nama Lengkap</th>
                                                        <th class="px-6 py-4">L/P</th>
                                                        <th class="px-6 py-4">Dusun</th>
                                                        <th class="px-6 py-4 text-right">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-50">
                                                    @foreach ($penduduk as $warga)
                                                        <tr class="hover:bg-indigo-50/30 transition-colors duration-200 group">
                                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $warga->nama }}</td>
                                                            <td class="px-6 py-4">
                                                                <span class="px-2.5 py-1 rounded-md text-xs font-medium {{ strtolower($warga->jenis_kelamin) == 'laki-laki' ? 'bg-blue-50 text-blue-600' : 'bg-pink-50 text-pink-600' }}">
                                                                    {{ strtoupper(substr($warga->jenis_kelamin, 0, 1)) }}
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 text-gray-600">{{ $warga->dusun }}</td>
                                                            <td class="px-6 py-4 text-right">
                                                                <button onclick="showPendudukDetailNew(
                                                                    '{{ addslashes($warga->nama) }}',
                                                                    '{{ ucfirst($warga->jenis_kelamin) }}',
                                                                    '{{ addslashes($warga->alamat) }}',
                                                                    '{{ $warga->rt ? 'RT '.$warga->rt : '' }}{{ $warga->rw ? ' / RW '.$warga->rw : '' }}',
                                                                    '{{ addslashes($warga->dusun) }}',
                                                                    '{{ addslashes($warga->tempat_lahir) }}',
                                                                    '{{ $warga->tanggal_lahir ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d-m-Y') : '' }}',
                                                                    '{{ addslashes($warga->agama) }}',
                                                                    '{{ addslashes($warga->status_perkawinan) }}',
                                                                    '{{ addslashes($warga->pekerjaan) }}',
                                                                    '{{ addslashes($warga->pendidikan) }}',
                                                                    '{{ $warga->usia }}'
                                                                )" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white border border-gray-200 rounded-xl text-indigo-600 font-semibold text-xs hover:border-indigo-600 hover:bg-indigo-50 transition-all duration-200">
                                                                    Detail
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    @if ($penduduk->hasPages())
                                        <div class="mt-8">
                                            {{ $penduduk->appends(request()->query())->links() }}
                                        </div>
                                    @endif
                                </div>
                            @elseif(request()->has('search') || request()->has('dusun'))
                                <div class="mt-12 text-center py-16 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Data Tidak Ditemukan</h4>
                                    <p class="text-gray-500 max-w-sm mx-auto mb-8">Maaf, tidak ada data penduduk yang sesuai dengan kriteria pencarian "{{ request('search') }}".</p>
                                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-200 rounded-2xl text-gray-700 font-bold hover:bg-gray-50 transition-all duration-200">
                                        Reset Pencarian
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Misi Section -->
        <section class="py-20 bg-white overflow-hidden relative">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row gap-16 items-center">
                    <div class="lg:w-1/2">
                        <div class="relative">
                            <div class="absolute -top-10 -left-10 w-32 h-32 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

                            <div class="relative bg-white rounded-3xl p-10 shadow-2xl shadow-indigo-100 border border-gray-100">
                                <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-200">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <h2 class="text-4xl font-extrabold text-gray-900 mb-6">Visi Kami</h2>
                                <p class="text-xl text-gray-600 leading-relaxed italic">
                                    "{{ config('template.content.vision', 'Mewujudkan pelayanan masyarakat yang profesional dan transparan demi kemajuan dan kesejahteraan masyarakat Desa.') }}"
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-1/2">
                        <div class="space-y-6">
                            <div class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-sm font-bold uppercase tracking-wider mb-2">Langkah Kami</div>
                            <h2 class="text-4xl font-extrabold text-gray-900 mb-8">Misi Pembangunan</h2>

                            <div class="grid gap-6">
                                @php
                                    $missions = config('template.content.missions', [
                                        'Meningkatkan kualitas pelayanan masyarakat yang profesional, mudah diakses, dan transparan.',
                                        'Mendorong pembangunan infrastruktur desa untuk mendukung kemajuan ekonomi dan sosial masyarakat.',
                                        'Mengembangkan potensi sumber daya manusia dan sumber daya alam untuk kesejahteraan bersama.',
                                        'Mewujudkan lingkungan desa yang bersih, aman, dan nyaman sebagai tempat tinggal yang ideal.'
                                    ]);
                                @endphp
                                @foreach($missions as $index => $mission)
                                <div class="flex gap-5 p-5 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl hover:shadow-indigo-100 transition-all duration-300 border border-transparent hover:border-indigo-100 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-indigo-600 font-bold group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                        {{ $index + 1 }}
                                    </div>
                                    <p class="text-gray-700 leading-relaxed font-medium pt-2">{{ $mission }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <span class="text-indigo-600 font-bold uppercase tracking-widest text-sm">Pemerintahan</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-6">Struktur Organisasi</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">Kenali lebih dekat para perangkat desa yang berdedikasi untuk melayani dan membangun {{ config('template.content.village_name', 'Desa') }}.</p>
                </div>

                @if(isset($perangkatDesa) && $perangkatDesa->count() > 0)
                    <!-- Kepala Desa -->
                    @php
                        $kades = $perangkatDesa->filter(function($item) {
                            return str_contains(strtolower($item->jabatan), 'kepala desa') || str_contains(strtolower($item->jabatan), 'kades');
                        })->first();
                    @endphp

                    @if($kades)
                    <div class="flex justify-center mb-24">
                        <div class="w-full max-w-xl">
                            <div class="bg-white rounded-[3rem] p-10 shadow-2xl shadow-indigo-100 border border-indigo-50 relative group overflow-hidden">
                                <div class="absolute top-0 right-0 p-8 text-indigo-100 group-hover:text-indigo-200 transition-colors">
                                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="relative z-10">
                                    <div class="w-24 h-24 bg-indigo-600 rounded-3xl flex items-center justify-center mb-8 shadow-xl shadow-indigo-200">
                                        <span class="text-3xl font-bold text-white">{{ strtoupper(substr($kades->nama, 0, 1)) }}</span>
                                    </div>
                                    <h3 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $kades->nama }}</h3>
                                    <div class="inline-block px-4 py-1 rounded-full bg-indigo-50 text-indigo-600 font-bold text-sm mb-6">
                                        {{ $kades->jabatan }}
                                    </div>
                                    <p class="text-gray-600 leading-relaxed italic text-lg border-l-4 border-indigo-200 pl-6">
                                        "{{ $kades->keterangan ?? 'Memimpin penyelenggaraan pemerintahan desa dan pembangunan untuk kesejahteraan masyarakat.' }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Grid for other members -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @php
                            $others = $perangkatDesa->filter(function($item) use ($kades) {
                                return !$kades || $item->{'profil-desa-id'} != $kades->{'profil-desa-id'};
                            });
                        @endphp

                        @foreach($others as $p)
                        <div class="bg-white rounded-3xl p-8 shadow-lg shadow-gray-200/50 border border-gray-100 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-500 group">
                            <div class="flex items-start justify-between mb-8">
                                <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-xl font-bold text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-inner">
                                    {{ strtoupper(substr($p->nama, 0, 1)) }}
                                </div>
                                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest group-hover:text-indigo-400 transition-colors">Perangkat</div>
                            </div>
                            <h4 class="text-xl font-extrabold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">{{ $p->nama }}</h4>
                            <p class="text-indigo-600 font-bold text-sm mb-4">{{ $p->jabatan }}</p>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $p->keterangan ?? 'Bertanggung jawab atas urusan sesuai bidang jabatan untuk kemajuan desa.' }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-20 bg-white rounded-[3rem] shadow-xl shadow-gray-100 border border-gray-50">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 font-medium">Data perangkat desa belum tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Map Section -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="bg-indigo-900 rounded-[3rem] overflow-hidden shadow-2xl shadow-indigo-200 flex flex-col lg:flex-row">
                    <div class="lg:w-1/3 p-12 md:p-16 text-white flex flex-col justify-center">
                        <span class="text-indigo-300 font-bold uppercase tracking-widest text-sm mb-4">Lokasi</span>
                        <h2 class="text-4xl font-extrabold mb-8 leading-tight">Geografis Wilayah</h2>

                        <div class="space-y-8">
                            <div class="flex gap-6 items-center">
                                <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center flex-shrink-0 border border-white/10">
                                    <svg class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-indigo-200 text-sm font-bold uppercase tracking-wider mb-1">Alamat Utama</p>
                                    <p class="text-white text-lg font-medium">{{ config('template.content.village_location') }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <p class="text-indigo-300 text-xs font-bold uppercase tracking-wider mb-2">Utara</p>
                                    <p class="font-bold">{{ config('template.content.borders.north', 'Desa Sukoanyar') }}</p>
                                </div>
                                <div>
                                    <p class="text-indigo-300 text-xs font-bold uppercase tracking-wider mb-2">Timur</p>
                                    <p class="font-bold">{{ config('template.content.borders.east', 'Desa Kemlagilor') }}</p>
                                </div>
                                <div>
                                    <p class="text-indigo-300 text-xs font-bold uppercase tracking-wider mb-2">Selatan</p>
                                    <p class="font-bold">{{ config('template.content.borders.south', 'Desa Sukorejo') }}</p>
                                </div>
                                <div>
                                    <p class="text-indigo-300 text-xs font-bold uppercase tracking-wider mb-2">Barat</p>
                                    <p class="font-bold">{{ config('template.content.borders.west', 'Desa Balun') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-2/3 h-[500px] lg:h-auto">
                        <iframe
                            src="{{ config('template.content.map_embed_url') }}"
                            width="100%" height="100%" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="opacity-90 grayscale-[0.2] contrast-[1.1]">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Detail Penduduk -->
    <div id="pendudukModalNew" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-slate-900/60 backdrop-blur-sm transition-all duration-300">
        <div class="relative p-4 w-full max-w-2xl max-h-[90vh]">
            <div class="relative bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 transform transition-all duration-500 scale-100">
                <!-- Header -->
                <div class="bg-indigo-600 px-8 py-10 text-white relative">
                    <div class="absolute top-0 right-0 p-10 opacity-10">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-widest mb-3">Arsip Kependudukan</span>
                            <h3 id="modalNewNamaHeader" class="text-3xl font-extrabold tracking-tight">Detail Penduduk</h3>
                        </div>
                        <button onclick="closeModalNew()" class="w-12 h-12 bg-white/10 hover:bg-white/20 rounded-2xl flex items-center justify-center transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="p-8 md:p-10 bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Nama Lengkap</label>
                                <p id="modalNewNama" class="text-gray-900 font-bold text-lg leading-tight">-</p>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Jenis Kelamin</label>
                                <p id="modalNewJenisKelamin" class="text-gray-900 font-bold text-lg leading-tight">-</p>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Tempat & Tgl Lahir</label>
                                <p class="text-gray-900 font-bold text-lg leading-tight">
                                    <span id="modalNewTempatLahir">-</span>, <span id="modalNewTanggalLahir">-</span>
                                </p>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Usia</label>
                                <p id="modalNewUsia" class="text-gray-900 font-bold text-lg leading-tight">-</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Domisili</label>
                                <p class="text-gray-900 font-bold text-lg leading-tight">
                                    <span id="modalNewDusun" class="block text-indigo-600">-</span>
                                    <span id="modalNewAlamat" class="block text-sm text-gray-500 mt-1">-</span>
                                    <span id="modalNewRtRw" class="block text-sm text-gray-500">-</span>
                                </p>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Pekerjaan & Pendidikan</label>
                                <p class="text-gray-900 font-bold text-lg leading-tight">
                                    <span id="modalNewPekerjaan" class="block">-</span>
                                    <span id="modalNewPendidikan" class="block text-sm text-gray-500 mt-1">-</span>
                                </p>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5 group-hover:text-indigo-600 transition-colors">Agama & Status</label>
                                <p class="text-gray-900 font-bold text-lg leading-tight">
                                    <span id="modalNewAgama" class="block">-</span>
                                    <span id="modalNewStatusPerkawinan" class="block text-sm text-gray-500 mt-1">-</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <button onclick="closeModalNew()" class="w-full py-4 bg-gray-50 hover:bg-gray-100 text-gray-900 font-bold rounded-2xl transition-all duration-200 border border-gray-100">
                            Tutup Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        function showPendudukDetailNew(nama, jenisKelamin, alamat, rtRw, dusun, tempatLahir, tanggalLahir, agama, statusPerkawinan, pekerjaan, pendidikan, usia) {
            document.getElementById('modalNewNamaHeader').textContent = nama || 'Detail Penduduk';
            document.getElementById('modalNewNama').textContent = nama || '-';
            document.getElementById('modalNewJenisKelamin').textContent = jenisKelamin || '-';
            document.getElementById('modalNewTempatLahir').textContent = tempatLahir || '-';
            document.getElementById('modalNewTanggalLahir').textContent = tanggalLahir || '-';
            document.getElementById('modalNewUsia').textContent = usia ? usia + ' Tahun' : '-';
            document.getElementById('modalNewAlamat').textContent = alamat || '-';
            document.getElementById('modalNewRtRw').textContent = rtRw || '-';
            document.getElementById('modalNewDusun').textContent = dusun || '-';
            document.getElementById('modalNewAgama').textContent = agama || '-';
            document.getElementById('modalNewStatusPerkawinan').textContent = statusPerkawinan || '-';
            document.getElementById('modalNewPekerjaan').textContent = pekerjaan || '-';
            document.getElementById('modalNewPendidikan').textContent = pendidikan || '-';

            const modal = document.getElementById('pendudukModalNew');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';

            // Trigger animation
            setTimeout(() => {
                modal.querySelector('.relative.bg-white').classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModalNew() {
            const modal = document.getElementById('pendudukModalNew');
            modal.querySelector('.relative.bg-white').classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        window.addEventListener('click', function(event) {
            const modal = document.getElementById('pendudukModalNew');
            if (event.target === modal) {
                closeModalNew();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModalNew();
            }
        });
    </script>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
@endsection
