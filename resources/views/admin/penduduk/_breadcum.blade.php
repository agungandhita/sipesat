<div
    class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5">
    <div class="w-full mb-1">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">data penduduk</h1>
        </div>
        <div class="sm:flex">
            <form class="lg:pr-3" action="{{ route('penduduk') }}" method="GET">
                <label for="users-search" class="sr-only">Search</label>
                <div class="relative mt-1 lg:w-64 xl:w-96 lg:flex gap-x-3">
                    <input type="text" name="search" id="users-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        placeholder="cari nama/NIK/alamat" value="{{ request('search') }}">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-1/2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto">
                        cari
                    </button>
                </div>
            </form>
            <div class="relative mt-1 lg:w-64 xl:w-96 lg:flex gap-x-3">
                <a href="{{ route('penduduk') }}"
                    class="inline-flex items-center justify-center w-1/2 px-3 text-sm font-medium text-center text-white rounded-lg bg-red-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto">
                    Reset
            </a>
            </div>
            <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block capitalize text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Input data
                </button>

                <a href="#"
                    class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mr-2 -ml-1" fill="currentColor">
                        <path
                            d="M4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19ZM13 9V16H11V9H6L12 3L18 9H13Z">
                        </path>
                    </svg>
                    Export
                </a>
            </div>
        </div>
    </div>
</div>


{{-- modal start --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="shadow-2xl border-[1px] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Masukkan Data Penduduk
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
                <form action="{{ route('penduduk.create') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Input -->
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <!-- NIK Input -->
                        <div>
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                            <input type="text" name="nik" id="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Nomor Induk Kependudukan">
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
                            class="text-white bg-blue-700 cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                        <button data-modal-hide="default-modal" type="button"
                            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
