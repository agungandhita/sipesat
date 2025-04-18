@extends('admin.layouts.main')

@section('container')
    <div class="pt-20 pb-10 px-4">
        <div class="bg-white rounded-lg shadow-md p-5 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold text-gray-900">Daftar Surat Keterangan Tidak Mampu</h1>
                <a href="{{ route('sktm.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Tambah Baru
                </a>
            </div>

            <!-- Search Form -->
            <form action="{{ route('sktm.index') }}" method="GET" class="mb-4">
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="flex-1">
                        <input type="text" name="nama" value="{{ request('nama') }}"
                            placeholder="Cari berdasarkan nama..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="nik" value="{{ request('nik') }}"
                            placeholder="Cari berdasarkan NIK..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Cari
                        </button>
                    </div>
                </div>
            </form>

            <!-- Table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Keperluan</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sktms as $index => $pengajuan)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + $sktms->firstItem() }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $pengajuan->sktm->nama }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->sktm->nik }}</td>
                                <td class="px-6 py-4">{{ Str::limit($pengajuan->sktm->alamat, 30) }}</td>
                                <td class="px-6 py-4">{{ Str::limit($pengajuan->sktm->keperluan, 30) }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->created_at->format('d-m-Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('sktm.show', $pengajuan->pengajuan_id) }}"
                                            class="text-blue-600 hover:underline" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('sktm.edit', $pengajuan->pengajuan_id) }}"
                                            class="text-yellow-600 hover:underline" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('sktm.download', $pengajuan->pengajuan_id) }}"
                                            class="text-green-600 hover:underline" title="Download" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('sktm.destroy', $pengajuan->pengajuan_id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                            class="inline">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:underline" title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b">
                                <td colspan="7" class="px-6 py-4 text-center">Tidak ada data surat keterangan tidak
                                    mampu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $sktms->links() }}
            </div>
        </div>
    </div>
@endsection
