@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gradient-to-b from-white to-blue-50 text-black min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0">
                    <path fill="currentColor" fill-opacity="1"
                        d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
            <div class="container mx-auto px-6 py-16 relative z-10">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                        <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">Desa Gedongboyountung</h1>
                        <p class="text-xl md:text-2xl opacity-90">Kecamatan Turi, Kabupaten Lamongan, Provinsi Jawa Timur
                        </p>
                    </div>
                    <div class="md:w-1/2 flex justify-center">
                        <div class="bg-white p-3 rounded-full shadow-xl">
                            <img src="{{ asset('img/lamongan.png') }}" alt="logo" class="w-40 md:w-64 h-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Cari Data Penduduk</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Cari informasi penduduk Desa Gedongboyountung berdasarkan nama atau alamat</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <form action="{{ route('profil') }}" method="GET" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Nama Input -->
                                <div class="md:col-span-2">
                                    <label for="search" class="block mb-2 text-sm font-medium text-gray-900">Nama Penduduk</label>
                                    <input type="text"
                                           name="search"
                                           id="search"
                                           value="{{ request('search') }}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                           placeholder="Masukkan nama penduduk"
                                           autocomplete="off">
                                </div>

                                <!-- Dusun Select -->
                                <div>
                                    <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900">Dusun</label>
                                    <select id="dusun"
                                            name="dusun"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Semua Dusun</option>
                                        {{-- PERBAIKAN 2: Perbaiki loop dusun --}}
                                        @if(isset($dusunList) && $dusunList->count() > 0)
                                            @foreach ($dusunList as $dusun)
                                                <option value="{{ $dusun }}"
                                                        {{ request('dusun') == $dusun ? 'selected' : '' }}>
                                                    {{ $dusun }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Cari
                                </button>
                            </div>
                        </form>

                        {{-- PERBAIKAN 3: Perbaiki kondisi tampilan hasil --}}
                        @if (isset($penduduk) && $penduduk->count() > 0)
                            <div class="mt-8">
                                <h3 class="text-xl font-bold text-gray-800 mb-4">
                                    Hasil Pencarian ({{ $penduduk->total() }} data ditemukan)
                                </h3>
                                <div class="overflow-x-auto relative">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3 px-6">No</th>
                                                <th scope="col" class="py-3 px-6">Nama</th>
                                                <th scope="col" class="py-3 px-6">Jenis Kelamin</th>
                                                <th scope="col" class="py-3 px-6">Alamat</th>
                                                <th scope="col" class="py-3 px-6">RT/RW</th>
                                                <th scope="col" class="py-3 px-6">Dusun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penduduk as $index => $warga)
                                                <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer transition-colors duration-200"
                                                    onclick="showPendudukDetailNew(
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
                                                    )">
                                                    <td class="py-4 px-6">{{ ($penduduk->currentPage() - 1) * $penduduk->perPage() + $index + 1 }}</td>
                                                    <td class="py-4 px-6 font-medium text-gray-900">{{ $warga->nama }}</td>
                                                    <td class="py-4 px-6">{{ ucfirst($warga->jenis_kelamin) }}</td>
                                                    <td class="py-4 px-6">{{ $warga->alamat }}</td>
                                                    <td class="py-4 px-6">
                                                        @if ($warga->rt)
                                                            RT {{ $warga->rt }}
                                                        @endif
                                                        @if ($warga->rw)
                                                            / RW {{ $warga->rw }}
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6">{{ $warga->dusun }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- PERBAIKAN 4: Perbaiki pagination --}}
                                @if ($penduduk->hasPages())
                                    <div class="mt-6">
                                        {{ $penduduk->appends(request()->query())->links() }}
                                    </div>
                                @endif
                            </div>
                        @elseif(request()->has('search') || request()->has('dusun'))
                            {{-- PERBAIKAN 5: Tampilkan pesan hanya jika ada pencarian --}}
                            <div class="mt-8 p-6 text-center bg-gray-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Data Tidak Ditemukan</h4>
                                <p class="text-gray-600">
                                    Maaf, tidak ada data penduduk yang sesuai dengan kriteria pencarian Anda.
                                    <br>
                                    <small class="text-gray-500">
                                        Pencarian: "{{ request('search') }}"
                                        @if(request('dusun'))
                                            di {{ request('dusun') }}
                                        @endif
                                    </small>
                                </p>
                                <button onclick="window.location.href='{{ route('profil') }}'"
                                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Reset Pencarian
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Section -->
        <div class="container mx-auto px-6 py-16">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 bg-gradient-to-br from-blue-50 to-indigo-50 p-8 md:p-12">
                        <div class="relative mb-6">
                            <h2 class="text-3xl md:text-4xl font-bold text-blue-800">Visi</h2>
                            <div class="absolute bottom-0 left-0 w-16 h-1 bg-blue-600 rounded-full"></div>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Mewujudkan pelayanan masyarakat yang profesional dan transparan demi kemajuan dan kesejahteraan
                            masyarakat Desa Gedong Boyo untung.
                        </p>
                    </div>
                    <div class="md:w-1/2 p-8 md:p-12">
                        <div class="relative mb-6">
                            <h2 class="text-3xl md:text-4xl font-bold text-blue-800">Misi</h2>
                            <div class="absolute bottom-0 left-0 w-16 h-1 bg-blue-600 rounded-full"></div>
                        </div>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Meningkatkan kualitas pelayanan masyarakat yang profesional, mudah diakses, dan
                                    transparan.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Mendorong pembangunan infrastruktur desa untuk mendukung kemajuan ekonomi dan sosial
                                    masyarakat.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Mengembangkan potensi sumber daya manusia dan sumber daya alam untuk kesejahteraan
                                    bersama.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Mewujudkan lingkungan desa yang bersih, aman, dan nyaman sebagai tempat tinggal yang
                                    ideal.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Struktur Pemerintahan Desa</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Kenali lebih dekat para pemimpin dan pengurus Desa
                    Gedongboyountung yang bekerja untuk kemajuan dan kesejahteraan masyarakat.</p>
            </div>

            <!-- Kepala Desa -->
            <div class="max-w-4xl mx-auto mb-16">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all hover:shadow-xl">
                    <div class="p-8 text-center">
                        <div class="inline-block p-2 rounded-full bg-blue-100 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Moh Naufal Al Bardany</h3>
                        <p class="text-blue-600 font-medium mt-1">Kepala Desa (Kades)</p>
                        <div class="w-16 h-1 bg-blue-600 mx-auto my-4 rounded-full"></div>
                        <p class="text-gray-600">Memimpin penyelenggaraan pemerintahan desa dan pembangunan untuk
                            kesejahteraan masyarakat.</p>
                    </div>
                </div>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kasi Section -->
                <div class="col-span-full mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Kepala Seksi (Kasi)
                    </h3>
                </div>

                <!-- Kasi Cards -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zainul</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Pemerintahan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan pemerintahan desa.</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mujianto</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Kemasyarakatan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan kemasyarakatan desa.</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Nur Kholidah</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Pelayanan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan pelayanan masyarakat desa.</p>
                    </div>
                </div>

                <!-- Kasun Section -->
                <div class="col-span-full mt-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Kepala Dusun (Kasun)
                    </h3>
                </div>

                <!-- Kasun Cards -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Sholikhan</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Gedong</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Akhmad Zaini</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Klari</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Sukandar</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Dampet</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mokhamad Saiful Buchori</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Mlanggeng</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Askari</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Boyosari</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mujianto</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Nataan PJ</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Suut</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Ngujungjobo</p>
                    </div>
                </div>

                <!-- Sekdes & Kaur Section -->
                <div class="col-span-full mt-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Sekretaris Desa &
                        Kepala Urusan</h3>
                </div>

                <!-- Sekdes & Kaur Cards -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zainul</h4>
                        <p class="text-blue-600 text-sm font-medium">Sekdes PJ</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Hartini</h4>
                        <p class="text-blue-600 text-sm font-medium">Kaur Keuangan</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zakaria</h4>
                        <p class="text-blue-600 text-sm font-medium">Kaur Perencanaan</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">-</h4>
                        <p class="text-blue-600 text-sm font-medium">Kaur Umum</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Peta Lokasi Desa</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Lokasi geografis Desa Gedongboyountung, Kecamatan Turi,
                    Kabupaten Lamongan</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-2/5 p-8">
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Desa Gedongboyountung</h3>
                            <p class="text-gray-600 mb-6">Terletak di Kecamatan Turi, Kabupaten Lamongan, Provinsi Jawa Timur.</p>

                            <div class="bg-blue-50 rounded-xl p-6 mb-8">
                                <h4 class="font-bold text-blue-800 mb-4">Batas Wilayah</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <div class="w-2 h-8 bg-blue-600 rounded-full mr-3"></div>
                                        <div>
                                            <p class="font-bold text-gray-700">Utara</p>
                                            <p class="text-gray-600">Desa Sukoanyar</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-8 bg-green-600 rounded-full mr-3"></div>
                                        <div>
                                            <p class="font-bold text-gray-700">Timur</p>
                                            <p class="text-gray-600">Desa Kemlagilor</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-8 bg-yellow-600 rounded-full mr-3"></div>
                                        <div>
                                            <p class="font-bold text-gray-700">Selatan</p>
                                            <p class="text-gray-600">Desa Sukorejo</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-8 bg-red-600 rounded-full mr-3"></div>
                                        <div>
                                            <p class="font-bold text-gray-700">Barat</p>
                                            <p class="text-gray-600">Desa Balun</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl">
                                <h4 class="font-bold text-green-800 mb-3">Informasi Wilayah</h4>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Kecamatan:</span>
                                            Turi</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Kabupaten:</span>
                                            Lamongan</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Provinsi:</span> Jawa
                                            Timur</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5">
                        <div class="h-full">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.125361068662!2d112.37376931789282!3d-7.046242726470318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778f5f44444445%3A0x5f5265adb9afd13e!2sGedongboyountung%2C%20Kec.%20Turi%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1706521150459!5m2!1sid!2sid"
                                width="100%" height="100%" style="border:0; min-height: 500px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-r-2xl">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

        <!-- Modal Detail Penduduk Baru --}}
        <div id="pendudukModalNew" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Detail Data Penduduk
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="pendudukModalNew" onclick="closeModalNew()">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Nama Lengkap</label>
                                <div id="modalNewNama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Jenis Kelamin</label>
                                <div id="modalNewJenisKelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Tempat Lahir</label>
                                <div id="modalNewTempatLahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Tanggal Lahir</label>
                                <div id="modalNewTanggalLahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Usia -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Usia</label>
                                <div id="modalNewUsia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Alamat</label>
                                <div id="modalNewAlamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- RT/RW -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">RT/RW</label>
                                <div id="modalNewRtRw" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Dusun -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Dusun</label>
                                <div id="modalNewDusun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Agama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Agama</label>
                                <div id="modalNewAgama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Status Perkawinan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Status Perkawinan</label>
                                <div id="modalNewStatusPerkawinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Pekerjaan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Pekerjaan</label>
                                <div id="modalNewPekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>

                            <!-- Pendidikan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Pendidikan</label>
                                <div id="modalNewPendidikan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 w-full">
                                    -
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                            <button type="button" onclick="closeModalNew()"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript untuk Modal Baru -->
        <script>
            function showPendudukDetailNew(nama, jenisKelamin, alamat, rtRw, dusun, tempatLahir, tanggalLahir, agama, statusPerkawinan, pekerjaan, pendidikan, usia) {
                // Escape HTML untuk keamanan
                function escapeHtml(text) {
                    if (!text) return '-';
                    var map = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#039;'
                    };
                    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
                }

                document.getElementById('modalNewNama').textContent = nama || '-';
                document.getElementById('modalNewJenisKelamin').textContent = jenisKelamin || '-';
                document.getElementById('modalNewTempatLahir').textContent = tempatLahir || '-';
                document.getElementById('modalNewTanggalLahir').textContent = tanggalLahir || '-';
                document.getElementById('modalNewUsia').textContent = usia ? usia + ' tahun' : '-';
                document.getElementById('modalNewAlamat').textContent = alamat || '-';
                document.getElementById('modalNewRtRw').textContent = rtRw || '-';
                document.getElementById('modalNewDusun').textContent = dusun || '-';
                document.getElementById('modalNewAgama').textContent = agama || '-';
                document.getElementById('modalNewStatusPerkawinan').textContent = statusPerkawinan || '-';
                document.getElementById('modalNewPekerjaan').textContent = pekerjaan || '-';
                document.getElementById('modalNewPendidikan').textContent = pendidikan || '-';

                // Tampilkan modal
                const modal = document.getElementById('pendudukModalNew');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                // Prevent body scroll when modal is open
                document.body.style.overflow = 'hidden';
            }

            function closeModalNew() {
                const modal = document.getElementById('pendudukModalNew');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Restore body scroll when modal is closed
                document.body.style.overflow = 'auto';
            }

            // Menutup modal jika user mengklik di luar modal
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('pendudukModalNew');
                if (event.target === modal) {
                    closeModalNew();
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeModalNew();
                }
            });
        </script>
