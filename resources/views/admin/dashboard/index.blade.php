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
                                <h1 class="text-4xl font-bold text-gray-900">{{ $totalArsip }}</h1>
                                <span class="text-sm text-green-600 font-medium">
                                    @if($newArsip > 0)
                                        +{{ $newArsip }} baru
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-yellow-200 rounded-full h-2 mb-4">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: {{ min(($totalArsip / max($targetArsip, 1)) * 100, 100) }}%"></div>
                        </div>

                        <a href="{{ route('arsip') }}"
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
                                <h1 class="text-4xl font-bold text-white">{{ $totalSuratMasuk }}</h1>
                                <span class="text-sm text-blue-100 font-medium">
                                    @if($newSuratMasuk > 0)
                                        +{{ $newSuratMasuk }} hari ini
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-blue-300 rounded-full h-2 mb-4">
                            <div class="bg-white h-2 rounded-full" style="width: {{ min(($totalSuratMasuk / max($targetSuratMasuk, 1)) * 100, 100) }}%"></div>
                        </div>

                        <a href="{{ route('arsip', ['jenis_surat' => 'masuk']) }}"
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
                                <h1 class="text-4xl font-bold text-white">{{ $totalSuratKeluar }}</h1>
                                <span class="text-sm text-green-100 font-medium">
                                    @if($newSuratKeluar > 0)
                                        +{{ $newSuratKeluar }} minggu ini
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-green-300 rounded-full h-2 mb-4">
                            <div class="bg-white h-2 rounded-full" style="width: {{ min(($totalSuratKeluar / max($targetSuratKeluar, 1)) * 100, 100) }}%"></div>
                        </div>

                        <a href="{{ route('arsip', ['jenis_surat' => 'keluar']) }}"
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
                        <a href="#" class="text-blue-500 hover:text-blue-700 text-sm font-medium">Lihat Semua</a>
                    </div>

                    <div class="space-y-5 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @forelse($recentActivities as $activity)
                            <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                <div class="bg-{{ $activity->type_color }}-100 p-2.5 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-{{ $activity->type_color }}-600" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        {!! $activity->icon_path !!}
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="font-medium text-gray-800">{{ $activity->title }}</h3>
                                        <span class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $activity->description }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktivitas</h3>
                                <p class="mt-1 text-sm text-gray-500">Aktivitas terbaru akan muncul di sini.</p>
                            </div>
                        @endforelse
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
                            <select id="statisticPeriod"
                                class="text-sm border border-gray-200 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="month">Bulan Ini</option>
                                <option value="quarter">3 Bulan Terakhir</option>
                                <option value="year">Tahun Ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @forelse($statistikLayanan as $index => $stat)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="font-medium text-gray-700">{{ $stat->perihal }}</h3>
                                    <span
                                        class="text-xs font-semibold bg-{{ $statColors[$index % count($statColors)] }}-100 text-{{ $statColors[$index % count($statColors)] }}-800 px-2 py-1 rounded-full">{{ $stat->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-{{ $statColors[$index % count($statColors)] }}-600 h-2 rounded-full" style="width: {{ $stat->percentage }}%"></div>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <span class="text-xs text-gray-500">Total: {{ $stat->total }} surat</span>
                                    <span class="text-xs {{ $stat->change > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $stat->change > 0 ? '+' : '' }}{{ $stat->change }} dari periode lalu
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data statistik</h3>
                                <p class="mt-1 text-sm text-gray-500">Statistik layanan akan muncul di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('statisticPeriod').addEventListener('change', function() {
            // You can implement AJAX call here to update statistics based on selected period
            const period = this.value;
            
            // Example AJAX call
            /*
            fetch(`/admin/dashboard/statistics?period=${period}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update the statistics section with new data
                console.log(data);
            });
            */
        });
    </script>
    @endpush
@endsection
