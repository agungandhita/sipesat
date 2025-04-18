@extends('admin.layouts.main')

@section('container')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md max-w-2xl mx-auto">
        <div class="p-6">
            <h4 class="text-2xl font-semibold text-center mb-6">Form Surat Keterangan Tidak Mampu</h4>
            <form action="{{ isset($sktm) ? route('sktm.update', $sktm->sktm_id) : route('sktm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="w-full">
                    <tr>
                        <td class="py-2 pr-4 align-top w-1/4"><label for="nama" class="font-medium">Nama</label></td>
                        <td class="py-2">
                            <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded px-2 py-1 @error('nama') border-red-500 @enderror" value="{{ old('nama', $sktm->nama ?? '') }}">
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="nik" class="font-medium">NIK</label></td>
                        <td class="py-2">
                            <input type="text" id="nik" name="nik" maxlength="16" minlength="16" class="w-full border border-gray-300 rounded px-2 py-1 @error('nik') border-red-500 @enderror" value="{{ old('nik', $sktm->nik ?? '') }}">
                            @error('nik')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="tempat_lahir" class="font-medium">Tempat/Tgl Lahir</label></td>
                        <td class="py-2 flex gap-2">
                            <div class="w-1/2">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="w-full border border-gray-300 rounded px-2 py-1 @error('tempat_lahir') border-red-500 @enderror" value="{{ old('tempat_lahir', $sktm->tempat_lahir ?? '') }}">
                                @error('tempat_lahir')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full border border-gray-300 rounded px-2 py-1 @error('tanggal_lahir') border-red-500 @enderror" value="{{ old('tanggal_lahir', $sktm->tanggal_lahir ?? '') }}">
                                @error('tanggal_lahir')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="pekerjaan" class="font-medium">Pekerjaan</label></td>
                        <td class="py-2">
                            <input type="text" id="pekerjaan" name="pekerjaan" class="w-full border border-gray-300 rounded px-2 py-1 @error('pekerjaan') border-red-500 @enderror" value="{{ old('pekerjaan', $sktm->pekerjaan ?? '') }}">
                            @error('pekerjaan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="alamat" class="font-medium">Alamat</label></td>
                        <td class="py-2">
                            <textarea id="alamat" name="alamat" rows="2" class="w-full border border-gray-300 rounded px-2 py-1 @error('alamat') border-red-500 @enderror">{{ old('alamat', $sktm->alamat ?? '') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="keterangan" class="font-medium">Keterangan</label></td>
                        <td class="py-2">
                            <textarea id="keterangan" name="keterangan" rows="3" class="w-full border border-gray-300 rounded px-2 py-1 @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $sktm->keterangan ?? '') }}</textarea>
                            @error('keterangan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2 pr-4 align-top"><label for="keperluan" class="font-medium">Keperluan</label></td>
                        <td class="py-2">
                            <input type="text" id="keperluan" name="keperluan" class="w-full border border-gray-300 rounded px-2 py-1 @error('keperluan') border-red-500 @enderror" value="{{ old('keperluan', $sktm->keperluan ?? '') }}">
                            @error('keperluan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                </table>
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('sktm.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors duration-200">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
