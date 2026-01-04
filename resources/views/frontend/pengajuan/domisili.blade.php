@extends('frontend.layouts.main')

@section('container')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    <li class="text-gray-900 font-medium" aria-current="page">Pengajuan Surat Domisili</li>
                </ol>
            </nav>

            <!-- Form Card -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-8 border-b border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-900">Form Pengajuan Surat Domisili</h1>
                    <p class="mt-2 text-gray-600">Lengkapi data di bawah ini dengan benar sesuai dengan dokumen kependudukan Anda.</p>
                </div>

                <div class="p-8">
                    <form action="{{ route('form.domisili.post') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- NIK -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                                <input type="text" id="nik" name="nik" maxlength="16" value="{{ old('nik', $penduduk->nik ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nik') border-red-500 @enderror"
                                    placeholder="Masukkan 16 digit NIK" required>
                                @error('nik')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $penduduk->nama ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('nama') border-red-500 @enderror"
                                    placeholder="Nama sesuai KTP" required>
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tempat_lahir') border-red-500 @enderror"
                                    placeholder="Kota/Kabupaten" required>
                                @error('tempat_lahir')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($penduduk->tanggal_lahir) ? \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('Y-m-d') : '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('tanggal_lahir') border-red-500 @enderror"
                                    required>
                                @error('tanggal_lahir')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Pekerjaan -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="pekerjaan" class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('pekerjaan') border-red-500 @enderror"
                                    placeholder="Contoh: Wiraswasta">
                                @error('pekerjaan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                                <textarea id="alamat" name="alamat" rows="3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('alamat') border-red-500 @enderror"
                                    placeholder="Alamat domisili saat ini" required>{{ old('alamat', $penduduk->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Document Upload Section -->
                            <div class="col-span-1 md:col-span-2 mt-4">
                                <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Dokumen Pendukung (Opsional)</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="p-4 border-2 border-dashed border-gray-200 rounded-lg">
                                        <label for="file_ktp" class="block text-sm font-semibold text-gray-700 mb-2">Foto KTP</label>
                                        <input type="file" id="file_ktp" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <p class="mt-2 text-xs text-gray-500">Format: PDF, JPG, PNG (Max 2MB)</p>
                                    </div>
                                    <div class="p-4 border-2 border-dashed border-gray-200 rounded-lg">
                                        <label for="file_kk" class="block text-sm font-semibold text-gray-700 mb-2">Foto Kartu Keluarga</label>
                                        <input type="file" id="file_kk" name="file_kk" accept=".pdf,.jpg,.jpeg,.png"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <p class="mt-2 text-xs text-gray-500">Format: PDF, JPG, PNG (Max 2MB)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Keperluan -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="keperluan" class="block text-sm font-semibold text-gray-700 mb-2">Keperluan</label>
                                <input type="text" id="keperluan" name="keperluan" value="{{ old('keperluan') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('keperluan') border-red-500 @enderror"
                                    placeholder="Contoh: Melamar Pekerjaan" required>
                                @error('keperluan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Keterangan Tambahan -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">Keterangan Tambahan</label>
                                <textarea id="keterangan" name="keterangan" rows="2"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none @error('keterangan') border-red-500 @enderror"
                                    placeholder="Informasi tambahan jika diperlukan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                            <a href="{{ route('layanan') }}" class="px-6 py-3 text-sm font-semibold text-gray-700 hover:text-gray-900 transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-8 py-3 bg-blue-700 text-white font-bold rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-200 transition-all transform active:scale-[0.98]">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-100 rounded-lg flex items-start space-x-3">
                <svg class="h-6 w-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-semibold mb-1">Butuh Bantuan?</p>
                    <p>Jika Anda mengalami kesulitan dalam mengisi formulir ini, silakan hubungi admin desa melalui nomor layanan yang tertera di halaman kontak.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
