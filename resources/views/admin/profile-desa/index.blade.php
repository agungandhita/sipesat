@extends('admin.layouts.main')

@section('container')
    <div class="py-6 mt-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-200">
                <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <svg class="h-7 w-7 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Data Perangkat Desa
                        </h2>
                        <button type="button"
                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-md hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 transition-all duration-200 shadow-md"
                            data-toggle="modal" data-target="#tambahPerangkatModal">
                            <span class="flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Perangkat Desa
                            </span>
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 relative rounded-md shadow-sm"
                            role="alert">
                            <button type="button" class="absolute top-0 right-0 mt-2 mr-2" data-dismiss="alert"
                                aria-label="Close">
                                <span class="text-green-700">&times;</span>
                            </button>
                            <p class="font-bold">Sukses!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                        <table id="tabelPerangkat" class="min-w-full divide-y divide-gray-200">
                            <!-- Pada bagian header tabel -->
                            <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        No</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Jabatan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Keterangan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>

                            <!-- Pada bagian body tabel -->
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($perangkatDesa as $index => $perangkat)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm text-gray-500 w-16">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 w-1/4">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                    <span class="font-medium">{{ substr($perangkat->nama, 0, 1) }}</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $perangkat->nama }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 w-1/4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ $perangkat->jabatan }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 w-1/4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-blue-800">
                                                {{ $perangkat->keterangan }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium w-1/4">
                                            <div class="flex space-x-2">
                                                <!-- Pada bagian tombol edit -->
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition-all duration-200 hover:scale-105"
                                                    data-modal-target="editPerangkatModal{{ $perangkat->{'profil-desa-id'} }}"
                                                    data-modal-toggle="editPerangkatModal{{ $perangkat->{'profil-desa-id'} }}">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </button>


                                                <button title="Delete"
                                                    data-modal-target="popup-modal{{ $perangkat->{'profil-desa-id'} }}"
                                                    data-modal-toggle="popup-modal{{ $perangkat->{'profil-desa-id'} }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-all duration-200 hover:scale-105">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pada bagian modal edit -->
    @foreach ($perangkatDesa as $index => $perangkat)
        <div id="editPerangkatModal{{ $perangkat->{'profil-desa-id'} }}" tabindex="-1" aria-hidden="true"
            class="shadow-2xl border-[1px] border-blue-100/50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div
                    class="relative bg-white/95 backdrop-blur-md rounded-lg shadow-[0_10px_30px_rgba(8,112,184,0.15)] border border-blue-50">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-blue-100/30 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <h3
                            class="text-xl font-semibold bg-gradient-to-r from-blue-700 to-indigo-700 bg-clip-text text-transparent">
                            Edit Perangkat Desa
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="editPerangkatModal{{ $perangkat->{'profil-desa-id'} }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('admin.profile-desa.update', $perangkat->{'profil-desa-id'}) }}"
                            method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Nama Input -->
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" id="nama" value="{{ $perangkat->nama }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>

                                <!-- Jabatan Select -->
                                <div>
                                    <label for="jabatan"
                                        class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                    <select id="jabatan" name="jabatan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                        <option value="" selected disabled>Pilih Jabatan</option>
                                        <option value="Kepala Desa"
                                            {{ $perangkat->jabatan == 'Kepala Desa' ? 'selected' : '' }}>Kepala Desa
                                        </option>
                                        <option value="Sekretaris Desa"
                                            {{ $perangkat->jabatan == 'Sekretaris Desa' ? 'selected' : '' }}>Sekretaris
                                            Desa</option>
                                        <option value="Bendahara Desa"
                                            {{ $perangkat->jabatan == 'Bendahara Desa' ? 'selected' : '' }}>Bendahara Desa
                                        </option>
                                        <option value="Kaur Umum"
                                            {{ $perangkat->jabatan == 'Kaur Umum' ? 'selected' : '' }}>Kaur Umum</option>
                                        <option value="Kaur Pembangunan"
                                            {{ $perangkat->jabatan == 'Kaur Pembangunan' ? 'selected' : '' }}>Kaur
                                            Pembangunan</option>
                                        <option value="Kaur Kesejahteraan"
                                            {{ $perangkat->jabatan == 'Kaur Kesejahteraan' ? 'selected' : '' }}>Kaur
                                            Kesejahteraan</option>
                                        <option value="Kepala Dusun"
                                            {{ $perangkat->jabatan == 'Kepala Dusun' ? 'selected' : '' }}>Kepala Dusun
                                        </option>
                                    </select>
                                </div>

                                <!-- Keterangan Textarea -->
                                <div class="md:col-span-2">
                                    <label for="keterangan"
                                        class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                    <textarea id="keterangan" name="keterangan" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Masukkan keterangan..." required>{{ $perangkat->keterangan }}</textarea>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b mt-4">
                                <button type="submit"
                                    class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                                <button data-modal-hide="editPerangkatModal{{ $perangkat->{'profil-desa-id'} }}"
                                    type="button"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah Perangkat Desa -->
    <div class="fixed inset-0 overflow-y-auto hidden" id="tambahPerangkatModal"
        aria-labelledby="tambahPerangkatModalLabel" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form action="{{ route('admin.profile-desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="tambahPerangkatModalLabel">
                                    Tambah Perangkat Desa</h3>
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama
                                            Lengkap</label>
                                        <input type="text" name="nama" id="nama"
                                            class="mt-1 p-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            required>
                                    </div>
                                    <div>
                                        <label for="jabatan"
                                            class="block text-sm font-medium text-gray-700">Jabatan</label>
                                        <select id="jabatan" name="jabatan"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            required>
                                            <option value="">Pilih Jabatan</option>
                                            <option value="Kepala Desa">Kepala Desa</option>
                                            <option value="Sekretaris Desa">Sekretaris Desa</option>
                                            <option value="Bendahara Desa">Bendahara Desa</option>
                                            <option value="Kaur Umum">Kaur Umum</option>
                                            <option value="Kaur Pembangunan">Kaur Pembangunan</option>
                                            <option value="Kaur Kesejahteraan">Kaur Kesejahteraan</option>
                                            <option value="Kepala Dusun">Kepala Dusun</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="keterangan" class="block text-sm font-medium text-gray-700">keterangan
                                            Lengkap</label>
                                        <textarea type="text" name="keterangan" id="keterangan"
                                            class="mt-1 p-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-base font-medium text-white hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200">Simpan</button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200"
                            data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- modal konfirmasi hapus data --}}
    @foreach ($perangkatDesa as $index => $perangkat)
        <div id="popup-modal{{ $perangkat->{'profil-desa-id'} }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-xl shadow-2xl">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="popup-modal{{ $perangkat->{'profil-desa-id'} }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                        <!-- Form hapus -->
                        <form action="{{ route('admin.profile-desa.destroy', $perangkat->{'profil-desa-id'}) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya, hapus
                            </button>
                        </form>
                        <button data-modal-hide="popup-modal{{ $perangkat->{'profil-desa-id'} }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script>
            $(function() {
                $("#tabelPerangkat").DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        zeroRecords: "Tidak ada data yang ditemukan",
                        info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                        infoEmpty: "Tidak ada data yang tersedia",
                        infoFiltered: "(difilter dari _MAX_ total data)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        },
                    },
                    dom: '<"flex justify-between items-center mb-4"<"flex items-center"l><"flex"f>>t<"flex justify-between items-center mt-4"<"flex items-center"i><"flex"p>>',
                });
            });
        </script>
    @endpush
    @push('scripts')
        <script>
            // Fungsi untuk membuka modal
            function openModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }

            // Fungsi untuk menutup modal
            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }

            // Event listener untuk tombol tambah
            document.addEventListener('DOMContentLoaded', function() {
                // Tombol untuk membuka modal tambah
                const tambahBtn = document.querySelector('[data-target="#tambahPerangkatModal"]');
                if (tambahBtn) {
                    tambahBtn.addEventListener('click', function() {
                        openModal('tambahPerangkatModal');
                    });
                }

                // Tombol untuk membuka modal edit
                const editBtns = document.querySelectorAll('[data-target^="#editPerangkatModal"]');
                editBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const modalId = this.getAttribute('data-target').substring(1);
                        openModal(modalId);
                    });
                });

                // Tombol untuk menutup modal (tombol batal)
                const closeBtns = document.querySelectorAll('[data-dismiss="modal"]');
                closeBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const modal = this.closest('.fixed.inset-0.overflow-y-auto');
                        if (modal && modal.id) {
                            closeModal(modal.id);
                        } else if (modal) {
                            modal.classList.add('hidden');
                        }
                    });
                });

                // Menutup modal ketika mengklik di luar modal
                const modals = document.querySelectorAll('.fixed.inset-0.overflow-y-auto');
                modals.forEach(modal => {
                    modal.addEventListener('click', function(e) {
                        if (e.target === this) {
                            this.classList.add('hidden');
                        }
                    });
                });
            });
        </script>
    @endpush

    {{-- Modal konfirmasi hapus --}}
@endsection
