@extends('frontend.layouts.main')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Tombol Kembali -->
            <div class="mb-6">
                <a href="{{ route('layanan') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition duration-200 ease-in-out">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg border border-gray-100">
                <div class="border-b border-gray-200 p-6 bg-gradient-to-r from-blue-50 to-blue-100">
                    <div class="flex items-center space-x-4">
                        <!-- Logo Surat Kematian -->
                        <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div>
                            <h4 class="text-2xl font-bold text-gray-800">Form Pengajuan Surat Keterangan Meninggal</h4>
                            <p class="text-gray-600 mt-2">Silakan lengkapi data di bawah ini dengan benar</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <form action="{{ route('form.suket-meninggal.post') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Data Pejabat -->
                        <div class="space-y-4">
                            <h5 class="font-medium text-gray-700">Data Pejabat</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nama_pejabat" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Pejabat</label>
                                    <input type="text" id="nama_pejabat" name="nama_pejabat"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('nama_pejabat') border-red-500 @enderror"
                                        value="{{ old('nama_pejabat', 'MOH NAUFAL AL BARDANY') }}">
                                    @error('nama_pejabat')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="jabatan"
                                        class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('jabatan') border-red-500 @enderror"
                                        value="{{ old('jabatan', 'Kepala Desa Gedongboyountung') }}">
                                    @error('jabatan')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Almarhum -->
                        <div class="space-y-4">
                            <h5 class="font-medium text-gray-700">Data Almarhum</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nik_almarhum"
                                        class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                                    <input type="text" id="nik_almarhum" name="nik_almarhum" maxlength="16"
                                        minlength="16"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('nik_almarhum') border-red-500 @enderror"
                                        required>
                                    @error('nik_almarhum')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_almarhum" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Almarhum</label>
                                    <input type="text" id="nama_almarhum" name="nama_almarhum"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('nama_almarhum') border-red-500 @enderror"
                                        required>
                                    @error('nama_almarhum')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_lahir_almarhum"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir_almarhum" name="tempat_lahir_almarhum"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tempat_lahir_almarhum') border-red-500 @enderror"
                                        required>
                                    @error('tempat_lahir_almarhum')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir_almarhum"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir_almarhum" name="tanggal_lahir_almarhum"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tanggal_lahir_almarhum') border-red-500 @enderror"
                                        required>
                                    @error('tanggal_lahir_almarhum')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                        Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('jenis_kelamin') border-red-500 @enderror"
                                        required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="warga_negara" class="block text-sm font-medium text-gray-700 mb-1">Warga
                                        Negara</label>
                                    <input type="text" id="warga_negara" name="warga_negara"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('warga_negara') border-red-500 @enderror"
                                        value="{{ old('warga_negara', $meninggal->warga_negara ?? 'Indonesia') }}">
                                    @error('warga_negara')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                                    <select id="agama" name="agama"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('agama') border-red-500 @enderror"
                                        required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    @error('agama')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_almarhum"
                                        class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                                    <input type="text" id="pekerjaan_almarhum" name="pekerjaan_almarhum"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('pekerjaan_almarhum') border-red-500 @enderror"
                                        required>
                                    @error('pekerjaan_almarhum')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="alamat_almarhum"
                                    class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea id="alamat_almarhum" name="alamat_almarhum" rows="3"
                                    class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('alamat_almarhum') border-red-500 @enderror"
                                    required></textarea>
                                @error('alamat_almarhum')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Informasi Kematian -->
                        <div class="space-y-4">
                            <h5 class="font-medium text-gray-700">Informasi Kematian</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tanggal_meninggal"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tanggal Meninggal</label>
                                    <input type="date" id="tanggal_meninggal" name="tanggal_meninggal"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tanggal_meninggal') border-red-500 @enderror"
                                        required>
                                    @error('tanggal_meninggal')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="sebab_meninggal"
                                        class="block text-sm font-medium text-gray-700 mb-1">Sebab Meninggal</label>
                                    <input type="text" id="sebab_meninggal" name="sebab_meninggal"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('sebab_meninggal') border-red-500 @enderror"
                                        required>
                                    @error('sebab_meninggal')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_meninggal"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tempat Meninggal</label>
                                    <input type="text" id="tempat_meninggal" name="tempat_meninggal"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tempat_meninggal') border-red-500 @enderror"
                                        required>
                                    @error('tempat_meninggal')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Pelapor -->
                        <div class="space-y-4">
                            <h5 class="font-medium text-gray-700">Data Pelapor</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nik_pelapor"
                                        class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                                    <input type="text" id="nik_pelapor" name="nik_pelapor" maxlength="16"
                                        minlength="16"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('nik_pelapor') border-red-500 @enderror"
                                        required>
                                    @error('nik_pelapor')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_pelapor"
                                        class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                    <input type="text" id="nama_pelapor" name="nama_pelapor"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('nama_pelapor') border-red-500 @enderror"
                                        required>
                                    @error('nama_pelapor')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_lahir_pelapor"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir_pelapor" name="tempat_lahir_pelapor"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tempat_lahir_pelapor') border-red-500 @enderror"
                                        required>
                                    @error('tempat_lahir_pelapor')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir_pelapor"
                                        class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir_pelapor" name="tanggal_lahir_pelapor"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('tanggal_lahir_pelapor') border-red-500 @enderror"
                                        required>
                                    @error('tanggal_lahir_pelapor')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_kelamin_pelapor"
                                        class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                                    <select id="jenis_kelamin_pelapor" name="jenis_kelamin_pelapor"
                                        class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('jenis_kelamin_pelapor') border-red-500 @enderror"
                                        required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin_pelapor')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="alamat_pelapor"
                                    class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3"
                                    class="w-full rounded-lg border-2 p-1 px-2 border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200 @error('alamat_pelapor') border-red-500 @enderror"
                                    required></textarea>
                                @error('alamat_pelapor')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 ease-in-out transform hover:-translate-y-1">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
