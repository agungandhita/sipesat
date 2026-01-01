@extends('frontend.layouts.main')

@section('container')
    <div class="bg-white min-h-screen py-12 md:py-20">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Header -->
            <header class="mb-16">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">Pengumuman & Berita</h1>
                <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
                    Informasi terkini mengenai kegiatan, pengumuman resmi, dan berita seputar {{ config('template.content.village_name', 'Desa') }}.
                </p>
            </header>

            <!-- Grid Konten -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-12">
                @forelse ($informasi as $item)
                    <article class="flex flex-col group">
                        <a href="{{ route('berita.show', ['slug' => $item->slug]) }}" class="block overflow-hidden rounded-2xl bg-gray-100 mb-6 aspect-[16/9]">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </a>
                        
                        <div class="flex items-center gap-3 mb-3">
                            <time datetime="{{ $item->created_at->format('Y-m-d') }}" class="text-xs font-bold uppercase tracking-widest text-indigo-600">
                                {{ $item->created_at->format('d M Y') }}
                            </time>
                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                            <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Informasi</span>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors leading-snug">
                            <a href="{{ route('berita.show', ['slug' => $item->slug]) }}">
                                {{ $item->judul }}
                            </a>
                        </h2>

                        <p class="text-gray-600 leading-relaxed line-clamp-2 mb-6">
                            @if (isset($item->ringkasan))
                                {{ $item->ringkasan }}
                            @else
                                {{ Str::limit(strip_tags($item->isi), 120) }}
                            @endif
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('berita.show', ['slug' => $item->slug]) }}" class="inline-flex items-center gap-2 text-sm font-bold text-gray-900 hover:text-indigo-600 transition-colors group/link">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-24 text-center border-2 border-dashed border-gray-100 rounded-3xl">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 3v5h5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Informasi</h3>
                        <p class="text-gray-500">Saat ini belum ada pengumuman atau berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($informasi->hasPages())
                <div class="mt-20 pt-10 border-t border-gray-100">
                    {{ $informasi->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
