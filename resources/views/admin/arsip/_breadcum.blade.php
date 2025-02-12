<div
    class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5">
    <div class="w-full mb-1">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">data arsip surat</h1>
        </div>
        <div class="sm:flex">
            <form action="{{ route('arsip') }}" method="GET" class="mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div>
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="Semua" {{ request('jenis_surat') == 'Semua' ? 'selected' : '' }}>Semua</option>
                            <option value="masuk" {{ request('jenis_surat') == 'masuk' ? 'selected' : '' }}>Surat Masuk</option>
                            <option value="keluar" {{ request('jenis_surat') == 'keluar' ? 'selected' : '' }}>Surat Keluar</option>
                        </select>
                    </div>

                    <div>
                        <label for="perihal" class="block text-sm font-medium text-gray-700 mb-1">Perihal</label>
                        <input type="text" name="perihal" id="perihal" value="{{ request('perihal') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Cari perihal...">
                    </div>

                    <div class="flex items-end space-x-2">
                        <button type="submit" class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Filter
                        </button>

                        <a href="{{ route('arsip') }}" class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

        </div>

        <div class="grid grid-cols-2 md:flex items-center ml-auto space-x-2 sm:space-x-3">
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="block capitalize text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Input data
            </button>

            <a href="#"
                class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white bg-green-700 border border-gray-300 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mr-2 -ml-1"
                    fill="currentColor">
                    <path
                        d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z">
                    </path>
                </svg>
                Export
            </a>
        </div>
    </div>
</div>


{{-- modal start --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="shadow-2xl border-[1px] hidden overflow-y-auto overflow-x-hidden fixed top-14 right-0 left-0 z-50 justify-center items-center w-full md:inset-0">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
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
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('arsip.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Perihal -->
                        <div>
                            <label for="perihal" class="block text-base mb-1 font-medium text-gray-900">Perihal</label>
                            <input type="text" name="perihal" id="perihal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan perihal surat">
                        </div>

                        <!-- Asal Surat -->
                        <div>
                            <label for="asal_surat" class="block text-base mb-1 font-medium text-gray-900">Asal Surat</label>
                            <input type="text" name="asal_surat" id="asal_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan asal surat">
                        </div>

                        {{-- jenis surat --}}
                        <div>
                            <label for="jenis_surat" class="block text-base mb-1 font-medium text-gray-900">Jenis
                                Surat</label>
                            <select name="jenis_surat" id="jenis_surat" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="masuk">Surat Masuk</option>
                                <option value="keluar">Surat Keluar</option>
                            </select>
                        </div>

                        <!-- Tanggal Surat -->
                        <div>
                            <label for="tanggal_surat" class="block text-base mb-1 font-medium text-gray-900">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label for="keterangan" class="block text-base mb-1 font-medium text-gray-900">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan keterangan jika ada"></textarea>
                        </div>

                        <!-- Upload File -->
                        <div class="md:col-span-2">
                            <label class="block text-base mb-1 font-medium text-gray-900" for="file_surat">Upload file</label>
                            <input type="file" name="file_surat" id="file_surat"
                                class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
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
                        <div class="flex items-center md:col-span-2 border-t border-gray-200 rounded-b mt-4">
                            <div class="mt-3">
                                <button type="submit"
                                    class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                                <button data-modal-hide="default-modal" type="button"
                                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
