@extends('admin.layouts.main')

@section('container')
    <div class="pt-20 pb-10">
        <!-- Dashboard Header -->
        <div class="mb-8 px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Admin</h1>
            <p class="text-gray-600">Selamat datang di Sistem Informasi Pelayanan Surat</p>
        </div>

        <!-- Stats Cards -->
        <div class="px-4 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Dokumen Card -->
                <div
                    class="bg-gradient-to-r from-yellow-300 to-yellow-400 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="bg-yellow-200 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-600" viewBox="0 0 24 24">
                                    <path
                                        d="M6 7V4C6 3.44772 6.44772 3 7 3H13.4142L15.4142 5H21C21.5523 5 22 5.44772 22 6V16C22 16.5523 21.5523 17 21 17H18V20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H6ZM6 9H4V19H16V17H6V9Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full">Dokumen</span>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Arsip Surat</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-bold text-gray-900">8</h1>
                                <span class="text-sm text-green-600 font-medium">+2 baru</span>
                            </div>
                        </div>

                        <div class="w-full bg-yellow-200 rounded-full h-2 mb-4">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 65%"></div>
                        </div>

                        <a href=""
                            class="flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                            <span>Lihat Detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Surat Masuk Card -->
                <div
                    class="bg-gradient-to-r from-blue-400 to-blue-500 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-blue-600">
                                    <path
                                        d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-blue-100 text-blue-800 px-3 py-1 rounded-full">Inbox</span>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-white">Surat Masuk</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-bold text-white">9</h1>
                                <span class="text-sm text-blue-100 font-medium">+3 hari ini</span>
                            </div>
                        </div>

                        <div class="w-full bg-blue-300 rounded-full h-2 mb-4">
                            <div class="bg-white h-2 rounded-full" style="width: 75%"></div>
                        </div>

                        <a href=""
                            class="flex items-center justify-center gap-2 bg-white hover:bg-blue-50 text-blue-600 font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                            <span>Lihat Detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Surat Keluar Card -->
                <div
                    class="bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z">
                                    </path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">Outbox</span>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-white">Surat Keluar</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-bold text-white">20</h1>
                                <span class="text-sm text-green-100 font-medium">+5 minggu ini</span>
                            </div>
                        </div>

                        <div class="w-full bg-green-300 rounded-full h-2 mb-4">
                            <div class="bg-white h-2 rounded-full" style="width: 85%"></div>
                        </div>

                        <a href=""
                            class="flex items-center justify-center gap-2 bg-white hover:bg-green-50 text-green-600 font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                            <span>Lihat Detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity & Statistics Section -->
        <div class="grid gap-8 grid-cols-1 lg:grid-cols-2 px-4">
            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
                        <button class="text-blue-500 hover:text-blue-700 text-sm font-medium">Lihat Semua</button>
                    </div>

                    <div class="space-y-5 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        <!-- Activity Item 1 -->
                        <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div class="bg-blue-100 p-2.5 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="font-medium text-gray-800">Surat Masuk Baru</h3>
                                    <span class="text-xs text-gray-500">2 jam yang lalu</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Surat dari Dinas Pendidikan telah diterima</p>
                            </div>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div class="bg-green-100 p-2.5 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="font-medium text-gray-800">Surat Keluar Terkirim</h3>
                                    <span class="text-xs text-gray-500">5 jam yang lalu</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Surat undangan rapat berhasil dikirim</p>
                            </div>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div class="bg-yellow-100 p-2.5 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h3 class="font-medium text-gray-800">Dokumen Diarsipkan</h3>
                                    <span class="text-xs text-gray-500">1 hari yang lalu</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">3 dokumen baru telah diarsipkan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Statistik Pelayanan</h2>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Filter:</span>
                            <select class="text-sm border border-gray-200 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Bulan Ini</option>
                                <option>3 Bulan Terakhir</option>
                                <option>Tahun Ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Stat Item 1 -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-medium text-gray-700">Surat Keterangan Tidak Mampu</h3>
                                <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-2 py-1 rounded-full">45%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-xs text-gray-500">Total: 15 surat</span>
                                <span class="text-xs text-green-600">+3 dari bulan lalu</span>
                            </div>
                        </div>

                        <!-- Stat Item 2 -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-medium text-gray-700">Surat Keterangan Domisili</h3>
                                <span class="text-xs font-semibold bg-green-100 text-green-800 px-2 py-1 rounded-full">65%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 65%"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-xs text-gray-500">Total: 22 surat</span>
                                <span class="text-xs text-green-600">+5 dari bulan lalu</span>
                            </div>
                        </div>

                        <!-- Stat Item 3 -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="font-medium text-gray-700">Surat Keterangan Meninggal</h3>
                                <span class="text-xs font-semibold bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">25%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: 25%"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-xs text-gray-500">Total: 8 surat</span>
                                <span class="text-xs text-red-600">-2 dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection