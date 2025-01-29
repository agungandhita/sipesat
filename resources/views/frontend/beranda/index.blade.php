@extends('frontend.layouts.main')

@section('container')
<div class="bg-white text-black text-[15px]">
    <div class="px-4 sm:px-10 mt-1">
        @include('frontend.beranda._Jumbotron')
        <div class="mt-8 bg-gray-50 px-4 sm:px-10 py-12">
            <div class="max-w-7xl mx-auto">
                <div class="md:text-center max-w-3xl mx-auto">
                    <h2 class="md:text-4xl text-3xl font-bold mb-6">Selamat Datang di <span class="text-blue-700">SIPESAT</span></h2>
                    <p class="md:text-xl">SIPESAT hadir sebagai solusi terdepan dalam pelayanan administrasi Desa Gedungboyountung, Kecamatan Turi, Kabupaten Lamongan. Kami berkomitmen untuk memberikan layanan yang cepat, mudah, dan transparan bagi seluruh masyarakat </p>
                </div>
                @include('frontend.beranda._hero')
            </div>
        </div>
        <div class="mb-6 bg-gray-50 px-4 sm:px-10">
            <h1 class="text-center text-3xl font-bold">
                Sambutan kepala desa
            </h1>
        </div>
        <div class="px-4 sm:px-10 mb-10">
            <div class="max-w-7xl w-full mx-auto">
              <div class="grid md:grid-cols-2 items-center gap-10">
                <div class="flex w-full h-full items-center justify-center">
                  <img src="{{ asset('img/kades 1.jpg') }}" alt="Premium Benefits"
                    class="w-80 h-8w-80 object-contain rounded-lg" />
                </div>
                <div>
                  <h2 class="md:text-4xl text-3xl font-semibold mb-6">"Membangun Masa Depan Bersama dengan Modernitas dan Keanggunan"</h2>
                  <p>Kami dengan bangga mempersembahkan pengalaman terbaik bagi setiap warga dan tamu yang berkunjung ke Desa Gedongboyountung. Dengan semangat kebersamaan dan komitmen untuk kemajuan, kami terus berupaya menciptakan lingkungan yang nyaman, modern, dan penuh keanggunan.</p>
                 </div>
              </div>
            </div>
          </div>
    </div>
</div>



@endsection
