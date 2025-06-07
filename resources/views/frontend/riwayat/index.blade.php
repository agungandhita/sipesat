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
                                                    <button type="button" onclick="openModal('detailModal{{ $p->pengajuan_id }}')"
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

    @forelse($pengajuan as $p)
        <!-- Modal Approve -->
        <div id="approveModal{{ $p->pengajuan_id }}"
            class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Konfirmasi Persetujuan
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            onclick="closeModal('approveModal{{ $p->pengajuan_id }}')">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action="{{ route('pengajuan.approve', $p->pengajuan_id) }}" method="POST">
                            @csrf
                            <p class="text-sm text-gray-500 mb-4">
                                Apakah Anda yakin ingin menyetujui pengajuan surat ini?
                            </p>
                            <div class="mb-4">
                                <label for="catatan_admin{{ $p->pengajuan_id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                    Catatan Admin (opsional)
                                </label>
                                <textarea id="catatan_admin{{ $p->pengajuan_id }}" name="catatan_admin" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Tambahkan catatan jika diperlukan"></textarea>
                            </div>

                            <!-- Modal footer -->
                            <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                                <button type="submit"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Setujui</button>
                                <button type="button" onclick="closeModal('approveModal{{ $p->pengajuan_id }}')"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Reject -->
        <div id="rejectModal{{ $p->pengajuan_id }}"
            class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Konfirmasi Penolakan
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            onclick="closeModal('rejectModal{{ $p->pengajuan_id }}')">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action="{{ route('pengajuan.reject', $p->pengajuan_id) }}" method="POST">
                            @csrf
                            <p class="text-sm text-gray-500 mb-4">
                                Apakah Anda yakin ingin menolak pengajuan surat ini?
                            </p>
                            <div class="mb-4">
                                <label for="alasan_penolakan{{ $p->pengajuan_id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                    Catatan Admin <span class="text-red-600">*</span>
                                </label>
                                <textarea id="alasan_penolakan{{ $p->pengajuan_id }}" name="catatan_admin" rows="3" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Berikan alasan penolakan"></textarea>
                            </div>

                            <!-- Modal footer -->
                            <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                                <button type="submit"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tolak</button>
                                <button type="button" onclick="closeModal('rejectModal{{ $p->pengajuan_id }}')"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail -->
        <div id="detailModal{{ $p->pengajuan_id }}"
            class="hidden flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Detail Pengajuan
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            onclick="closeModal('detailModal{{ $p->pengajuan_id }}')">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Nama Pemohon</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $p->user->nama }}</dd>
                            </div>
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Jenis Surat</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ ucfirst($p->jenis_surat) }}</dd>
                            </div>
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Tanggal Pengajuan</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $p->created_at->format('d-m-Y H:i') }}</dd>
                            </div>
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="text-sm text-gray-900 col-span-2">
                                    @if ($p->status == 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                                    @elseif($p->status == 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                                    @elseif($p->status == 'rejected')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                    @endif
                                </dd>
                            </div>
                            @if ($p->catatan_admin)
                                <div class="py-2 grid grid-cols-3 gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Catatan Admin</dt>
                                    <dd class="text-sm text-gray-900 col-span-2">{{ $p->catatan_admin }}</dd>
                                </div>
                            @endif
                        </dl>

                        <!-- Modal footer -->
                        <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                            <button type="button" onclick="closeModal('detailModal{{ $p->pengajuan_id }}')"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
@endsection

@push('scripts')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        // Find all modals and close them if clicked outside
        const modals = document.querySelectorAll('[id*="Modal"]');
        modals.forEach(modal => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    }
</script>
@endpush
