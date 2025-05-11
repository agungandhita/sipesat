@extends('frontend.layouts.main')

@section('container')
<div class="bg-white text-black text-[15px]">
    <div class="px-4 sm:px-10 mt-1">
        @include('frontend.beranda._Jumbotron')
        
        <!-- Bagian Selamat Datang -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 px-4 sm:px-10 py-16 rounded-xl shadow-sm">
            <div class="max-w-7xl mx-auto">
                <div class="md:text-center max-w-3xl mx-auto">
                    <h2 class="md:text-4xl text-3xl font-bold mb-6 text-gray-800">Selamat Datang di <span class="text-blue-700 relative">
                        SIPESAT
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-200 opacity-50 rounded-full"></span>
                    </span></h2>
                    <p class="md:text-xl text-gray-700 leading-relaxed">SIPESAT hadir sebagai solusi terdepan dalam pelayanan administrasi Desa Gedungboyountung, Kecamatan Turi, Kabupaten Lamongan. Kami berkomitmen untuk memberikan layanan yang cepat, mudah, dan transparan bagi seluruh masyarakat.</p>
                </div>
                
                <!-- Fitur Layanan -->
                @include('frontend.beranda._hero')
            </div>
        </div>
        
        <!-- Bagian Sambutan Kepala Desa -->
        <div class="mt-16 mb-20">
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-lg">
                <!-- Header dengan gradient -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 py-6 px-8 rounded-t-2xl">
                    <h2 class="text-2xl md:text-3xl font-bold text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Sambutan Kepala Desa
                    </h2>
                </div>
                
                <!-- Konten -->
                <div class="p-6 md:p-10">
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                        <!-- Foto dengan frame dan efek -->
                        <div class="relative w-full md:w-2/5 lg:w-1/3">
                            <div class="bg-gradient-to-br from-blue-100 to-indigo-100 p-2 rounded-xl shadow-md">
                                <div class="relative overflow-hidden rounded-lg shadow-inner">
                                    <img src="{{ asset('img/kades 1.jpg') }}" alt="Kepala Desa" 
                                        class="w-full h-auto object-cover transform transition-transform duration-500 hover:scale-105" />
                                    <!-- Badge posisi -->
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-blue-900/80 to-transparent p-3">
                                        <p class="text-white text-sm font-medium">Kepala Desa Gedungboyountung</p>
                                    </div>
                                </div>
                                <!-- Dekorasi sudut -->
                                <div class="absolute -top-2 -left-2 w-8 h-8 border-t-4 border-l-4 border-blue-600 rounded-tl-lg"></div>
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 border-b-4 border-r-4 border-blue-600 rounded-br-lg"></div>
                            </div>
                        </div>
                        
                        <!-- Teks sambutan -->
                        <div class="w-full md:w-3/5 lg:w-2/3 space-y-6">
                            <div class="relative">
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 relative">
                                    <span class="relative z-10">"Membangun Masa Depan Bersama dengan Modernitas dan Keanggunan"</span>
                                    <span class="absolute bottom-0 left-0 w-full h-2 bg-blue-200 opacity-50 rounded-full"></span>
                                </h3>
                                <div class="absolute -left-6 top-0 text-6xl text-blue-100 font-serif">"</div>
                                <div class="absolute -right-6 bottom-0 text-6xl text-blue-100 font-serif">"</div>
                            </div>
                            
                            <p class="text-gray-600 leading-relaxed text-base md:text-lg relative z-10">
                                Kami dengan bangga mempersembahkan pengalaman terbaik bagi setiap warga dan tamu yang berkunjung ke Desa Gedungboyountung. Dengan semangat kebersamaan dan komitmen untuk kemajuan, kami terus berupaya menciptakan lingkungan yang nyaman, modern, dan penuh keanggunan.
                            </p>
                            
                            <div class="pt-4">
                                <a href="{{route('profil')}}" class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg hover:from-blue-700 hover:to-indigo-800 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                    <span>Lihat Profil Desa</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
