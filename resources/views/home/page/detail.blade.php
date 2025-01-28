@extends('home.layouts.main')

@section('container')
    <div class="before:z-10 object-contain before:absolute before:w-full before:h-full before:inset-0">
        <img src="{{ asset('bahan/career.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-90"
            alt="Banner Image">
        <div
            class="min-h-[280px] relative z-20 max-w-6xl mx-auto flex flex-col justify-center items-center text-center p-6 mb-16 md:mb-40 mt-2 md:mt-20 ">
            <h2
                class="text-yellow-400 stroke-2 text-2xl md:text-6xl font-bold font-[sans-serif] stroke-slate-950 mb-6 capitalize">
                Karir Anda
                Dimulai Dari Sini
            </h2>
            <p class="text-white font-bold text-sm sm:text-xl mt-4">
                Kami percaya bahwa untuk dapat menghasilkan karya terbaik, kami membutuhkan profesional muda yang memiliki
                integritas tinggi, antusias melakukan perubahan.
            </p>
        </div>


        <div class="bg-white relative z-20 mx-auto w-full rounded-t-3xl min-h-[380px] pb-10">

            <div class="md:max-w-full px-4 py-10 sm:px-6 lg:px-12 lg:pt-20 mx-auto border-b">
                <h1 class="text-2xl md:text-4xl font-semibold capitalize">
                    {{ $loker->title }}
                </h1>
                <div class="md:grid md:grid-cols-2 ">
                    <div class="md:flex justify-between">
                        <div class="flex gap-x-4 mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 md:w-14 fill-slate-600">
                                <path
                                    d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
                                </path>
                            </svg>
                            <p
                                class="mt-2 text-base text-gray-800 leading-relaxed md:text-2xl md:pt-2 capitalize font-[sans-serif]">
                                : {{ $loker->cabang }}</p>
                        </div>

                        <div class="flex gap-x-4 mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 md:w-14 fill-slate-600">
                                <path
                                    d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z">
                                </path>
                            </svg>
                            <p
                                class="mt-2 text-base text-gray-800 leading-relaxed md:text-2xl md:pt-2 capitalize font-[sans-serif]">
                                : {{ \Carbon\Carbon::parse($loker->posting_date)->translatedFormat('l, d F Y') }}

                            </p>
                        </div>

                        <div class="flex gap-x-4 mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 md:w-14 fill-slate-600">
                                <path
                                    d="M7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7ZM15 7H9V19H15V7ZM7 7H4V19H7V7ZM17 7V19H20V7H17ZM9 3V5H15V3H9Z">
                                </path>
                            </svg>
                            <p
                                class="mt-2 text-base text-gray-800 leading-relaxed md:text-2xl md:pt-2 capitalize font-[sans-serif]">
                                : {{ $loker->level }} </p>

                        </div>

                    </div>

                    <div class="mt-4 flex justify-center items-center md:flex md:justify-end md:items-end">
                        <a href="{{ route('career.apply', $loker->vacancy_id) }}">
                        <button type="button"
                            class="px-3 py-2 md:px-6 md:py-3 rounded-lg text-white text-sm md:text-xl tracking-wider font-semibold outline-none bg-orange-600 hover:bg-orange-700 border-2 border-orange-600 transition-all duration-300">Lamar
                            Disini</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="pl-6 md:px-12 pt-6 flex flex-col md:flex-row">
                <div class="w-full lg:w-8/12 mt-10 md:pr-10">
                    <h1 class="text-2xl md:text-4xl font-semibold capitalize mb-4">
                        Deskripsi Pekerjaan
                    </h1>
                    <div class="prose" style="max-width: 100%">
                        <div class="prose" style="max-width: 100%">
                            @if (is_array($loker->job_description) && count($loker->job_description) > 0)
                                <ul class="list-disc space-y-6 pl-2">
                                    @foreach ($loker->job_description as $desc)
                                        <li class="text-gray-600 text-base md:text-xl justify-start">{{ $desc }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-600 text-base md:text-xl">Tidak ada deskripsi pekerjaan.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-10">
                        <h1 class="text-2xl md:text-4xl font-semibold capitalize mb-4">
                            Kualifikasi
                        </h1>
                        <div class="prose" style="max-width: 100%">
                            @if (is_array($loker->qualifications) && count($loker->qualifications) > 0)
                                <ul class="list-disc space-y-6 pl-2">
                                    @foreach ($loker->qualifications as $qual)
                                        <li class="text-gray-600 text-base md:text-xl">{{ $qual }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-600 text-base md:text-xl">Tidak ada deskripsi pekerjaan.</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- rigth componen --}}
                <div class="w-full lg:w-4/12 mt-10">
                    <div class="max-w-xl">
                        <p class="font-bold text-gray-600 text-lg md:text-2xl">
                            Job Overview
                        </p>
                        <div class="flex gap-x-4 mt-4 border-b border-slate-300 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 md:w-12 fill-slate-600">
                                <path
                                    d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z">
                                </path>
                            </svg>
                            <div>
                                <p
                                    class="text-base font-[sans-serif] pt-1 font-bold text-gray-600 leading-relaxed md:text-2xl capitalize">

                                    Batas Waktu
                                </p>
                                <p class="text-base font-[sans-serif] text-gray-600 leading-relaxed md:text-xl capitalize">
                                    {{ \Carbon\Carbon::parse($loker->closing_date)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-x-4 mt-4 border-b border-slate-300 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 md:w-12 fill-slate-600">
                                <path
                                    d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z">
                                </path>
                            </svg>

                            <div>
                                <p
                                    class="text-base font-[sans-serif] font-bold text-gray-600 leading-relaxed md:text-2xl capitalize">
                                    Lokasi
                                </p>
                                <p class="text-base font-[sans-serif] text-gray-600 leading-relaxed md:text-xl capitalize">
                                    {{ $loker->cabang }}, {{ $loker->provinsi }}
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-x-4 mt-4 border-b border-slate-300 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 md:w-12 fill-slate-600"
                                fill="currentColor">
                                <path
                                    d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z">
                                </path>
                            </svg>

                            <div>
                                <p
                                    class="text-base font-[sans-serif] font-bold text-gray-600 leading-relaxed md:text-2xl capitalize">
                                    Tipe
                                </p>
                                <p class="text-base font-[sans-serif] text-gray-600 leading-relaxed md:text-xl capitalize">
                                    {{ $loker->type_job }}
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="mt-20">
                        <div class="flex justify-between">
                            <p class="text-lg md:text-2xl font-semibold capitalize">
                                lowongan kerja
                            </p>
                            <span class="text-slate-500 text-lg pr-4 md:text-2xl font-[sans-serif] capitalize hover:underline">
                                <a href="">
                                    lihat lowongan lainya
                                </a>
                            </span>
                        </div>

                        @foreach ($list as $item)

                        <div class="">
                            <ul class="">
                                <li class="pt-6 w-full font-semibold text-lg md:text-2xl capitalize mb-3 hover:text-blue-500 hover:underline cursor-pointer">
                                    {{ $item->title }} , {{ $item->level }}
                                </li>
                                <span class="text-lg md:text-xl font-[sans-serif]">
                                    {{ $item->cabang }} ,  {{ $item->provinsi }}
                                </span>
                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
