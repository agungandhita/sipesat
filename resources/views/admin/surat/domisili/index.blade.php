@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 mt-32">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Surat Keterangan Domisili</h2>
                <a href="{{ route('domisili.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Buat Surat Baru
                </a>
            </div>

            <div class="mb-6">
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Cari surat..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Pengajuan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($domisilis as $domisili)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $domisili->domisili->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $domisili->domisili->nik }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $domisili->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if ($domisili->status === 'approved') bg-green-100 text-green-800
                                        @elseif($domisili->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($domisili->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="showDetail({{ $domisili->pengajuan_id }})"
                                            class="text-blue-600 hover:text-blue-900">Detail</button>

                                        <a href="{{ route('domisili.download', $domisili->pengajuan_id) }}"
                                            class="text-green-600 hover:text-green-900">Download PDF</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $domisilis->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-[120]">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-xl font-semibold text-gray-900">Detail Surat Keterangan Domisili</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div id="modalContent" class="space-y-4">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showDetail(id) {
            fetch(`/admin/surat-keterangan-domisili/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const modal = document.getElementById('detailModal');
                    const content = document.getElementById('modalContent');

                    function formatDate(dateString) {
                        if (!dateString) return '';
                        const datePart = dateString.split('T')[0];
                        if (!datePart) return dateString;

                        const [year, month, day] = datePart.split('-');
                        return `${day}-${month}-${year}`;
                    }

                    content.innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <div>
                                    <h4 class="font-medium text-gray-500">Data Pemohon</h4>
                                    <div class="border rounded-lg p-3 space-y-2">
                                        <p><span class="font-medium">Nama:</span> ${data.domisili.nama}</p>
                                        <p><span class="font-medium">NIK:</span> ${data.domisili.nik}</p>
                                        <p><span class="font-medium">Tempat/Tgl Lahir:</span> ${data.domisili.tempat_lahir}, ${formatDate(data.domisili.tanggal_lahir)}</p>
                                        <p><span class="font-medium">Pekerjaan:</span> ${data.domisili.pekerjaan || '-'}</p>
                                        <p><span class="font-medium">Alamat:</span> ${data.domisili.alamat}</p>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-500">Keterangan Domisili</h4>
                                    <div class="border rounded-lg p-3 space-y-2">
                                        <p><span class="font-medium">Keterangan:</span> ${data.domisili.keterangan}</p>
                                        <p><span class="font-medium">Keperluan:</span> ${data.domisili.keperluan}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-500">Info Surat</h4>
                                <div class="border rounded-lg p-3 space-y-2">
                                    <p><span class="font-medium">Nomor Surat:</span> ${data.arsip.nomor_surat}</p>
                                    <p><span class="font-medium">Tanggal Surat:</span> ${formatDate(data.arsip.tanggal_surat)}</p>
                                    <p><span class="font-medium">Status:</span>
                                        <span class="px-2 py-1 rounded-full text-xs font-medium ${data.pengajuan.status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                                            ${data.pengajuan.status}
                                        </span>
                                    </p>
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
