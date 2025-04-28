@extends('frontend.layouts.main')

@section('container')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="p-4 sm:p-6">
                            <h2 class="text-xl font-semibold text-gray-800">Riwayat Pengajuan Surat</h2>
                            <p class="mt-1 text-sm text-gray-600">Daftar semua pengajuan surat yang telah Anda ajukan</p>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase">Jenis
                                            Surat</th>
                                        <th
                                            class="hidden sm:table-cell px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase">
                                            Tanggal</th>
                                        <th class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status
                                        </th>
                                        <th class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase">Catatan
                                            Admin</th>
                                        <th
                                            class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase text-right">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($pengajuan as $p)
                                        <tr>
                                            <td class="px-3 sm:px-6 py-3">{{ $loop->iteration }}</td>
                                            <td class="px-3 sm:px-6 py-3 uppercase">{{ ucfirst($p->jenis_surat) }}</td>
                                            <td class="hidden sm:table-cell px-3 sm:px-6 py-3">
                                                {{ $p->created_at->format('d/m/Y') }}</td>
                                            <td class="px-3 sm:px-6 py-3">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if ($p->status == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($p->status == 'approved') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($p->status) }}
                                                </span>
                                            </td>
                                            <td class="px-3 sm:px-6 py-3">
                                                @if ($p->catatan_admin)
                                                    <p class="text-sm text-gray-600">{{ $p->catatan_admin }}</p>
                                                @else
                                                    <p class="text-sm text-gray-400">-</p>
                                                @endif
                                            </td>
                                            <td class="px-3 sm:px-6 py-3">
                                                <div class="flex justify-end gap-2">
                                                    <button type="button" onclick="showDetail('{{ $p->pengajuan_id }}')"
                                                        class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
                                                        <span class="hidden sm:inline">Detail</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                    </button>
                                                    @if ($p->status == 'approved')
                                                        @if ($p->jenis_surat == 'sktm')
                                                            <a href="{{ route('page.sktm.download', $p->pengajuan_id) }}"
                                                                class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-blue-600 bg-blue-600 text-white hover:bg-blue-700">
                                                                <span class="hidden sm:inline">Unduh</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                                </svg>
                                                            </a>
                                                        @elseif($p->jenis_surat == 'domisili')
                                                            <a href="{{ route('page.domisili.download', $p->pengajuan_id) }}"
                                                                class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-blue-600 bg-blue-600 text-white hover:bg-blue-700">
                                                                <span class="hidden sm:inline">Unduh</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                                </svg>
                                                            </a>
                                                        @elseif($p->jenis_surat == 'meninggal')
                                                            <a href="{{ route('page.meninggal.download', $p->pengajuan_id) }}"
                                                                class="py-1 px-2 sm:px-3 inline-flex items-center gap-x-1 text-xs sm:text-sm font-medium rounded-lg border border-blue-600 bg-blue-600 text-white hover:bg-blue-700">
                                                                <span class="hidden sm:inline">Unduh</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-3 sm:px-6 py-8 text-center text-sm text-gray-500">
                                                Belum ada pengajuan surat
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="px-4 py-4 sm:px-6 border-t border-gray-200">
                            {{ $pengajuan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Detail Pengajuan Surat
                            </h3>
                            <div class="mt-4">
                                <div id="modalContent" class="space-y-4">
                                    <!-- Content will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function showDetail(id) {
                // Tampilkan modal
                document.getElementById('detailModal').classList.remove('hidden');

                // Ambil data detail pengajuan
                fetch(`/pengajuan/${id}/detail`)
                    .then(response => response.json())
                    .then(data => {
                        // Format tanggal
                        const formatDate = (dateString) => {
                            if (!dateString) return '-';
                            const date = new Date(dateString);
                            return date.toLocaleDateString('id-ID', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            });
                        };

                        let content = `
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                                <p class="mt-1 text-sm text-gray-900 capitalize">${data.jenis_surat}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                                <p class="mt-1 text-sm text-gray-900">${formatDate(data.created_at)}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <p class="mt-1 text-sm text-gray-900 capitalize">${data.status}</p>
                            </div>
                            ${data.catatan_admin ? `
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Catatan Admin</label>
                                        <p class="mt-1 text-sm text-gray-900">${data.catatan_admin}</p>
                                    </div>
                                    ` : ''}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Data Pemohon</label>
                                <div class="mt-1 text-sm text-gray-900 space-y-2 border border-gray-200 rounded-md p-3">
                                    ${data.jenis_surat === 'sktm' ? `
                                                <p><span class="font-medium">Nama:</span> ${data.sktm.nama}</p>
                                                <p><span class="font-medium">NIK:</span> ${data.sktm.nik}</p>
                                                <p><span class="font-medium">Tempat Lahir:</span> ${data.sktm.tempat_lahir}</p>
                                                <p><span class="font-medium">Tanggal Lahir:</span> ${formatDate(data.sktm.tanggal_lahir)}</p>
                                                <p><span class="font-medium">Alamat:</span> ${data.sktm.alamat}</p>
                                            ` : data.jenis_surat === 'domisili' ? `
                                                <p><span class="font-medium">Nama:</span> ${data.domisili.nama}</p>
                                                <p><span class="font-medium">NIK:</span> ${data.domisili.nik}</p>
                                                <p><span class="font-medium">Alamat:</span> ${data.domisili.alamat}</p>
                                            ` : data.jenis_surat === 'meninggal' ? `
                                                <div class="border-b border-gray-200 pb-2 mb-2">
                                                    <p class="font-medium text-gray-700 mb-1">Data Almarhum:</p>
                                                    <p><span class="font-medium">Nama:</span> ${data.meninggal.nama_almarhum}</p>
                                                    <p><span class="font-medium">NIK:</span> ${data.meninggal.nik_almarhum}</p>
                                                    <p><span class="font-medium">Tempat Lahir:</span> ${data.meninggal.tempat_lahir_almarhum}</p>
                                                    <p><span class="font-medium">Tanggal Lahir:</span> ${formatDate(data.meninggal.tanggal_lahir_almarhum)}</p>
                                                </div>
                                                <div class="border-b border-gray-200 pb-2 mb-2">
                                                    <p class="font-medium text-gray-700 mb-1">Data Kematian:</p>
                                                    <p><span class="font-medium">Tanggal Meninggal:</span> ${formatDate(data.meninggal.tanggal_meninggal)}</p>
                                                    <p><span class="font-medium">Tempat Meninggal:</span> ${data.meninggal.tempat_meninggal}</p>
                                                    <p><span class="font-medium">Sebab Meninggal:</span> ${data.meninggal.sebab_meninggal}</p>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-700 mb-1">Data Pelapor:</p>
                                                    <p><span class="font-medium">Nama:</span> ${data.meninggal.nama_pelapor}</p>
                                                    <p><span class="font-medium">NIK:</span> ${data.meninggal.nik_pelapor}</p>
                                                </div>
                                            ` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                        document.getElementById('modalContent').innerHTML = content;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('modalContent').innerHTML =
                            '<p class="text-red-500">Terjadi kesalahan saat memuat data</p>';
                    });
            }

            function closeModal() {
                document.getElementById('detailModal').classList.add('hidden');
            }

            // Close modal when clicking outside
            window.onclick = function(event) {
                let modal = document.getElementById('detailModal');
                if (event.target == modal) {
                    closeModal();
                }
            }
        </script>
    @endpush
@endsection
