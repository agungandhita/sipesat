@extends('frontend.layouts.main')

@section('container')
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div class="px-4 py-4 sm:px-6 md:flex md:justify-between md:items-center border-b border-gray-200">
                        <div>
                            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                                Riwayat Pengajuan Surat
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Daftar semua pengajuan surat yang telah Anda ajukan
                            </p>
                        </div>
                    </div>

                    <!-- Responsive Table Container -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                            No
                                        </span>
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                            Jenis Surat
                                        </span>
                                    </th>
                                    <th scope="col" class="hidden sm:table-cell px-3 sm:px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                            Tanggal
                                        </span>
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-start">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                            Status
                                        </span>
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-end">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                            Aksi
                                        </span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse($pengajuan ?? [] as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 sm:px-6 py-3">
                                        <span class="text-sm text-gray-600">
                                            {{ $loop->iteration }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-3">
                                        <span class="text-sm text-gray-600">
                                            {{ $p->jenis_surat }}
                                        </span>
                                    </td>
                                    <td class="hidden sm:table-cell px-3 sm:px-6 py-3">
                                        <span class="text-sm text-gray-600">
                                            {{ $p->created_at->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-3">
                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium
                                            @if($p->status == 'diproses') bg-yellow-100 text-yellow-800
                                            @elseif($p->status == 'diterima') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-3">
                                        <div class="flex justify-end gap-2">
                                            <button type="button" 
                                                class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                <span class="hidden sm:inline">Detail</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>
                                            @if($p->status == 'diterima')
                                            <button type="button" 
                                                class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-blue-600 bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                <span class="hidden sm:inline">Unduh</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-3 sm:px-6 py-3 text-center">
                                        <span class="text-sm text-gray-600">
                                            Belum ada pengajuan surat
                                        </span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer -->
                    <div class="px-4 py-4 sm:px-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
                            <div class="w-full sm:w-auto">
                                <p class="text-sm text-gray-600">
                                    Menampilkan
                                    <span class="font-semibold text-gray-800">{{ $pengajuan->firstItem() ?? 0 }}</span>
                                    sampai
                                    <span class="font-semibold text-gray-800">{{ $pengajuan->lastItem() ?? 0 }}</span>
                                    dari
                                    <span class="font-semibold text-gray-800">{{ $pengajuan->total() ?? 0 }}</span>
                                    pengajuan
                                </p>
                            </div>
                            <div class="w-full sm:w-auto">
                                {{ $pengajuan->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
