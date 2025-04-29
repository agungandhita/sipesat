@extends('admin.layouts.main')

@section('container')
    <div class="mt-28">
        @include('admin.penduduk._breadcum')
    </div>

    <div
        class="p-4 bg-white/80 backdrop-blur-md block border-1px shadow-xl border-blue-100/50 rounded-xl border-[2px] mt-4 transition-all duration-500 hover:shadow-[0_10px_30px_rgba(8,112,184,0.2)]">
        <div class="mb-4 flex flex-wrap gap-4">
            <!-- Filter Jenis Kelamin -->
            <div>
                <form action="{{ route('penduduk') }}" method="GET" class="flex gap-2">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="jenis_kelamin" id="jenis_kelamin" onchange="this.form.submit()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="">Semua Jenis Kelamin</option>
                        <option value="laki-laki" {{ request('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="perempuan" {{ request('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </form>
            </div>

            <!-- Filter RT -->
            <div>
                <form action="{{ route('penduduk') }}" method="GET" class="flex gap-2">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="jenis_kelamin" value="{{ request('jenis_kelamin') }}">
                    <select name="rt" id="rt" onchange="this.form.submit()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="">Semua RT</option>
                        @foreach ($rtList as $rt)
                            <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>RT
                                {{ $rt }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <!-- Filter Dusun -->
            <div>
                <form action="{{ route('penduduk') }}" method="GET" class="flex gap-2">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="jenis_kelamin" value="{{ request('jenis_kelamin') }}">
                    <input type="hidden" name="rt" value="{{ request('rt') }}">
                    <select name="dusun" id="dusun" onchange="this.form.submit()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="">Semua Dusun</option>
                        @foreach ($dusunList as $dusun)
                            <option value="{{ $dusun }}" {{ request('dusun') == $dusun ? 'selected' : '' }}>
                                {{ $dusun }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <!-- Pengurutan -->
            <div>
                <form action="{{ route('penduduk') }}" method="GET" class="flex gap-2">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="jenis_kelamin" value="{{ request('jenis_kelamin') }}">
                    <input type="hidden" name="rt" value="{{ request('rt') }}">
                    <input type="hidden" name="dusun" value="{{ request('dusun') }}">
                    <select name="sort_by" id="sort_by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="">Urutkan Berdasarkan</option>
                        <option value="nama" {{ request('sort_by') == 'nama' ? 'selected' : '' }}>Nama</option>
                        <option value="nik" {{ request('sort_by') == 'nik' ? 'selected' : '' }}>NIK</option>
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Tanggal
                            Dibuat</option>
                    </select>
                    <select name="sort_direction" id="sort_direction" onchange="this.form.submit()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Naik (A-Z)
                        </option>
                        <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Turun (Z-A)
                        </option>
                    </select>
                </form>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-gradient-to-r from-blue-600 to-indigo-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">RT/RW</th>
                        <th scope="col" class="px-6 py-3">Dusun</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $no => $penduduk)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ ($data->currentPage() - 1) * $data->perPage() + $no + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $penduduk->nama }}</td>
                            <td class="px-6 py-4">{{ $penduduk->nik }}</td>
                            <td class="px-6 py-4">{{ ucfirst($penduduk->jenis_kelamin) }}</td>
                            <td class="px-6 py-4">{{ $penduduk->alamat }}</td>
                            <td class="px-6 py-4">
                                @if ($penduduk->rt)
                                    <a href="{{ route('penduduk.by.rt', $penduduk->rt) }}"
                                        class="text-blue-600 hover:underline">
                                        RT {{ $penduduk->rt }}
                                    </a>
                                @endif
                                @if ($penduduk->rw)
                                    / RW {{ $penduduk->rw }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($penduduk->dusun)
                                    <a href="{{ route('penduduk.by.dusun', $penduduk->dusun) }}"
                                        class="text-blue-600 hover:underline">
                                        {{ $penduduk->dusun }}
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <form action="{{ route('penduduk.update', $penduduk->warga_id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    <button type="button"
                                        onclick="editPenduduk('{{ $penduduk->warga_id }}', '{{ $penduduk->nama }}', '{{ $penduduk->nik }}', '{{ $penduduk->jenis_kelamin }}', '{{ $penduduk->alamat }}', '{{ $penduduk->rt }}', '{{ $penduduk->rw }}', '{{ $penduduk->dusun }}')"
                                        class="font-medium text-blue-600 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </form>
                                <button title="Delete" data-modal-target="popup-modal{{ $no }}"
                                    data-modal-toggle="popup-modal{{ $no }}"
                                    class="font-medium text-red-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="8" class="px-6 py-4 text-center">Tidak ada data penduduk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 bg-white text-gray-400">
            {{ $data->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>

    {{-- modal delete --}}
    @foreach ($data as $key => $cek)
        <div id="popup-modal{{ $key }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-xl shadow-2xl">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="popup-modal{{ $key }}">
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
                        <!-- Pada bagian modal konfirmasi -->
                        <form action="{{ route('penduduk.hapus', $cek->warga_id) }}" method="POST" class="inline">
                            @csrf
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

    <!-- Modal Edit -->
    <div id="edit-modal" tabindex="-1" aria-hidden="true"
        class="shadow-2xl border-[1px] border-blue-100/50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div
                class="relative bg-white/95 backdrop-blur-md rounded-lg shadow-[0_10px_30px_rgba(8,112,184,0.15)] border border-blue-50">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-blue-100/30 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h3
                        class="text-xl font-semibold bg-gradient-to-r from-blue-700 to-indigo-700 bg-clip-text text-transparent">
                        Edit Data Penduduk
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form id="edit-form" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Nama Input -->
                            <div>
                                <label for="edit-nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" name="nama" id="edit-nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <!-- NIK Input -->
                            <div>
                                <label for="edit-nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                <input type="text" name="nik" id="edit-nik"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Nomor Induk Kependudukan">
                            </div>

                            <!-- Jenis Kelamin Select -->
                            <div>
                                <label for="edit-jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                    Kelamin</label>
                                <select id="edit-jenis_kelamin" name="jenis_kelamin"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- RT Input -->
                            <div>
                                <label for="edit-rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                                <input type="text" name="rt" id="edit-rt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan RT">
                            </div>

                            <!-- RW Input -->
                            <div>
                                <label for="edit-rw" class="block mb-2 text-sm font-medium text-gray-900">RW</label>
                                <input type="text" name="rw" id="edit-rw"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan RW">
                            </div>

                            <!-- Dusun Input -->
                            <div>
                                <label for="edit-dusun" class="block mb-2 text-sm font-medium text-gray-900">Dusun</label>
                                <input type="text" name="dusun" id="edit-dusun"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan Dusun">
                            </div>

                            <!-- Alamat Textarea -->
                            <div class="md:col-span-2">
                                <label for="edit-alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <textarea id="edit-alamat" name="alamat" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan alamat lengkap..." required></textarea>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b mt-4">
                            <button type="submit"
                                class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                            <button data-modal-hide="edit-modal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk menangani edit data
        function editPenduduk(id, nama, nik, jenis_kelamin, alamat, rt, rw, dusun) {
            const form = document.getElementById('edit-form');
            form.action = `/penduduk/update/${id}`;

            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-nik').value = nik;
            document.getElementById('edit-jenis_kelamin').value = jenis_kelamin;
            document.getElementById('edit-alamat').value = alamat;
            document.getElementById('edit-rt').value = rt;
            document.getElementById('edit-rw').value = rw;
            document.getElementById('edit-dusun').value = dusun;

            // Buka modal
            const modal = document.getElementById('edit-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Script untuk menutup modal
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('[data-modal-hide="edit-modal"]');
            const modal = document.getElementById('edit-modal');

            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
            });

            // Tutup modal ketika mengklik area di luar modal
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });
    </script>
@endsection
