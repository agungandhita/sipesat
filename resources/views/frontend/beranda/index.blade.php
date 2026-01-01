@extends('frontend.layouts.main')

@section('container')
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Jumbotron -->
        <div class="py-6">
            @include('frontend.beranda._Jumbotron')
        </div>

        <!-- Kenapa SIPESAT -->
        <div class="py-12">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-900">Layanan Digital Unggulan</h2>
                <p class="text-gray-500 mt-2">Komitmen kami memberikan pelayanan terbaik bagi seluruh warga.</p>
            </div>
            @include('frontend.beranda._hero')
        </div>
    </div>
</div>
@endsection