@endsection

{{-- Hapus atau komentar modal lama jika tidak digunakan lagi --}}
{{-- <!-- Modal Detail Penduduk -->
        <div id="pendudukModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Modal panel -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Detail Penduduk</h3>
                                <div class="border-t border-gray-200 pt-4">
                                    <dl class="divide-y divide-gray-200">
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalNama">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Jenis Kelamin</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalJenisKelamin">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalTtl">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Usia</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalUsia">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalAlamat">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">RT/RW</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalRtRw">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Dusun</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalDusun">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Agama</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalAgama">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Status Perkawinan</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalStatusPerkawinan">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Pekerjaan</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalPekerjaan">-</dd>
                                        </div>
                                        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                                            <dt class="text-sm font-medium text-gray-500">Pendidikan</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" id="modalPendidikan">-</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="closeModal()"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript untuk Modal -->
        <script>
            function showPendudukDetail(nama, jenisKelamin, alamat, rtRw, dusun, tempatLahir, tanggalLahir, agama, statusPerkawinan, pekerjaan, pendidikan, usia) {
                // Escape HTML untuk keamanan
                function escapeHtml(text) {
                    var map = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#039;'
                    };
                    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
                }

                document.getElementById('modalNama').textContent = nama || '-';
                document.getElementById('modalJenisKelamin').textContent = jenisKelamin || '-';
                document.getElementById('modalTtl').textContent = (tempatLahir || '') + (tanggalLahir ? ', ' + tanggalLahir : '') || '-';
                document.getElementById('modalUsia').textContent = usia ? usia + ' tahun' : '-';
                document.getElementById('modalAlamat').textContent = alamat || '-';
                document.getElementById('modalRtRw').textContent = rtRw || '-';
                document.getElementById('modalDusun').textContent = dusun || '-';
                document.getElementById('modalAgama').textContent = agama || '-';
                document.getElementById('modalStatusPerkawinan').textContent = statusPerkawinan || '-';
                document.getElementById('modalPekerjaan').textContent = pekerjaan || '-';
                document.getElementById('modalPendidikan').textContent = pendidikan || '-';

                document.getElementById('pendudukModal').classList.remove('hidden');
                // Prevent body scroll when modal is open
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                document.getElementById('pendudukModal').classList.add('hidden');
                // Restore body scroll when modal is closed
                document.body.style.overflow = 'auto';
            }

            // Menutup modal jika user mengklik di luar modal
            window.onclick = function(event) {
                const modal = document.getElementById('pendudukModal');
                if (event.target === modal) {
                    closeModal();
                }
            }

            // Keyboard navigation
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeModal();
                }
            });
        </script>
