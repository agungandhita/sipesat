@extends('admin.layouts.main')

@section('container')
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mt-24">
        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-800">
                                Daftar Pengajuan Pembuatan Surat
                            </h2>
                        </div>

                        @if (session()->has('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-6 mt-4"
                                role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                    onclick="this.parentElement.style.display='none'">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mx-6 mt-4"
                                role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                    onclick="this.parentElement.style.display='none'">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        @if (isset($pengajuans) && count($pengajuans) > 0)
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                            Pemohon
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis
                                            Surat
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                            Pengajuan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $pengajuan->user->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $pengajuan->jenis_surat }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $pengajuan->created_at->format('d-m-Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if ($pengajuan->status == 'pending')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        Menunggu
                                                    </span>
                                                @elseif($pengajuan->status == 'approved')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        Disetujui
                                                    </span>
                                                @elseif($pengajuan->status == 'rejected')
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        Ditolak
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                <div class="flex space-x-2">
                                                    <button type="button"
                                                        onclick="openModal('detailModal{{ $pengajuan->pengajuan_id }}')"
                                                        class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Detail
                                                    </button>
                                                    @if ($pengajuan->status == 'pending')
                                                        <button type="button"
                                                            onclick="openModal('approveModal{{ $pengajuan->pengajuan_id }}')"
                                                            class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                            <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Setujui
                                                        </button>
                                                        <button type="button"
                                                            onclick="openModal('rejectModal{{ $pengajuan->pengajuan_id }}')"
                                                            class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                            <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Tolak
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Approve -->
                                        <div id="approveModal{{ $pengajuan->pengajuan_id }}"
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
                                                            onclick="closeModal('approveModal{{ $pengajuan->pengajuan_id }}')">
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
                                                        <form action="{{ route('pengajuan.approve', $pengajuan->pengajuan_id) }}" method="POST">
                                                            @csrf
                                                            <p class="text-sm text-gray-500 mb-4">
                                                                Apakah Anda yakin ingin menyetujui pengajuan surat ini?
                                                            </p>
                                                            <div class="mb-4">
                                                                <label for="catatan_admin{{ $pengajuan->pengajuan_id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                                                    Catatan Admin (opsional)
                                                                </label>
                                                                <textarea id="catatan_admin{{ $pengajuan->pengajuan_id }}" name="catatan_admin" rows="3"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                    placeholder="Tambahkan catatan jika diperlukan"></textarea>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                                                                <button type="submit"
                                                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Setujui</button>
                                                                <button type="button" onclick="closeModal('approveModal{{ $pengajuan->pengajuan_id }}')"
                                                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Reject -->
                                        <div id="rejectModal{{ $pengajuan->pengajuan_id }}"
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
                                                            onclick="closeModal('rejectModal{{ $pengajuan->pengajuan_id }}')">
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
                                                        <form action="{{ route('pengajuan.reject', $pengajuan->pengajuan_id) }}" method="POST">
                                                            @csrf
                                                            <p class="text-sm text-gray-500 mb-4">
                                                                Apakah Anda yakin ingin menolak pengajuan surat ini?
                                                            </p>
                                                            <div class="mb-4">
                                                                <label for="alasan_penolakan{{ $pengajuan->pengajuan_id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                                                    Catatan Admin <span class="text-red-600">*</span>
                                                                </label>
                                                                <textarea id="alasan_penolakan{{ $pengajuan->pengajuan_id }}" name="catatan_admin" rows="3" required
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                    placeholder="Berikan alasan penolakan"></textarea>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                                                                <button type="submit"
                                                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tolak</button>
                                                                <button type="button" onclick="closeModal('rejectModal{{ $pengajuan->pengajuan_id }}')"
                                                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Detail -->
                                        <div id="detailModal{{ $pengajuan->pengajuan_id }}"
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
                                                            onclick="closeModal('detailModal{{ $pengajuan->pengajuan_id }}')">
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
                                                                <dd class="text-sm text-gray-900 col-span-2">{{ $pengajuan->user->nama }}</dd>
                                                            </div>
                                                            <div class="py-2 grid grid-cols-3 gap-4">
                                                                <dt class="text-sm font-medium text-gray-500">Jenis Surat</dt>
                                                                <dd class="text-sm text-gray-900 col-span-2">{{ ucfirst($pengajuan->jenis_surat) }}</dd>
                                                            </div>
                                                            <div class="py-2 grid grid-cols-3 gap-4">
                                                                <dt class="text-sm font-medium text-gray-500">Tanggal Pengajuan</dt>
                                                                <dd class="text-sm text-gray-900 col-span-2">{{ $pengajuan->created_at->format('d-m-Y H:i') }}</dd>
                                                            </div>
                                                            <div class="py-2 grid grid-cols-3 gap-4">
                                                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                                                <dd class="text-sm text-gray-900 col-span-2">
                                                                    @if ($pengajuan->status == 'pending')
                                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                                                                    @elseif($pengajuan->status == 'approved')
                                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                                                                    @elseif($pengajuan->status == 'rejected')
                                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                                                    @endif
                                                                </dd>
                                                            </div>
                                                        </dl>

                                                        <!-- Modal footer -->
                                                        <div class="flex items-center pt-4 border-t border-gray-200 mt-4">
                                                            <button type="button" onclick="closeModal('detailModal{{ $pengajuan->pengajuan_id }}')"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex flex-col items-center justify-center py-12">
                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada pengajuan</h3>
                                <p class="mt-1 text-sm text-gray-500">Belum ada pengajuan surat yang perlu diproses.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>
@endsection
