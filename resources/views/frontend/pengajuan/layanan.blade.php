@extends('frontend.layouts.main')

@section('container')
    <!-- Services Section -->
    <div class="bg-gradient-to-b from-white to-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Layanan Pengajuan Surat</h1>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full mb-6"></div>
                <p class="max-w-2xl mx-auto text-gray-600 text-lg">Pilih jenis layanan pengajuan surat yang Anda butuhkan. Kami siap membantu dengan proses yang cepat dan mudah.</p>
            </div>

            <!-- Services Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- SKTM Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                    <a href="{{ route('form.sktm') }}" class="block">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center p-6">
                                <img class="h-32 w-32 object-contain transition-transform duration-300 group-hover:scale-110" 
                                    src="{{ asset('img/lamongan.png') }}" alt="SKTM">
                            </div>
                            <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Surat Keterangan Tidak Mampu</h3>
                            <p class="text-gray-600 mb-4">Surat keterangan untuk warga yang membutuhkan bukti tidak mampu secara ekonomi.</p>
                            <div class="flex items-center text-blue-600 font-medium">
                                <span>Ajukan Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Domisili Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                    <a href="{{ route('form.domisili') }}" class="block">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-r from-green-500 to-green-600 flex items-center justify-center p-6">
                                <img class="h-32 w-32 object-contain transition-transform duration-300 group-hover:scale-110" 
                                    src="{{ asset('img/lamongan.png') }}" alt="Domisili">
                            </div>
                            <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Surat Keterangan Domisili</h3>
                            <p class="text-gray-600 mb-4">Surat keterangan resmi yang menyatakan tempat tinggal atau domisili seseorang.</p>
                            <div class="flex items-center text-green-600 font-medium">
                                <span>Ajukan Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Meninggal Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                    <a href="{{ route('form.suket-meninggal') }}" class="block">
                        <div class="relative">
                            <div class="h-48 bg-gradient-to-r from-purple-500 to-purple-600 flex items-center justify-center p-6">
                                <img class="h-32 w-32 object-contain transition-transform duration-300 group-hover:scale-110" 
                                    src="{{ asset('img/lamongan.png') }}" alt="Meninggal">
                            </div>
                            <div class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Surat Keterangan Meninggal</h3>
                            <p class="text-gray-600 mb-4">Surat keterangan resmi yang menyatakan bahwa seseorang telah meninggal dunia.</p>
                            <div class="flex items-center text-purple-600 font-medium">
                                <span>Ajukan Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Info Section -->
            <div class="mt-16 bg-white rounded-xl shadow-md p-8">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/4 mb-6 md:mb-0 flex justify-center">
                        <div class="bg-blue-100 rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="md:w-3/4 md:pl-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Informasi Pengajuan</h3>
                        <p class="text-gray-600 mb-4">Untuk pengajuan surat, pastikan Anda telah menyiapkan dokumen pendukung yang diperlukan. Proses pengajuan akan diverifikasi oleh petugas desa dan hasilnya dapat Anda pantau melalui halaman riwayat.</p>
                        <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-600">
                            <p class="text-blue-800 font-medium">Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi kantor desa pada jam kerja atau melalui kontak yang tersedia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
