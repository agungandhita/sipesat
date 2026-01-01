@extends('frontend.layouts.main')

@section('container')
    <main class="bg-white min-h-screen pb-24">
        <!-- Hero Artikel -->
        <div class="max-w-4xl mx-auto px-6 pt-12 md:pt-20">
            <header class="mb-12">
                <div class="flex items-center gap-4 mb-6">
                    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-widest rounded-full">
                        Informasi
                    </span>
                    <time datetime="{{ $informasi->created_at->format('Y-m-d') }}" class="text-sm text-gray-500 font-medium">
                        {{ $informasi->created_at->format('d F Y') }}
                    </time>
                </div>
                
                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-8">
                    {{ $informasi->judul }}
                </h1>

                <div class="flex items-center gap-4 pb-8 border-b border-gray-100">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">Administrator</p>
                        <p class="text-xs text-gray-500">{{ config('template.content.village_name') }}</p>
                    </div>
                </div>
            </header>

            @if ($informasi->gambar_sampul)
                <figure class="mb-12">
                    <div class="rounded-3xl overflow-hidden bg-gray-50 aspect-[16/9]">
                        <img src="{{ asset('storage/' . $informasi->gambar_sampul) }}" alt="{{ $informasi->judul }}"
                            class="w-full h-full object-cover">
                    </div>
                    @if($informasi->judul)
                        <figcaption class="mt-4 text-sm text-center text-gray-400 italic">
                            {{ $informasi->judul }}
                        </figcaption>
                    @endif
                </figure>
            @endif

            <!-- Konten -->
            <div class="prose prose-lg prose-indigo max-w-none text-gray-700 leading-relaxed mb-16">
                {!! $informasi->konten !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mb-20">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-3 px-6 py-3 bg-gray-50 hover:bg-gray-100 text-gray-900 font-bold rounded-2xl transition-all duration-200 border border-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Berita
                </a>
            </div>

            <!-- Bagian Komentar -->
            <section id="komentar" class="pt-16 border-t border-gray-100">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-bold text-gray-900">
                        Komentar 
                        <span class="ml-2 px-2.5 py-0.5 bg-gray-100 text-gray-500 text-sm rounded-lg font-bold">
                            {{ $komentar->sum(function($k) { return 1 + $k->replies->count(); }) }}
                        </span>
                    </h2>
                </div>

                <!-- Form Komentar Utama -->
                @auth
                    <div class="mb-12 bg-gray-50 rounded-3xl p-8 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Tulis Komentar</h3>
                        <form action="{{ route('komentar.store', $informasi->informasi_id) }}" method="POST" class="space-y-4">
                            @csrf
                            <textarea name="isi_komentar" rows="4"
                                class="w-full px-5 py-4 bg-white border border-gray-200 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder:text-gray-400"
                                placeholder="Bagikan pemikiran Anda..." required></textarea>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition-all duration-300 transform hover:-translate-y-0.5">
                                    Kirim Komentar
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="mb-12 p-8 bg-gray-50 rounded-3xl border border-dashed border-gray-200 text-center">
                        <p class="text-gray-600 mb-6 font-medium">Silakan masuk untuk berpartisipasi dalam diskusi.</p>
                        <a href="{{ route('login') }}"
                            class="inline-flex px-8 py-3 bg-white border border-gray-200 text-gray-900 font-bold rounded-2xl hover:bg-gray-50 transition-all duration-200">
                            Masuk Ke Akun
                        </a>
                    </div>
                @endauth

                <!-- Daftar Komentar -->
                <div class="space-y-8">
                    @forelse ($komentar ?? [] as $item)
                        @include('frontend.pengumuman.partials.comment', ['comment' => $item, 'level' => 0])
                    @empty
                        <div class="text-center py-12">
                            <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <p class="text-gray-400 font-medium italic">Belum ada komentar dalam diskusi ini.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
@endsection
