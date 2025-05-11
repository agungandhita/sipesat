@extends('frontend.layouts.main')

@section('container')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/lamongan.png') }}" alt="Admin">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900">Admin</a>
                                <p class="text-base text-gray-500">Desa Gedongboyountung</p>
                                <p class="text-base text-gray-500"><time pubdate
                                        datetime="{{ $informasi->created_at->format('Y-m-d') }}"
                                        title="{{ $informasi->created_at->format('d F Y') }}">{{ $informasi->created_at->format('d M, Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                        {{ $informasi->judul }}</h1>
                </header>

                @if ($informasi->gambar_sampul)
                    <figure class="mb-8">
                        <img src="{{ asset('storage/' . $informasi->gambar_sampul) }}" alt="{{ $informasi->judul }}"
                            class="w-full h-44 object-contain rounded-lg">
                        <figcaption class="mt-2 text-sm text-center text-gray-500">{{ $informasi->judul }}</figcaption>
                    </figure>
                @endif

                <div class="prose max-w-none">
                    {!! $informasi->konten !!}
                </div>

                <!-- Bagian Komentar -->
                <section class="mt-12 pt-8 border-t border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Komentar ({{ count($komentar ?? []) }})</h2>

                    <!-- Form Komentar -->
                    @auth
                        <div class="mb-8 bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tinggalkan Komentar</h3>
                            <form action="{{ route('informasi.komentar.store', $informasi->informasi_id) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <textarea name="isi_komentar" rows="4"
                                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500"
                                        placeholder="Tulis komentar Anda di sini..." required></textarea>
                                </div>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                    Kirim Komentar
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="mb-8 bg-gray-50 p-6 rounded-lg text-center">
                            <p class="text-gray-700 mb-4">Silakan login untuk meninggalkan komentar</p>
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Login
                            </a>
                        </div>
                    @endauth

                    <!-- Daftar Komentar -->
                    <div class="space-y-6">
                        @forelse ($komentar ?? [] as $item)
                            <div class="flex space-x-4 p-4 bg-gray-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold">
                                            {{ substr($item->user->name ?? 'User', 0, 1) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="text-sm font-semibold text-gray-900">{{ $item->user->name ?? 'User' }}
                                        </h4>
                                        <span class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700">{{ $item->isi_komentar }}</p>

                                    @auth
                                        @if (auth()->id() == $item->user_id || auth()->user()->role == 'admin')
                                            <div class="mt-2 flex space-x-2">
                                                <form action="{{ route('hapus.komentar', $item->komentar_id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-xs text-red-600 hover:underline">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <p class="text-gray-500">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('berita.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar Pengumuman
                    </a>
                </div>
            </article>
        </div>
    </main>
@endsection
