@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb / Back -->
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li>
                        <a href="{{ route('layanan') }}" class="hover:text-blue-700 transition-colors">Layanan</a>
                    </li>
                    <li>
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </li>
                    <li class="text-gray-900 font-medium" aria-current="page">Pengajuan Surat Kematian</li>
                </ol>
            </nav>

            <!-- Form Card -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-8 border-b border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-900">Form Pengajuan Surat Keterangan Meninggal</h1>
                    <p class="mt-2 text-gray-600">Lengkapi data di bawah ini dengan benar untuk pelaporan kematian.</p>
                </div>

                <div class="p-8">
                    <form action="{{ route('form.suket-meninggal.post') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf

                        <!-- Section: Data Pejabat -->
                        <section>
                            <h2 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">I. Data Pejabat Desa</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nama_pejabat" class="block text-sm font-semibold text-gray-700 mb-2">Nama Pejabat</label>
                                    <input type="text" id="nama_pejabat" name="nama_pejabat"
                                        value="{{ old('nama_pejabat', 'MOH NAUFAL AL BARDANY') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none bg-gray-50 @error('nama_pejabat') border-red-500 @enderror">
                                    @error('nama_pejabat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="jabatan" class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan"
                                        value="{{ old('jabatan', 'Kepala Desa Gedongboyountung') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none bg-gray-50 @error('jabatan') border-red-500 @enderror">
                                    @error('jabatan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <!-- Section: Data Almarhum -->
                        <section>
                            <h2 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">II. Data Almarhum/Almarhumah</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-1 md:col-span-2">
                                    <label for="nik_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">NIK Almarhum</label>
                                    <input type="text" id="nik_almarhum" name="nik_almarhum" maxlength="16" value="{{ old('nik_almarhum') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nik_almarhum') border-red-500 @enderror"
                                        placeholder="Masukkan 16 digit NIK" required>
                                    @error('nik_almarhum')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label for="nama_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap Almarhum</label>
                                    <input type="text" id="nama_almarhum" name="nama_almarhum" value="{{ old('nama_almarhum') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nama_almarhum') border-red-500 @enderror"
                                        placeholder="Nama lengkap sesuai KTP" required>
                                    @error('nama_almarhum')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="tempat_lahir_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir_almarhum" name="tempat_lahir_almarhum" value="{{ old('tempat_lahir_almarhum') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tempat_lahir_almarhum') border-red-500 @enderror"
                                        placeholder="Kota/Kabupaten" required>
                                </div>
                                <div>
                                    <label for="tanggal_lahir_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir_almarhum" name="tanggal_lahir_almarhum" value="{{ old('tanggal_lahir_almarhum') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tanggal_lahir_almarhum') border-red-500 @enderror"
                                        required>
                                </div>
                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('jenis_kelamin') border-red-500 @enderror" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="agama" class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                                    <select id="agama" name="agama"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('agama') border-red-500 @enderror" required>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="pekerjaan_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                                    <input type="text" id="pekerjaan_almarhum" name="pekerjaan_almarhum" value="{{ old('pekerjaan_almarhum') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('pekerjaan_almarhum') border-red-500 @enderror"
                                        placeholder="Contoh: Wiraswasta" required>
                                </div>
                                <div>
                                    <label for="warga_negara" class="block text-sm font-semibold text-gray-700 mb-2">Warga Negara</label>
                                    <input type="text" id="warga_negara" name="warga_negara" value="{{ old('warga_negara', 'WNI') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('warga_negara') border-red-500 @enderror"
                                        placeholder="Contoh: WNI" required>
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label for="alamat_almarhum" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Terakhir</label>
                                    <textarea id="alamat_almarhum" name="alamat_almarhum" rows="3"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('alamat_almarhum') border-red-500 @enderror"
                                        placeholder="Alamat lengkap sesuai KTP" required>{{ old('alamat_almarhum') }}</textarea>
                                </div>
                            </div>
                        </section>

                        <!-- Section: Informasi Kematian -->
                        <section>
                            <h2 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">III. Informasi Kematian</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tanggal_meninggal" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Meninggal</label>
                                    <input type="date" id="tanggal_meninggal" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tanggal_meninggal') border-red-500 @enderror"
                                        required>
                                </div>
                                <div>
                                    <label for="sebab_meninggal" class="block text-sm font-semibold text-gray-700 mb-2">Sebab Meninggal</label>
                                    <input type="text" id="sebab_meninggal" name="sebab_meninggal" value="{{ old('sebab_meninggal') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('sebab_meninggal') border-red-500 @enderror"
                                        placeholder="Contoh: Sakit / Usia Lanjut" required>
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label for="tempat_meninggal" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Meninggal</label>
                                    <input type="text" id="tempat_meninggal" name="tempat_meninggal" value="{{ old('tempat_meninggal') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tempat_meninggal') border-red-500 @enderror"
                                        placeholder="Contoh: Rumah / Rumah Sakit (Nama RS)" required>
                                </div>
                            </div>
                        </section>

                        <!-- Section: Data Pelapor -->
                        <section>
                            <h2 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">IV. Data Pelapor</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nik_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">NIK Pelapor</label>
                                    <input type="text" id="nik_pelapor" name="nik_pelapor" maxlength="16" value="{{ old('nik_pelapor', $penduduk->nik ?? '') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nik_pelapor') border-red-500 @enderror"
                                        placeholder="Masukkan 16 digit NIK" required>
                                </div>
                                <div>
                                    <label for="nama_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">Nama Pelapor</label>
                                    <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor', $penduduk->nama ?? '') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nama_pelapor') border-red-500 @enderror"
                                        placeholder="Nama sesuai KTP" required>
                                </div>
                                <div>
                                    <label for="tempat_lahir_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir Pelapor</label>
                                    <input type="text" id="tempat_lahir_pelapor" name="tempat_lahir_pelapor" value="{{ old('tempat_lahir_pelapor', $penduduk->tempat_lahir ?? '') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tempat_lahir_pelapor') border-red-500 @enderror"
                                        placeholder="Kota/Kabupaten" required>
                                </div>
                                <div>
                                    <label for="tanggal_lahir_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir Pelapor</label>
                                    <input type="date" id="tanggal_lahir_pelapor" name="tanggal_lahir_pelapor"
                                        value="{{ old('tanggal_lahir_pelapor', isset($penduduk->tanggal_lahir) ? \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('Y-m-d') : '') }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tanggal_lahir_pelapor') border-red-500 @enderror"
                                        required>
                                </div>
                                <div>
                                    <label for="jenis_kelamin_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin Pelapor</label>
                                    <select id="jenis_kelamin_pelapor" name="jenis_kelamin_pelapor"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('jenis_kelamin_pelapor') border-red-500 @enderror" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin_pelapor', (isset($penduduk->jenis_kelamin) && strtolower($penduduk->jenis_kelamin) == 'laki-laki') ? 'selected' : '') }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin_pelapor', (isset($penduduk->jenis_kelamin) && strtolower($penduduk->jenis_kelamin) == 'perempuan') ? 'selected' : '') }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label for="alamat_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Pelapor</label>
                                    <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3"
                                         class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('alamat_pelapor') border-red-500 @enderror"
                                         placeholder="Alamat lengkap sesuai KTP" required>{{ old('alamat_pelapor', $penduduk->alamat ?? '') }}</textarea>
                                 </div>
                            </div>
                        </section>

                        <!-- Section: Dokumen Pendukung -->
                        <section>
                            <h2 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">V. Dokumen Pendukung (Opsional)</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-4 border-2 border-dashed border-gray-200 rounded-lg hover:border-blue-400 transition-colors group">
                                    <label for="file_ktp" class="block text-sm font-semibold text-gray-700 mb-2">Foto KTP Pelapor</label>
                                    <input type="file" id="file_ktp" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                                    <p class="mt-2 text-xs text-gray-500">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                                    @error('file_ktp')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="p-4 border-2 border-dashed border-gray-200 rounded-lg hover:border-blue-400 transition-colors group">
                                    <label for="file_kk" class="block text-sm font-semibold text-gray-700 mb-2">Foto Kartu Keluarga</label>
                                    <input type="file" id="file_kk" name="file_kk" accept=".pdf,.jpg,.jpeg,.png"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                                    <p class="mt-2 text-xs text-gray-500">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                                    @error('file_kk')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </section>

                        <!-- Submit Button -->
                        <div class="pt-8 border-t border-gray-100 flex items-center justify-end space-x-4">
                            <a href="{{ route('layanan') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 hover:text-gray-900 transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-8 py-3 bg-blue-700 text-white font-bold rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 transition-all transform active:scale-[0.98]">
                                Kirim Laporan Kematian
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
