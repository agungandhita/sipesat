@extends('admin.layouts.main')

@section('container')
    <section>
        {{-- isi --}}
        <div class="pt-24">
            {{-- card atas  --}}
            <div class="mb-6 px-2">
                <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3 2xl:grid-cols-3 pb-4 ">

                    <div
                        class="items-center justify-between p-4 bg-yellow-300 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
                        <div class="w-full">

                            <div class="flex justify-between pt-4 pb-12">
                                <div>
                                    <h1 class="font-bold text-6xl text-black">8</h1>
                                    <h1 class="text-black text-xl">Arsip Surat</h1>
                                </div>


                                <svg xmlns="http://www.w3.org/2000/svg" class="w-28 opacity-50 text-black" viewBox="0 0 24 24">
                                    <path
                                        d="M6 7V4C6 3.44772 6.44772 3 7 3H13.4142L15.4142 5H21C21.5523 5 22 5.44772 22 6V16C22 16.5523 21.5523 17 21 17H18V20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H6ZM6 9H4V19H16V17H6V9Z"
                                        fill="currentColor"></path>
                                </svg>

                            </div>

                            <a href=""
                                class="absolute bottom-0  left-0 right-0 bg-yellow-400/50 font-semibold text-lg text-center rounded-b-md p-2 text-black">Lihat
                                Detail</a>


                        </div>
                        <div class="w-full" id="new-products-chart"></div>
                    </div>
                    {{-- card-1 end --}}



                    <div
                        class="items-center justify-between p-4 bg-cyan-500 text-black border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
                        <div class="w-full">

                            <div class="flex justify-between pt-4 pb-12">
                                <div>
                                    <h1 class="font-bold text-6xl text-black">9</h1>
                                    <h1 class="text-black text-xl">Surat Masuk</h1>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-28 opacity-50 text-black">
                                    <path
                                        d="M5 3C4.5313 3 4.12549 3.32553 4.02381 3.78307L2.02381 12.7831C2.00799 12.8543 2 12.927 2 13V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V13C22 12.927 21.992 12.8543 21.9762 12.7831L19.9762 3.78307C19.8745 3.32553 19.4687 3 19 3H5ZM19.7534 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H4.24662L5.80217 5H18.1978L19.7534 12Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>

                            <a href=""
                                class="absolute bottom-0 left-0 right-0 bg-cyan-600/50 font-semibold text-lg text-center rounded-b-md p-2">Lihat
                                Detail</a>


                        </div>
                        <div class="w-full" id="new-products-chart"></div>
                    </div>
                    {{-- card-2 end --}}


                    {{-- card-3 start --}}

                    <div
                        class="items-center justify-between p-4 bg-green-500 border border-gray-200 relative rounded-lg shadow-sm dark:border-gray-700 sm:p-6 ">
                        <div class="w-full">

                            <div class="flex justify-between pt-4 pb-12">
                                <div>
                                    <h1 class="font-bold text-6xl">20</h1>
                                    <h1 class="text-black text-xl">Surat Keluar</h1>
                                </div>


                               <svg xmlns="http://www.w3.org/2000/svg" class="w-28 opacity-50 text-black" viewBox="0 0 24 24" fill="currentColor"><path d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z"></path></svg>


                            </div>

                            <a href=""
                                class="absolute bottom-0 left-0 right-0 bg-green-600/50 font-semibold text-lg text-center rounded-b-md p-2">Lihat
                                Detail</a>


                        </div>
                        <div class="w-full" id="new-products-chart"></div>
                    </div>
                    {{-- card-3 end --}}
                </div>

            </div>
            {{-- akhir card --}}
            <div class="grid gap-4 grid-cols-1 lg:grid-cols-2 mt-4">
                <div class="bg-white border-[1px] border-main3 rounded-md h-[400px]">

                </div>
                <div class="bg-white border-[1px] border-main3 rounded-md h-[400px]">

                </div>
            </div>


            <div class="bg-white border-[1px] border-main3 rounded-md h-[400px] w-full mt-4">

            </div>
        </div>

    </section>
@endsection
