@extends('auth.layouts.main')

@section('container')
<div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
    <div class="bg-white max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
      <div class="text-center">
        <a href="javascript:void(0)"><img
          src="{{ asset('img/lamongan.png') }}" alt="logo" class='w-23 inline-block' />
        </a>
        <h1 class="text-gray-800 text-2xl font-bold">
            pemdes desa gedongboyountung
        </h1>
      </div>

      <form action="/register/post" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Nama</label>
                <input name="nama" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Masukan Nama" />
              </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">Email</label>
            <input name="email" type="email" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Masukan Email" />
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">Password</label>
            <input name="password" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Masukan password" />
          </div>
        </div>

        <div class="!mt-8">
          <button type="submit" class="w-full cursor-pointer py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
           Daftar Akun
          </button>
        </div>
        <p class="text-gray-800 text-sm mt-6 text-center">Sudah Punya Akun? <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline ml-1">Login Disini</a></p>
      </form>
    </div>
  </div>
@endsection
