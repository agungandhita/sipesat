@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 mt-32">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ isset($informasi) ? 'Edit Informasi' : 'Tambah Informasi Baru' }}</h2>
                <a href="{{ route('informasi.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>

            <form
                action="{{ isset($informasi) ? route('informasi.update', $informasi->informasi_id) : route('informasi.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($informasi))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul"
                            value="{{ old('judul', $informasi->judul ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="pengumuman" {{ old('kategori', $informasi->kategori ?? '') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="berita" {{ old('kategori', $informasi->kategori ?? '') == 'berita' ? 'selected' : '' }}>Berita</option>
                            <option value="agenda" {{ old('kategori', $informasi->kategori ?? '') == 'agenda' ? 'selected' : '' }}>Agenda</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gambar_sampul" class="block text-sm font-medium text-gray-700">Gambar Sampul</label>
                        <input type="file" name="gambar_sampul" id="gambar_sampul"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                            accept="image/*">
                        @error('gambar_sampul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if (isset($informasi) && $informasi->gambar_sampul)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $informasi->gambar_sampul) }}" alt="Preview"
                                    class="h-32 w-auto">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('excerpt', $informasi->excerpt ?? '') }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" id="konten"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('konten', $informasi->konten ?? '') }}</textarea>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="draft"
                                {{ old('status', $informasi->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published"
                                {{ old('status', $informasi->status ?? '') == 'published' ? 'selected' : '' }}>Published
                            </option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            {{ isset($informasi) ? 'Update Informasi' : 'Simpan Informasi' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <!-- Froala Editor CSS -->
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet">
        <!-- Froala Editor JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
        </script>
        <script>
            // Inisialisasi Froala Editor
            new FroalaEditor('#konten', {
                // Konfigurasi dasar
                height: 300,
                toolbarButtons: [
                    'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|',
                    'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|',
                    'insertLink', 'insertImage', 'insertTable', '|',
                    'specialCharacters', 'insertHR', 'clearFormatting', '|',
                    'html', 'undo', 'redo'
                ],
                // Konfigurasi upload gambar
                imageUploadURL: '{{ route('informasi.upload-image') }}',
                imageUploadParams: {
                    _token: '{{ csrf_token() }}'
                },
                imageUploadMethod: 'POST',
                // Konfigurasi tambahan
                placeholderText: 'Tulis konten informasi di sini...',
                language: 'id',
                // Handler untuk upload gambar
                imageUploadErrorCallback: function(data) {
                    console.error('Error uploading image:', data);
                },
                events: {
                    'image.uploaded': function(response) {
                        // Callback setelah gambar berhasil diupload
                        console.log('Image uploaded successfully:', response);
                    }
                }
            });
        </script>
    @endpush
@endsection
