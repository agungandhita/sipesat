@extends('frontend.layouts.main')

@section('container')
    <!-- News & Announcements Section -->
    <div class="bg-gradient-to-b from-white to-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium mb-3">
                    Informasi Terkini
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Pengumuman dan Berita</h1>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full mb-6"></div>
                <p class="max-w-2xl mx-auto text-gray-600">Seluruh pengumuman dan berita tentang desa dapat di lihat disini
                </p>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($informasi as $item)
                    <!-- Article Card -->
                    <article
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 group">
                        <a href="{{ route('berita.show', ['slug' => $item->slug]) }}" class="block">
                            <div class="relative overflow-hidden h-56">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                                        alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                                        Informasi
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="text-sm">
                                        <p class="text-gray-900 font-medium">Admin</p>
                                        <p class="text-gray-500">{{ $item->created_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    @if (isset($item->ringkasan))
                                        {{ $item->ringkasan }}
                                    @else
                                        {{ Str::limit(strip_tags($item->isi), 100) }}
                                    @endif
                                </p>
                                <div class="flex items-center text-blue-600 font-medium">
                                    <span>Baca Selengkapnya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 ml-2 transition-transform duration-300 group-hover:translate-x-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Belum ada informasi</h3>
                        <p class="text-gray-500">Informasi dan pengumuman akan ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($informasi->hasPages())
                <div class="mt-16 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        @if ($informasi->onFirstPage())
                            <span class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 cursor-not-allowed">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @else
                            <a href="{{ $informasi->previousPageUrl() }}"
                                class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif

                        @foreach ($informasi->getUrlRange(1, $informasi->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-md text-sm font-medium {{ $page == $informasi->currentPage() ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        @if ($informasi->hasMorePages())
                            <a href="{{ $informasi->nextPageUrl() }}"
                                class="px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-100">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <span class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 cursor-not-allowed">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </div>
    <!-- End News & Announcements Section -->
@endsection
