@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gradient-to-b from-white to-blue-50 text-black min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0">
                    <path fill="currentColor" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container mx-auto px-6 py-16 relative z-10">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                        <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">Desa Gedongboyountung</h1>
                        <p class="text-xl md:text-2xl opacity-90">Kecamatan Turi, Kabupaten Lamongan, Provinsi Jawa Timur</p>
                    </div>
                    <div class="md:w-1/2 flex justify-center">
                        <div class="bg-white p-3 rounded-full shadow-xl">
                            <img src="{{ asset('img/lamongan.png') }}" alt="logo" class="w-40 md:w-64 h-auto" />
                        </div>
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
                            Mewujudkan pelayanan masyarakat yang profesional dan transparan demi kemajuan dan kesejahteraan masyarakat Desa Gedong Boyo untung.
                        </p>
                    </div>
                    <div class="md:w-1/2 p-8 md:p-12">
                        <div class="relative mb-6">
                            <h2 class="text-3xl md:text-4xl font-bold text-blue-800">Misi</h2>
                            <div class="absolute bottom-0 left-0 w-16 h-1 bg-blue-600 rounded-full"></div>
                        </div>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Meningkatkan kualitas pelayanan masyarakat yang profesional, mudah diakses, dan transparan.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Mendorong pembangunan infrastruktur desa untuk mendukung kemajuan ekonomi dan sosial masyarakat.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Mengembangkan potensi sumber daya manusia dan sumber daya alam untuk kesejahteraan bersama.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Mewujudkan lingkungan desa yang bersih, aman, dan nyaman sebagai tempat tinggal yang ideal.</span>
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
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Kenali lebih dekat para pemimpin dan pengurus Desa Gedongboyountung yang bekerja untuk kemajuan dan kesejahteraan masyarakat.</p>
            </div>

            <!-- Kepala Desa -->
            <div class="max-w-4xl mx-auto mb-16">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all hover:shadow-xl">
                    <div class="p-8 text-center">
                        <div class="inline-block p-2 rounded-full bg-blue-100 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Moh Naufal Al Bardany</h3>
                        <p class="text-blue-600 font-medium mt-1">Kepala Desa (Kades)</p>
                        <div class="w-16 h-1 bg-blue-600 mx-auto my-4 rounded-full"></div>
                        <p class="text-gray-600">Memimpin penyelenggaraan pemerintahan desa dan pembangunan untuk kesejahteraan masyarakat.</p>
                    </div>
                </div>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kasi Section -->
                <div class="col-span-full mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Kepala Seksi (Kasi)</h3>
                </div>

                <!-- Kasi Cards -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zainul</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Pemerintahan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan pemerintahan desa.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mujianto</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Kemasyarakatan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan kemasyarakatan desa.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Nur Kholidah</h4>
                        <p class="text-blue-600 text-sm font-medium mb-3">Kasi Pelayanan</p>
                        <p class="text-gray-600 text-sm">Bertanggung jawab atas urusan pelayanan masyarakat desa.</p>
                    </div>
                </div>

                <!-- Kasun Section -->
                <div class="col-span-full mt-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Kepala Dusun (Kasun)</h3>
                </div>

                <!-- Kasun Cards -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Sholikhan</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Gedong</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Akhmad Zaini</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Klari</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Sukandar</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Dampet</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mokhamad Saiful Buchori</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Mlanggeng</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Askari</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Boyosari</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Mujianto</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Nataan PJ</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Suut</h4>
                        <p class="text-blue-600 text-sm font-medium">Kasun Ngujungjobo</p>
                    </div>
                </div>

                <!-- Sekdes & Kaur Section -->
                <div class="col-span-full mt-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-700 mb-6 border-l-4 border-blue-600 pl-3">Sekretaris Desa & Kepala Urusan</h3>
                </div>

                <!-- Sekdes & Kaur Cards -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zainul</h4>
                        <p class="text-blue-600 text-sm font-medium">Sekdes PJ</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Hartini</h4>
                        <p class="text-blue-600 text-sm font-medium">Kaur Keuangan</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Zakaria</h4>
                        <p class="text-blue-600 text-sm font-medium">Kaur Perencanaan</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all hover:shadow-lg hover:-translate-y-1">
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
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Lokasi geografis Desa Gedongboyountung, Kecamatan Turi, Kabupaten Lamongan</p>
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
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Kecamatan:</span> Turi</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Kabupaten:</span> Lamongan</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><span class="font-medium">Provinsi:</span> Jawa Timur</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5">
                        <div class="h-full">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.125361068662!2d112.37376931789282!3d-7.046242726470318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778f5f44444445%3A0x5f5265adb9afd13e!2sGedongboyountung%2C%20Kec.%20Turi%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1706521150459!5m2!1sid!2sid"
                                width="100%"
                                height="100%"
                                style="border:0; min-height: 500px;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="rounded-r-2xl">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
