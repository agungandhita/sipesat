@extends('admin.layouts.main')

@section('container')
    <div class="mt-14 pb-10">
        <!-- Dashboard Header -->
        <div class="mb-8 px-4">
            <div class="flex items-center gap-3 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M13 21V11H21V21H13ZM3 13V3H11V13H3ZM3 21V15H11V21H3ZM13 9V3H21V9H13ZM5 5V11H9V5H5ZM15 5V7H19V5H15ZM15 13V19H19V13H15ZM5 17V19H9V17H5Z" />
                </svg>
                <h1 class="text-3xl font-bold text-gray-800 mb-0">Dashboard Admin</h1>
            </div>
            <p class="text-gray-600 pl-11">Selamat datang di Sistem Informasi Pelayanan Surat</p>
        </div>

        <!-- Stats Cards -->
        <div class="px-4 mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Dokumen Card -->
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-amber-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-amber-600" viewBox="0 0 24 24">
                                    <path
                                        d="M6 7V4C6 3.44772 6.44772 3 7 3H13.4142L15.4142 5H21C21.5523 5 22 5.44772 22 6V16C22 16.5523 21.5523 17 21 17H18V20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H6ZM6 9H4V19H16V17H6V9Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-amber-100 text-amber-800 px-3 py-1 rounded-full">Dokumen</span>
                        </div>

                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Arsip Surat</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalArsip }}</h1>
                                <span class="text-sm text-green-600 font-medium">
                                    @if ($newArsip > 0)
                                        +{{ $newArsip }} baru
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2 mb-5">
                            <div class="bg-amber-500 h-2 rounded-full transition-all duration-500"
                                style="width: {{ min(($totalArsip / max($targetArsip, 1)) * 100, 100) }}%"></div>
                        </div>

                        <a href="{{ route('arsip') }}"
                            class="flex items-center justify-center gap-2 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-medium py-2.5 px-4 rounded-lg transition-all duration-300 hover:shadow-md">
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
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 text-blue-600">
                                    <path
                                        d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-blue-100 text-blue-800 px-3 py-1 rounded-full">Inbox</span>
                        </div>

                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Surat Masuk</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalSuratMasuk }}</h1>
                                <span class="text-sm text-blue-600 font-medium">
                                    @if ($newSuratMasuk > 0)
                                        +{{ $newSuratMasuk }} hari ini
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2 mb-5">
                            <div class="bg-blue-500 h-2 rounded-full transition-all duration-500"
                                style="width: {{ min(($totalSuratMasuk / max($targetSuratMasuk, 1)) * 100, 100) }}%"></div>
                        </div>

                        <a href="{{ route('arsip', ['jenis_surat' => 'masuk']) }}"
                            class="flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium py-2.5 px-4 rounded-lg transition-all duration-300 hover:shadow-md">
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
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-5px]">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-5">
                            <div class="bg-emerald-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-emerald-600" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z">
                                    </path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full">Outbox</span>
                        </div>

                        <div class="mb-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-1">Surat Keluar</h2>
                            <div class="flex items-end gap-2">
                                <h1 class="text-4xl font-extrabold text-gray-900">{{ $totalSuratKeluar }}</h1>
                                <span class="text-sm text-emerald-600 font-medium">
                                    @if ($newSuratKeluar > 0)
                                        +{{ $newSuratKeluar }} minggu ini
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2 mb-5">
                            <div class="bg-emerald-500 h-2 rounded-full transition-all duration-500"
                                style="width: {{ min(($totalSuratKeluar / max($targetSuratKeluar, 1)) * 100, 100) }}%">
                            </div>
                        </div>

                        <a href="{{ route('arsip', ['jenis_surat' => 'keluar']) }}"
                            class="flex items-center justify-center gap-2 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-medium py-2.5 px-4 rounded-lg transition-all duration-300 hover:shadow-md">
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
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 12C2 16.9706 6.02944 21 11 21C13.1042 21 15.0585 20.2541 16.6342 19.0251L20.5858 22.9999L22 21.5857L18.0251 17.6342C19.2541 16.0585 20 14.1042 20 12C20 7.02944 15.9706 3 11 3C6.02944 3 2 7.02944 2 12ZM4 12C4 8.13401 7.13401 5 11 5C14.866 5 18 8.13401 18 12C18 15.866 14.866 19 11 19C7.13401 19 4 15.866 4 12Z" />
                            </svg>
                            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
                        </div>
                        <a href="#"
                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center gap-1">
                            <span>Lihat Semua</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @forelse($recentActivities as $activity)
                            <div
                                class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-lg transition-colors border border-gray-100">
                                <div class="bg-{{ $activity->type_color }}-100 p-2.5 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-{{ $activity->type_color }}-600" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        {!! $activity->icon_path !!}
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold text-gray-800">{{ $activity->title }}</h3>
                                        <span
                                            class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $activity->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $activity->description }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 bg-gray-50 rounded-lg border border-dashed border-gray-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktivitas</h3>
                                <p class="mt-1 text-sm text-gray-500">Aktivitas terbaru akan muncul di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M3 3H11V11H3V3ZM3 13H11V21H3V13ZM13 3H21V11H13V3ZM13 13H21V21H13V13Z" />
                            </svg>
                            <h2 class="text-xl font-bold text-gray-800">Statistik Pelayanan</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500">Filter:</span>
                            <select id="statisticPeriod"
                                class="text-sm border border-gray-200 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white">
                                <option value="month">Bulan Ini</option>
                                <option value="quarter">3 Bulan Terakhir</option>
                                <option value="year">Tahun Ini</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-5">
                        @forelse($statistikLayanan as $index => $stat)
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="font-medium text-gray-800">{{ $stat->perihal }}</h3>
                                    <span
                                        class="text-xs font-semibold bg-{{ $statColors[$index % count($statColors)] }}-100 text-{{ $statColors[$index % count($statColors)] }}-800 px-2.5 py-1 rounded-full">{{ $stat->percentage }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-{{ $statColors[$index % count($statColors)] }}-500 h-2.5 rounded-full transition-all duration-500"
                                        style="width: {{ $stat->percentage }}%"></div>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <span class="text-xs font-medium text-gray-600">Total: {{ $stat->total }}
                                        surat</span>
                                    <span
                                        class="text-xs font-medium {{ $stat->change > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $stat->change > 0 ? '+' : '' }}{{ $stat->change }} dari periode lalu
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 bg-gray-50 rounded-lg border border-dashed border-gray-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
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
