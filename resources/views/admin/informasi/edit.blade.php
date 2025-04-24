@extends('admin.layouts.main')

@section('container')
    <div class="container mx-auto px-4 mt-32">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Edit Informasi</h2>
                <a href="{{ route('informasi.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    Kembali
                </a>
            </div>

            <form action="{{ route('informasi.update', $informasi->informasi_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $informasi->judul) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>
                        @error('judul')
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
                        @if ($informasi->gambar_sampul)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $informasi->gambar_sampul) }}" alt="Preview"
                                    class="h-32 w-auto">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="ringkasan" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                        <textarea name="ringkasan" id="ringkasan" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('ringkasan', $informasi->ringkasan) }}</textarea>
                        @error('ringkasan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" id="konten"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('konten', $informasi->konten) }}</textarea>
                        @error('konten')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="draft" {{ old('status', $informasi->status) == 'draft' ? 'selected' : '' }}>
                                Draft</option>
                            <option value="published"
                                {{ old('status', $informasi->status) == 'published' ? 'selected' : '' }}>Published
                            </option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                            Update Informasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
        </script>
        <script>
            new FroalaEditor('#konten', {
                height: 300,
                toolbarButtons: [
                    'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|',
                    'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|',
                    'insertLink', 'insertImage', 'insertTable', '|',
                    'specialCharacters', 'insertHR', 'clearFormatting', '|',
                    'html', 'undo', 'redo'
                ],
                imageUploadURL: '{{ route('informasi.upload-image') }}',
                imageUploadParam: 'file',
                imageUploadParams: {
                    _token: '{{ csrf_token() }}'
                },
                imageUploadMethod: 'POST',
                placeholderText: 'Tulis konten informasi di sini...',
                language: 'id',
                imageUploadErrorCallback: function(data) {
                    console.error('Error uploading image:', data);
                    alert('Gagal mengunggah gambar: ' + (data.message || 'Terjadi kesalahan'));
                },
                events: {
                    'image.uploaded': function(response) {
                        console.log('Image uploaded successfully:', response);
                    },
                    'image.error': function(error, response) {
                        console.error('Froala Editor image error:', error, response);
                    }
                }
            });
        </script>
    @endpush
@endsection
