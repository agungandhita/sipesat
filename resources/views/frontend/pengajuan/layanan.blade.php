@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-12 border-b border-gray-200 pb-8">
                <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Layanan Pengajuan Surat</h1>
                <p class="mt-4 text-lg text-gray-600">Pilih jenis layanan surat yang Anda butuhkan. Proses pengajuan dilakukan secara daring untuk kenyamanan Anda.</p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- SKTM Card -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden transition-all duration-200 hover:border-blue-500 hover:shadow-sm flex flex-col">
                    <div class="p-8 flex-grow">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Surat Keterangan Tidak Mampu</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">Untuk warga yang membutuhkan bukti keterangan kondisi ekonomi kurang mampu untuk keperluan administrasi.</p>
                    </div>
                    <div class="px-8 pb-8">
                        <a href="{{ route('form.sktm') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Ajukan Surat
                        </a>
                    </div>
                </div>

                <!-- Domisili Card -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden transition-all duration-200 hover:border-blue-500 hover:shadow-sm flex flex-col">
                    <div class="p-8 flex-grow">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Surat Keterangan Domisili</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">Surat keterangan resmi yang menyatakan tempat tinggal atau domisili penduduk di wilayah desa ini.</p>
                    </div>
                    <div class="px-8 pb-8">
                        <a href="{{ route('form.domisili') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Ajukan Surat
                        </a>
                    </div>
                </div>

                <!-- Meninggal Card -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden transition-all duration-200 hover:border-blue-500 hover:shadow-sm flex flex-col">
                    <div class="p-8 flex-grow">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Surat Keterangan Meninggal</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">Layanan pengajuan surat keterangan kematian bagi warga yang telah meninggal dunia untuk keperluan administrasi.</p>
                    </div>
                    <div class="px-8 pb-8">
                        <a href="{{ route('form.suket-meninggal') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Ajukan Surat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Guidelines Section -->
            <div class="mt-16 bg-white border border-gray-200 rounded-lg p-8">
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Informasi Penting</h3>
                        <ul class="space-y-3 text-gray-600 list-disc pl-5">
                            <li>Pastikan data yang Anda masukkan sesuai dengan Kartu Keluarga (KK) dan KTP.</li>
                            <li>Lengkapi semua persyaratan dokumen yang diminta untuk mempercepat proses verifikasi.</li>
                            <li>Waktu pengerjaan surat bergantung pada antrean dan kelengkapan berkas Anda.</li>
                            <li>Anda dapat memantau status pengajuan melalui halaman riwayat atau profil Anda.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
