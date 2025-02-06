@extends('admin.layouts.main')

@section('container')
    <section>
        {{-- isi --}}
        <div class="pt-24">
            {{-- card atas  --}}
            <div class="mb-6 px-2">
                <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-6">

                    <div class="bg-[#0b1739] shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full rounded-lg overflow-hidden">
                        <div class="inline-block bg-[#edf2f7] rounded-lg mt-4 py-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10" viewBox="0 0 511.999 511.999">
                                <path fill="#06d"
                                    d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                                    data-original="#0066dd" />
                                <path fill="#00ad3c"
                                    d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                                    data-original="#00ad3c" />
                                <path fill="#00831e"
                                    d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                                    data-original="#00831e" />
                                <path fill="#0084ff"
                                    d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                                    data-original="#0084ff" />
                                <path fill="#ff4131"
                                    d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                                    data-original="#ff4131" />
                                <path fill="#ffba00"
                                    d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                                    data-original="#ffba00" />
                            </svg>
                        </div>

                        <div class="mt-12">
                            <h3 class="text-xl font-semibold text-white capitalize">Surat masuk</h3>
                            <p class="mt-2 text-4xl text-gray-300 font-semibold">200 surat</p>
                        </div>


                    </div>
                    <div
                        class="bg-[#0b1739] shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full rounded-lg overflow-hidden">
                        <div class="inline-block bg-[#edf2f7] rounded-lg mt-4 py-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10" viewBox="0 0 511.999 511.999">
                                <path fill="#06d"
                                    d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                                    data-original="#0066dd" />
                                <path fill="#00ad3c"
                                    d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                                    data-original="#00ad3c" />
                                <path fill="#00831e"
                                    d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                                    data-original="#00831e" />
                                <path fill="#0084ff"
                                    d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                                    data-original="#0084ff" />
                                <path fill="#ff4131"
                                    d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                                    data-original="#ff4131" />
                                <path fill="#ffba00"
                                    d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                                    data-original="#ffba00" />
                            </svg>
                        </div>

                        <div class="mt-12">
                            <h3 class="text-xl font-semibold text-white capitalize">Surat Keluar</h3>
                            <p class="mt-2 text-4xl text-gray-300 font-semibold">100 surat</p>
                        </div>

                    </div>
                    <div
                        class="bg-[#0b1739] shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full rounded-lg overflow-hidden">
                        <div class="inline-block bg-[#edf2f7] rounded-lg mt-4 py-2 px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10" viewBox="0 0 511.999 511.999">
                                <path fill="#06d"
                                    d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                                    data-original="#0066dd" />
                                <path fill="#00ad3c"
                                    d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                                    data-original="#00ad3c" />
                                <path fill="#00831e"
                                    d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                                    data-original="#00831e" />
                                <path fill="#0084ff"
                                    d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                                    data-original="#0084ff" />
                                <path fill="#ff4131"
                                    d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                                    data-original="#ff4131" />
                                <path fill="#ffba00"
                                    d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                                    data-original="#ffba00" />
                            </svg>
                        </div>

                        <div class="mt-12">
                            <h3 class="text-xl font-semibold text-white capitalize">Surat Permohonan Masuk</h3>
                            <p class="mt-2 text-4xl text-gray-300 font-semibold">200 surat</p>
                        </div>


                    </div>
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
