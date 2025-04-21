@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 pt-20">
        <div class="bg-white rounded-lg shadow-md max-w-3xl mx-auto">
            <div class="p-8">
                <h4 class="text-lg font-semibold mb-8">Form Surat Keterangan Meninggal</h4>
                <form action="{{ isset($meninggal) ? route('meninggal.update', $meninggal->id) : route('meninggal.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($meninggal))
                        @method('PUT')
                    @endif

                    <!-- Bagian Pejabat yang Mengeluarkan Surat -->
                    <div class="mb-8">
                        <h5 class="font-medium text-gray-700 mb-4">Data Pejabat</h5>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nama_pejabat" class="block text-sm text-gray-700 mb-2">Nama Pejabat</label>
                                <input type="text" id="nama_pejabat" name="nama_pejabat"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nama_pejabat') border-red-500 @enderror"
                                    value="{{ old('nama_pejabat', $meninggal->nama_pejabat ?? 'MOH NAUFAL AL BARDANY') }}">
                                @error('nama_pejabat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="jabatan" class="block text-sm text-gray-700 mb-2">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('jabatan') border-red-500 @enderror"
                                    value="{{ old('jabatan', $meninggal->jabatan ?? 'Kepala Desa Gedongboyountung') }}">
                                @error('jabatan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Data Almarhum -->
                    <div class="mb-8">
                        <h5 class="font-medium text-gray-700 mb-4">Data Almarhum</h5>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nik_almarhum" class="block text-sm text-gray-700 mb-2">NIK</label>
                                <input type="text" id="nik_almarhum" name="nik_almarhum" maxlength="16" minlength="16"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nik_almarhum') border-red-500 @enderror"
                                    value="{{ old('nik_almarhum', $meninggal->nik_almarhum ?? '') }}">
                                @error('nik_almarhum')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_almarhum" class="block text-sm text-gray-700 mb-2">Nama</label>
                                <input type="text" id="nama_almarhum" name="nama_almarhum"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nama_almarhum') border-red-500 @enderror"
                                    value="{{ old('nama_almarhum', $meninggal->nama_almarhum ?? '') }}">
                                @error('nama_almarhum')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tempat_lahir_almarhum" class="block text-sm text-gray-700 mb-2">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir_almarhum" name="tempat_lahir_almarhum"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tempat_lahir_almarhum') border-red-500 @enderror"
                                    value="{{ old('tempat_lahir_almarhum', $meninggal->tempat_lahir_almarhum ?? '') }}">
                                @error('tempat_lahir_almarhum')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir_almarhum" class="block text-sm text-gray-700 mb-2">Tanggal
                                    Lahir</label>
                                <input type="date" id="tanggal_lahir_almarhum" name="tanggal_lahir_almarhum"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tanggal_lahir_almarhum') border-red-500 @enderror"
                                    value="{{ old('tanggal_lahir_almarhum', $meninggal->tanggal_lahir_almarhum ?? '') }}">
                                @error('tanggal_lahir_almarhum')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block text-sm text-gray-700 mb-2">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('jenis_kelamin') border-red-500 @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $meninggal->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $meninggal->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="warga_negara" class="block text-sm text-gray-700 mb-2">Warga Negara</label>
                                <input type="text" id="warga_negara" name="warga_negara"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('warga_negara') border-red-500 @enderror"
                                    value="{{ old('warga_negara', $meninggal->warga_negara ?? 'Indonesia') }}">
                                @error('warga_negara')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="agama" class="block text-sm text-gray-700 mb-2">Agama</label>
                                <select id="agama" name="agama"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('agama') border-red-500 @enderror">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Buddha"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha
                                    </option>
                                    <option value="Konghucu"
                                        {{ old('agama', $meninggal->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu</option>
                                </select>
                                @error('agama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="pekerjaan_almarhum" class="block text-sm text-gray-700 mb-2">Pekerjaan</label>
                                <input type="text" id="pekerjaan_almarhum" name="pekerjaan_almarhum"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('pekerjaan_almarhum') border-red-500 @enderror"
                                    value="{{ old('pekerjaan_almarhum', $meninggal->pekerjaan_almarhum ?? '') }}">
                                @error('pekerjaan_almarhum')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="alamat_almarhum" class="block text-sm text-gray-700 mb-2">Alamat</label>
                            <textarea id="alamat_almarhum" name="alamat_almarhum" rows="3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('alamat_almarhum') border-red-500 @enderror">{{ old('alamat_almarhum', $meninggal->alamat_almarhum ?? 'Gedong RT 001 RW 001 Desa Gedongboyountung Kec.Turi Kab Lamongan.') }}</textarea>
                            @error('alamat_almarhum')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Bagian Informasi Kematian -->
                    <div class="mb-8">
                        <h5 class="font-medium text-gray-700 mb-4">Informasi Kematian</h5>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal_meninggal" class="block text-sm text-gray-700 mb-2">Tanggal
                                    Meninggal</label>
                                <input type="date" id="tanggal_meninggal" name="tanggal_meninggal"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tanggal_meninggal') border-red-500 @enderror"
                                    value="{{ old('tanggal_meninggal', $meninggal->tanggal_meninggal ?? '') }}">
                                @error('tanggal_meninggal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="sebab_meninggal" class="block text-sm text-gray-700 mb-2">Sebab
                                    Meninggal</label>
                                <input type="text" id="sebab_meninggal" name="sebab_meninggal"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('sebab_meninggal') border-red-500 @enderror"
                                    value="{{ old('sebab_meninggal', $meninggal->sebab_meninggal ?? 'Sakit') }}">
                                @error('sebab_meninggal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tempat_meninggal" class="block text-sm text-gray-700 mb-2">Tempat
                                    Meninggal</label>
                                <input type="text" id="tempat_meninggal" name="tempat_meninggal"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tempat_meninggal') border-red-500 @enderror"
                                    value="{{ old('tempat_meninggal', $meninggal->tempat_meninggal ?? 'Di Rumah') }}">
                                @error('tempat_meninggal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Data Pelapor -->
                    <div class="mb-8">
                        <h5 class="font-medium text-gray-700 mb-4">Data Pelapor</h5>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="nik_pelapor" class="block text-sm text-gray-700 mb-2">NIK</label>
                                <input type="text" id="nik_pelapor" name="nik_pelapor" maxlength="16" minlength="16"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nik_pelapor') border-red-500 @enderror"
                                    value="{{ old('nik_pelapor', $meninggal->nik_pelapor ?? '') }}">
                                @error('nik_pelapor')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_pelapor" class="block text-sm text-gray-700 mb-2">Nama</label>
                                <input type="text" id="nama_pelapor" name="nama_pelapor"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nama_pelapor') border-red-500 @enderror"
                                    value="{{ old('nama_pelapor', $meninggal->nama_pelapor ?? '') }}">
                                @error('nama_pelapor')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tempat_lahir_pelapor" class="block text-sm text-gray-700 mb-2">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir_pelapor" name="tempat_lahir_pelapor"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tempat_lahir_pelapor') border-red-500 @enderror"
                                    value="{{ old('tempat_lahir_pelapor', $meninggal->tempat_lahir_pelapor ?? '') }}">
                                @error('tempat_lahir_pelapor')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir_pelapor" class="block text-sm text-gray-700 mb-2">Tanggal
                                    Lahir</label>
                                <input type="date" id="tanggal_lahir_pelapor" name="tanggal_lahir_pelapor"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tanggal_lahir_pelapor') border-red-500 @enderror"
                                    value="{{ old('tanggal_lahir_pelapor', $meninggal->tanggal_lahir_pelapor ?? '') }}">
                                @error('tanggal_lahir_pelapor')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="jenis_kelamin_pelapor" class="block text-sm text-gray-700 mb-2">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin_pelapor" name="jenis_kelamin_pelapor"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('jenis_kelamin_pelapor') border-red-500 @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin_pelapor', $meninggal->jenis_kelamin_pelapor ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin_pelapor', $meninggal->jenis_kelamin_pelapor ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin_pelapor')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="alamat_pelapor" class="block text-sm text-gray-700 mb-2">Alamat</label>
                            <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('alamat_pelapor') border-red-500 @enderror">{{ old('alamat_pelapor', $meninggal->alamat_pelapor ?? 'Gedong RT 001 RW 001 Desa Gedongboyountung Kec.Turi Kab Lamongan.') }}</textarea>
                            @error('alamat_pelapor')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="window.history.back()"
                            class="px-6 py-2.5 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
