@extends('admin.layouts.main')

@section('container')
    <div class="pt-24">
        @include('admin.arsip._breadcum')

        <div class="bg-white/90 backdrop-blur-sm rounded-xl shadow-md border border-gray-100 mt-6 overflow-hidden">
            @if ($surat->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Perihal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Surat</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Asal Surat</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dokumen</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($surat as $no => $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $no + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->perihal }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->jenis_surat == 'masuk' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $item->jenis_surat }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->asal_surat }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ $item->jenis_surat == 'masuk' ? Storage::url(  $item->file_surat) : Storage::url('public/surat_keluar/' . $item->file_surat) }}"
                                            target="_blank"
                                            class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button title="Edit"
                                                onclick="openEditModal({{ $item->arsip_id }}, '{{ $item->perihal }}', '{{ $item->asal_surat }}', '{{ $item->jenis_surat }}', '{{ $item->tanggal_surat }}', '{{ $item->keterangan }}', '{{ $item->nomor_surat }}')"
                                                data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                                class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button title="Delete" data-modal-target="popup-modal{{ $no }}"
                                                data-modal-toggle="popup-modal{{ $no }}"
                                                class="text-red-600 hover:text-red-900 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-12">
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada data</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan data surat baru.</p>
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Data Surat
                    </button>
                </div>
            @endif
        </div>

        <!-- Edit Modal -->
        <div id="edit-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-xl shadow-2xl">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Data Arsip
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="edit-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="edit-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="edit_nomor_surat" class="block mb-2 text-sm font-medium text-gray-900">Nomor Surat</label>
                                    <input type="text" id="edit_nomor_surat" name="nomor_surat"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan nomor surat">
                                </div>
                                <div>
                                    <label for="edit_jenis_surat" class="block mb-2 text-sm font-medium text-gray-900">Jenis Surat</label>
                                    <select id="edit_jenis_surat" name="jenis_surat"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Pilih Jenis Surat</option>
                                        <option value="masuk">Surat Masuk</option>
                                        <option value="keluar">Surat Keluar</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="edit_perihal" class="block mb-2 text-sm font-medium text-gray-900">Perihal</label>
                                <input type="text" id="edit_perihal" name="perihal" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan perihal surat">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="edit_tanggal_surat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Surat</label>
                                    <input type="date" id="edit_tanggal_surat" name="tanggal_surat" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="edit_asal_surat" class="block mb-2 text-sm font-medium text-gray-900">Asal Surat</label>
                                    <input type="text" id="edit_asal_surat" name="asal_surat" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan asal surat">
                                </div>
                            </div>
                            <div>
                                <label for="edit_keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                <textarea id="edit_keterangan" name="keterangan" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan keterangan (opsional)"></textarea>
                            </div>
                            <div>
                                <label for="edit_file_surat" class="block mb-2 text-sm font-medium text-gray-900">File Surat (Opsional)</label>
                                <input type="file" id="edit_file_surat" name="file_surat" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah file</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Update Data
                            </button>
                            <button data-modal-hide="edit-modal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modals -->
        @foreach ($surat as $key => $tes)
            <div id="popup-modal{{ $key }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-xl shadow-2xl">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="popup-modal{{ $key }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-red-500 w-12 h-12" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-medium text-gray-900">Apakah Anda yakin ingin menghapus data ini?
                            </h3>
                            <form action="{{ route('arsip.destroy', $tes->arsip_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Ya, hapus
                                </button>
                            </form>
                            <button data-modal-hide="popup-modal{{ $key }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function openEditModal(id, perihal, asal_surat, jenis_surat, tanggal_surat, keterangan, nomor_surat) {
            // Set form action
            document.getElementById('edit-form').action = `/arsip/${id}`;

            // Fill form fields
            document.getElementById('edit_nomor_surat').value = nomor_surat || '';
            document.getElementById('edit_perihal').value = perihal || '';
            document.getElementById('edit_asal_surat').value = asal_surat || '';
            document.getElementById('edit_jenis_surat').value = jenis_surat || '';
            document.getElementById('edit_tanggal_surat').value = tanggal_surat || '';
            document.getElementById('edit_keterangan').value = keterangan || '';
        }
    </script>
@endsection
