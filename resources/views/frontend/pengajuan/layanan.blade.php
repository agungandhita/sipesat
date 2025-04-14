@extends('frontend.layouts.main')

@section('container')
    <!-- Team -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Jenis Jenis Layanan</h2>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-12">
            <div class="text-center">
                <a href="" class="cursor-pointer">
                    <img class="rounded-xl sm:size-48 lg:size-60 mx-auto" src="{{ asset('img/lamongan.png') }}" alt="Avatar">
                    <div class="mt-2 sm:mt-4">
                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg ">
                            Pengajuan
                        </h3>
                        <p class="text-xs text-gray-600 sm:text-sm lg:text-base ">
                            Surat Keterangan tidak mampu
                        </p>
                    </div>
                </a>
            </div>
            <!-- End Col -->

            <div class="text-center">
                <a href="" class="cursor-pointer">
                    <img class="rounded-xl sm:size-48 lg:size-60 mx-auto" src="{{ asset('img/lamongan.png') }}"
                        alt="Avatar">
                    <div class="mt-2 sm:mt-4">
                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg ">
                            Pengajuan
                        </h3>
                        <p class="text-xs text-gray-600 sm:text-sm lg:text-base ">
                            Surat Keterangan domisili
                        </p>
                    </div>
                </a>
            </div>
            <!-- End Col -->

            <div class="text-center">
                <a href="" class="cursor-pointer">
                    <img class="rounded-xl sm:size-48 lg:size-60 mx-auto" src="{{ asset('img/lamongan.png') }}"
                        alt="Avatar">
                    <div class="mt-2 sm:mt-4">
                        <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg ">
                            Pengajuan
                        </h3>
                        <p class="text-xs text-gray-600 sm:text-sm lg:text-base ">
                            Surat Keterangan Meninggal
                        </p>
                    </div>
                </a>
            </div>

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Team -->
@endsection
