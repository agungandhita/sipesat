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
                                        <button onclick="showDetail({{ $pengajuan->pengajuan_id }})"
                                            class="text-blue-600 hover:underline">Detail</button>
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
        <!-- Modal -->
        <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-[120]">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-2/3 shadow-lg rounded-md bg-white">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h3 class="text-2xl font-semibold text-gray-900">Detail Surat Keterangan Tidak Mampu</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div id="modalContent" class="mt-4 max-h-[70vh] overflow-y-auto">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showDetail(id) {
            fetch(`/admin/sktm/${id}`, { // Perbaikan URL sesuai dengan route yang baru
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const modal = document.getElementById('detailModal');
                    const content = document.getElementById('modalContent');

                    content.innerHTML = `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="text-lg font-semibold text-blue-800 mb-3">Data Pemohon</h4>
                            <div class="space-y-3">
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Nama</span>
                                    <span class="w-2/3">: ${data.sktm.nama}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">NIK</span>
                                    <span class="w-2/3">: ${data.sktm.nik}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Tempat/Tgl Lahir</span>
                                    <span class="w-2/3">: ${data.sktm.tempat_lahir}, ${data.sktm.tanggal_lahir}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Jenis Kelamin</span>
                                    <span class="w-2/3">: ${data.sktm.jenis_kelamin}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Agama</span>
                                    <span class="w-2/3">: ${data.sktm.agama}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Pekerjaan</span>
                                    <span class="w-2/3">: ${data.sktm.pekerjaan}</span>
                                </div>
                                <div class="flex border-b border-blue-100 pb-2">
                                    <span class="font-medium w-1/3">Alamat</span>
                                    <span class="w-2/3">: ${data.sktm.alamat}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-green-50 rounded-lg p-4">
                            <h4 class="text-lg font-semibold text-green-800 mb-3">Info Surat</h4>
                            <div class="space-y-3">
                                <div class="flex border-b border-green-100 pb-2">
                                    <span class="font-medium w-1/3">Nomor Surat</span>
                                    <span class="w-2/3">: ${data.arsip.nomor_surat}</span>
                                </div>
                                <div class="flex border-b border-green-100 pb-2">
                                    <span class="font-medium w-1/3">Tanggal Surat</span>
                                    <span class="w-2/3">: ${data.arsip.tanggal_surat}</span>
                                </div>
                                <div class="flex border-b border-green-100 pb-2">
                                    <span class="font-medium w-1/3">Status</span>
                                    <span class="w-2/3">:
                                        <span class="px-2 py-1 rounded-full text-xs font-medium ${
                                            data.pengajuan.status === 'approved' ? 'bg-green-100 text-green-800' :
                                            data.pengajuan.status === 'rejected' ? 'bg-red-100 text-red-800' :
                                            'bg-yellow-100 text-yellow-800'
                                        }">
                                            ${data.pengajuan.status.toUpperCase()}
                                        </span>
                                    </span>
                                </div>
                                <div class="flex border-b border-green-100 pb-2">
                                    <span class="font-medium w-1/3">Tanggal Pengajuan</span>
                                    <span class="w-2/3">: ${new Date(data.pengajuan.created_at).toLocaleDateString('id-ID')}</span>
                                </div>
                                ${data.pengajuan.catatan_admin ? `
                                            <div class="flex border-b border-green-100 pb-2">
                                                <span class="font-medium w-1/3">Catatan Admin</span>
                                                <span class="w-2/3">: ${data.pengajuan.catatan_admin}</span>
                                            </div>
                                        ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            `;

                    modal.classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memuat data');
                });
        }

        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
@endsection
