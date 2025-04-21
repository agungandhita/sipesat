@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 mt-32">
        <div class="bg-white rounded-lg shadow-md p-5 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold text-gray-900">Daftar Surat Keterangan Tidak Mampu</h1>
                <a href="{{ route('sktm.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Buat Surat Baru
                </a>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <input type="text" placeholder="Cari surat..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">NO</th>
                            <th scope="col" class="px-6 py-3">NAMA</th>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">TANGGAL PENGAJUAN</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                            <th scope="col" class="px-6 py-3">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sktms as $index => $pengajuan)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + $sktms->firstItem() }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $pengajuan->sktm->nama }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->sktm->nik }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs font-medium
                                        {{ $pengajuan->status === 'approved'
                                            ? 'bg-green-100 text-green-800'
                                            : ($pengajuan->status === 'rejected'
                                                ? 'bg-red-100 text-red-800'
                                                : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($pengajuan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 text-sm">
                                        <a href="{{ route('sktm.show', $pengajuan->pengajuan_id) }}"
                                            class="text-blue-600 hover:underline">Detail</a>
                                        <a href="{{ route('sktm.download', $pengajuan->pengajuan_id) }}"
                                            class="text-green-600 hover:underline">Download PDF</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b">
                                <td colspan="6" class="px-6 py-4 text-center">Tidak ada data surat keterangan tidak
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
