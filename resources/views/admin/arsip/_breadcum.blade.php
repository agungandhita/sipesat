<div class="bg-white rounded-lg shadow-md p-5 mb-6">
    <h1 class="text-xl font-semibold text-gray-900 mb-4">Data Arsip Surat</h1>

    <form action="{{ route('arsip') }}" method="GET" class="mb-4">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end">
            <div>
                <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="Semua" {{ request('jenis_surat') == 'Semua' ? 'selected' : '' }}>Semua</option>
                    <option value="masuk" {{ request('jenis_surat') == 'masuk' ? 'selected' : '' }}>Surat Masuk
                    </option>
                    <option value="keluar" {{ request('jenis_surat') == 'keluar' ? 'selected' : '' }}>Surat Keluar
                    </option>
                </select>
            </div>

            <div>
                <label for="perihal" class="block text-sm font-medium text-gray-700 mb-1">Perihal</label>
                <input type="text" name="perihal" id="perihal" value="{{ request('perihal') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Cari perihal...">
            </div>

            <div>
                <button type="submit"
                    class="w-full flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </button>
            </div>

            <div>
                <a href="{{ route('arsip') }}"
                    class="w-full flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <div class="flex flex-wrap gap-2">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Input Data
        </button>


    </div>
</div>

{{-- modal start --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-full bg-black/50">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Arsip Surat
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal">
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
                <form action="{{ route('arsip.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Perihal -->
                        <div>
                            <label for="perihal" class="block text-sm font-medium text-gray-900 mb-1">Perihal</label>
                            <input type="text" name="perihal" id="perihal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan perihal surat">
                        </div>

                        <!-- Asal Surat -->
                        <div>
                            <label for="asal_surat" class="block text-sm font-medium text-gray-900 mb-1">Asal
                                Surat</label>
                            <input type="text" name="asal_surat" id="asal_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan asal surat">
                        </div>

                        <!-- Jenis surat -->
                        <div>
                            <label for="jenis_surat" class="block text-sm font-medium text-gray-900 mb-1">Jenis
                                Surat</label>
                            <select name="jenis_surat" id="jenis_surat" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="masuk">Surat Masuk</option>
                                <option value="keluar">Surat Keluar</option>
                            </select>
                        </div>

                        <!-- Tanggal Surat -->
                        <div>
                            <label for="tanggal_surat" class="block text-sm font-medium text-gray-900 mb-1">Tanggal
                                Surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label for="keterangan"
                                class="block text-sm font-medium text-gray-900 mb-1">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan keterangan jika ada"></textarea>
                        </div>

                        <!-- Upload File -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-900 mb-1" for="file_surat">Upload
                                file</label>
                            <input type="file" name="file_surat" id="file_surat"
                                class="w-full text-gray-500 text-sm bg-gray-50 file:mr-4 file:py-2 file:px-4 file:bg-blue-600 file:text-white file:border-0 file:rounded-md border border-gray-300 rounded-lg" />
                        </div>

                        <!-- Error messages -->
                        @if ($errors->any())
                            <div class="md:col-span-2">
                                <div class="bg-red-50 p-4 rounded-lg">
                                    <ul class="list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- Modal footer -->
                        <div class="flex items-center md:col-span-2 pt-4 border-t border-gray-200 mt-4">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                            <button data-modal-hide="default-modal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
