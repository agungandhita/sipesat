@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 mt-32">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Surat Keterangan Meninggal</h2>
                <a href="{{ route('meninggal.create') }}"
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
                        @forelse ($meninggals as $index => $pengajuan)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + $meninggals->firstItem() }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $pengajuan->meninggal->nama_almarhum }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->meninggal->nik_almarhum }}</td>
                                <td class="px-6 py-4">{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $pengajuan->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($pengajuan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="showDetail({{ $pengajuan->pengajuan_id }})" 
                                        class="text-blue-600 hover:underline">Detail</button>
                                    <a href="{{ route('meninggal.download', $pengajuan->pengajuan_id) }}" 
                                        class="text-green-600 hover:underline ml-3">Download PDF</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b">
                                <td colspan="6" class="px-6 py-4 text-center">Tidak ada data surat keterangan kematian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $meninggals->links() }}
            </div>
        </div>
    
        <!-- Modal -->
        <div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-xl font-semibold text-gray-900">Detail Surat Keterangan Kematian</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
        fetch(`/admin/surat-keterangan-meninggal/${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            const modal = document.getElementById('detailModal');
            const content = document.getElementById('modalContent');
            
            content.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-3">
                        <div>
                            <h4 class="font-medium text-gray-500">Data Almarhum</h4>
                            <div class="border rounded-lg p-3 space-y-2">
                                <p><span class="font-medium">Nama:</span> ${data.meninggal.nama_almarhum}</p>
                                <p><span class="font-medium">NIK:</span> ${data.meninggal.nik_almarhum}</p>
                                <p><span class="font-medium">Tempat/Tgl Lahir:</span> ${data.meninggal.tempat_lahir_almarhum}, ${data.meninggal.tanggal_lahir_almarhum}</p>
                                <p><span class="font-medium">Jenis Kelamin:</span> ${data.meninggal.jenis_kelamin}</p>
                                <p><span class="font-medium">Agama:</span> ${data.meninggal.agama}</p>
                                <p><span class="font-medium">Pekerjaan:</span> ${data.meninggal.pekerjaan_almarhum}</p>
                                <p><span class="font-medium">Alamat:</span> ${data.meninggal.alamat_almarhum}</p>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-500">Data Kematian</h4>
                            <div class="border rounded-lg p-3 space-y-2">
                                <p><span class="font-medium">Tanggal Meninggal:</span> ${data.meninggal.tanggal_meninggal}</p>
                                <p><span class="font-medium">Sebab:</span> ${data.meninggal.sebab_meninggal}</p>
                                <p><span class="font-medium">Tempat:</span> ${data.meninggal.tempat_meninggal}</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <h4 class="font-medium text-gray-500">Data Pelapor</h4>
                            <div class="border rounded-lg p-3 space-y-2">
                                <p><span class="font-medium">Nama:</span> ${data.meninggal.nama_pelapor}</p>
                                <p><span class="font-medium">NIK:</span> ${data.meninggal.nik_pelapor}</p>
                                <p><span class="font-medium">Tempat/Tgl Lahir:</span> ${data.meninggal.tempat_lahir_pelapor}, ${data.meninggal.tanggal_lahir_pelapor}</p>
                                <p><span class="font-medium">Jenis Kelamin:</span> ${data.meninggal.jenis_kelamin_pelapor}</p>
                                <p><span class="font-medium">Alamat:</span> ${data.meninggal.alamat_pelapor}</p>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-500">Info Surat</h4>
                            <div class="border rounded-lg p-3 space-y-2">
                                <p><span class="font-medium">Nomor Surat:</span> ${data.arsip.nomor_surat}</p>
                                <p><span class="font-medium">Tanggal Surat:</span> ${data.arsip.tanggal_surat}</p>
                                <p><span class="font-medium">Status:</span> 
                                    <span class="px-2 py-1 rounded-full text-xs font-medium ${data.pengajuan.status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                                        ${data.pengajuan.status}
                                    </span>
                                </p>
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
