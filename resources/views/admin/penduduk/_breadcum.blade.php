<div class="p-4 bg-white/80 backdrop-blur-md block sm:flex items-center justify-between border-1px shadow-xl border-blue-100/50 rounded-xl border-[2px] lg:mt-1.5 transition-all duration-500 hover:shadow-[0_10px_30px_rgba(8,112,184,0.2)]"
    data-aos="fade-down" data-aos-duration="600">
    <div class="w-full mb-1">
        <div class="mb-4">
            <h1
                class="text-xl font-semibold bg-gradient-to-r from-blue-700 to-indigo-700 bg-clip-text text-transparent sm:text-2xl capitalize">
                Data Penduduk</h1>
        </div>
        <div class="sm:flex">
            <form class="lg:pr-3" action="{{ route('penduduk') }}" method="GET">
                <label for="users-search" class="sr-only">Search</label>
                <div class="relative mt-1 lg:w-64 xl:w-96 lg:flex gap-x-3">
                    <input type="text" name="search" id="users-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        placeholder="cari nama/NIK/alamat" value="{{ request('search') }}">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg focus:ring-4 focus:ring-blue-300 sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari
                    </button>
                </div>
            </form>
            <div class="relative mt-1 lg:w-64 xl:w-96 lg:flex gap-x-3">
                <a href="{{ route('penduduk') }}"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 transition-all duration-300 shadow-md hover:shadow-lg focus:ring-4 focus:ring-red-300 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset
                </a>
            </div>
            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block capitalize text-white bg-gradient-to-r from-emerald-500 to-teal-500 cursor-pointer hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 shadow-md hover:shadow-lg focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Input Data
                </button>

                {{-- <a href="#"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-700 bg-white/90 backdrop-blur-sm border border-gray-200 rounded-lg hover:bg-gray-50 transition-all duration-300 shadow-sm hover:shadow-md focus:ring-4 focus:ring-gray-200 sm:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 mr-2 text-gray-600"
                        fill="currentColor">
                        <path
                            d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z">
                        </path>
                    </svg>
                    Export
                </a> --}}
            </div>
        </div>
    </div>
</div>


{{-- modal start --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[120] justify-center items-center w-full h-modal md:h-full bg-gray-800/50">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div
            class="relative bg-white rounded-lg shadow-md border border-gray-200 max-h-[90vh] overflow-y-auto">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3
                    class="text-xl font-semibold text-gray-900">
                    Masukkan Data Penduduk</h3>
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
                <form action="{{ route('penduduk.create') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Input -->
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- NIK Input -->
                        <div>
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                            <input type="text" name="nik" id="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Nomor Induk Kependudukan" required maxlength="16" minlength="16">
                            <p class="mt-1 text-xs text-gray-500">NIK harus 16 digit</p>
                        </div>

                        <!-- Jenis Kelamin Select -->
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- RT Input -->
                        <div>
                            <label for="rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                            <input type="text" name="rt" id="rt"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan RT">
                        </div>

                        <!-- RW Input -->
                        <div>
                            <label for="rw" class="block mb-2 text-sm font-medium text-gray-900">RW</label>
                            <input type="text" name="rw" id="rw"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan RW">
                        </div>

                        <!-- Dusun Input -->
                        <div>
                            <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900">Dusun</label>
                            <input type="text" name="dusun" id="dusun"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Dusun">
                        </div>

                        <!-- Tempat Lahir Input -->
                        <div>
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Tempat Lahir">
                        </div>

                        <!-- Tanggal Lahir Input -->
                        <div>
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <!-- Agama Select -->
                        <div>
                            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                            <select id="agama" name="agama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" selected disabled>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Status Perkawinan Select -->
                        <div>
                            <label for="status_perkawinan" class="block mb-2 text-sm font-medium text-gray-900">Status
                                Perkawinan</label>
                            <select id="status_perkawinan" name="status_perkawinan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>

                        <!-- Pekerjaan Select -->
                        <div>
                            <label for="pekerjaan"
                                class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                            <select id="pekerjaan" name="pekerjaan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" selected disabled>Pilih Pekerjaan</option>
                                <option value="Petani">Petani</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Pedagang">Pedagang</option>
                                <option value="PNS">PNS</option>
                                <option value="TNI/Polri">TNI/Polri</option>
                                <option value="Swasta">Swasta</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Pendidikan Select -->
                        <div>
                            <label for="pendidikan"
                                class="block mb-2 text-sm font-medium text-gray-900">Pendidikan</label>
                            <select id="pendidikan" name="pendidikan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                <option value="SD/Sederajat">SD/Sederajat</option>
                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                <option value="D1/D2/D3">D1/D2/D3</option>
                                <option value="D4/S1">D4/S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>

                        <!-- Alamat Textarea -->
                        <div class="md:col-span-2">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan alamat lengkap..." required></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b mt-4">
                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                        <button data-modal-hide="default-modal" type="button"
                            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
