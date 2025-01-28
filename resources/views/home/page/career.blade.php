@extends('home.layouts.main')

@section('container')
    <div class="before:z-10 object-contain before:absolute before:w-full before:h-full before:inset-0">
        <img src="{{ asset('bahan/rekrut.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-85"
            alt="Banner Image">
        <div
            class="min-h-[280px] relative z-20 max-w-6xl mx-auto flex flex-col justify-end items-end text-center p-6 mb-16 md:mb-48 mt-2 md:mt-20 ">
            <h2 class="text-yellow-400 stroke-2 text-2xl md:text-4xl font-bold mb-6 capitalize">mari bergabung dengan kita
            </h2>
            <button type="button"
                class="px-3 py-2 md:px-6 md:py-3 rounded-full text-white text-sm md:text-xl tracking-wider font-semibold outline-none bg-orange-600 hover:bg-orange-700 border-2 border-orange-600 transition-all duration-300">Getting
                started now</button>
        </div>

        <div class="bg-white relative z-20 mx-auto w-full rounded-t-2xl min-h-[380px] pb-20">
            <div class="mx-auto pt-7 mb-10 lg:mb-14 px-8">
                <h2 class="text-2xl font-extrabold md:text-5xl md:leading-tight dark:text-white italic">RECENT VACANCY
                </h2>
                <div class="mt-1 w-64 h-3 bg-gradient-to-r from-red-900"></div>
            </div>
            <div class="md:flex md:flex-nowrap gap-x-4 px-7">
                @if (isset($message))
                    <p class="text-2xl font-bold text-yellow-400">{{ $message }}</p>
                @else
                    @foreach ($data as $item)
                        <div
                            class="bg-white border border-slate-300 shadow-best w-full max-w-sm md:max-w-lg rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
                            <div class="p-5">
                                <h3 class="text-2xl md:text-4xl font-semibold ">{{ $item->title }}</h3>
                                <div class="flex gap-x-9 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 md:w-6 fill-slate-600">
                                        <path
                                            d="M7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7ZM15 7H9V19H15V7ZM7 7H4V19H7V7ZM17 7V19H20V7H17ZM9 3V5H15V3H9Z">
                                        </path>
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-800 leading-relaxed md:text-lg capitalize">:
                                        {{ $item->level }} </p>
                                </div>
                                <div class="flex gap-x-9 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 md:w-6 fill-slate-600">
                                        <path
                                            d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z">
                                        </path>
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-800 leading-relaxed md:text-lg">:
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                                </div>
                                <div class="flex gap-x-9 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-5 md:w-6 fill-slate-600">
                                        <path
                                            d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
                                        </path>
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-800 leading-relaxed md:text-lg capitalize">:
                                        {{ $item->cabang }}, {{ $item->provinsi }} </p>
                                </div>
                                <div class="flex justify-end">
                                    <a href="{{ route('career.detail', $item->vacancy_id) }}">
                                        <button type="button"
                                            class="mt-10 px-3 py-2 rounded-lg text-white text-sm tracking-wider border-none outline-none bg-yellow-400 hover:bg-yellow-600">Lihat
                                            Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
