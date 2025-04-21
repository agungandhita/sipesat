@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 pt-20">
        <div class="bg-white rounded-lg shadow-md max-w-3xl mx-auto">
            <div class="p-8">
                <h4 class="text-xl font-semibold mb-6">Form Surat Keterangan Tidak Mampu</h4>
                <form action="{{ isset($sktm) ? route('sktm.update', $sktm->sktm_id) : route('sktm.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" id="nama" name="nama"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                                    value="{{ old('nama', $sktm->nama ?? '') }}">
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                                <input type="text" id="nik" name="nik" maxlength="16" minlength="16"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nik') border-red-500 @enderror"
                                    value="{{ old('nik', $sktm->nik ?? '') }}">
                                @error('nik')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tempat_lahir') border-red-500 @enderror"
                                    value="{{ old('tempat_lahir', $sktm->tempat_lahir ?? '') }}">
                                @error('tempat_lahir')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                    Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tanggal_lahir') border-red-500 @enderror"
                                    value="{{ old('tanggal_lahir', $sktm->tanggal_lahir ?? '') }}">
                                @error('tanggal_lahir')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div>
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('pekerjaan') border-red-500 @enderror"
                                value="{{ old('pekerjaan', $sktm->pekerjaan ?? '') }}">
                            @error('pekerjaan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('alamat') border-red-500 @enderror">{{ old('alamat', $sktm->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $sktm->keterangan ?? '') }}</textarea>
                            @error('keterangan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
                            <input type="text" id="keperluan" name="keperluan"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('keperluan') border-red-500 @enderror"
                                value="{{ old('keperluan', $sktm->keperluan ?? '') }}">
                            @error('keperluan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" onclick="window.history.back()"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
