@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 pt-20">
        <div class="bg-white rounded-lg shadow-md max-w-3xl mx-auto">
            <div class="p-8">
                <h4 class="text-lg font-semibold mb-8">Form Surat Keterangan Domisili</h4>
                <form action="{{ route('domisili.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-8 mb-8">
                        <div>
                            <label for="nama" class="block text-sm text-gray-700 mb-2">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nik" class="block text-sm text-gray-700 mb-2">NIK</label>
                            <input type="text" id="nik" name="nik" maxlength="16" minlength="16"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('nik') border-red-500 @enderror"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tempat_lahir" class="block text-sm text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('tempat_lahir') border-red-500 @enderror"
                                value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pekerjaan" class="block text-sm text-gray-700 mb-2">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan"
                                class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('pekerjaan') border-red-500 @enderror"
                                value="{{ old('pekerjaan') }}">
                            @error('pekerjaan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="alamat" class="block text-sm text-gray-700 mb-2">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4"
                            class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="keterangan" class="block text-sm text-gray-700 mb-2">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4"
                            class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="keperluan" class="block text-sm text-gray-700 mb-2">Keperluan</label>
                        <input type="text" id="keperluan" name="keperluan"
                            class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:outline-none focus:ring-1 focus:ring-blue-500 @error('keperluan') border-red-500 @enderror"
                            value="{{ old('keperluan') }}">
                        @error('keperluan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
