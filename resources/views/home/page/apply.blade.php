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
    </div>

    <div class="bg-white relative z-20 mx-auto w-full rounded-t-3xl min-h-[380px]">


        <div class="md:max-w-full px-4 py-10 sm:px-6 lg:px-12 lg:pt-20 mx-auto">
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

            </div>
        </div>

        <form action="{{ route('career.upload', ['id' => $loker->vacancy_id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="max-w-[120rem] px-4 pb-10 sm:px-6 lg:px-8 lg:pb-20 md:mt-10 mx-auto">
                {{-- @dd($loker); --}}
                {{-- @dump(route('career.upload', ['id' => $loker->vacancy_id])) --}}
                <div class="flex overflow-hidden border-[1px] rounded-t-xl min-h-[56px] bg-gray-200 px-4 py-2">
                    <h1 class="text-lg md:text-2xl font-semibold font-[sans-serif] capitalize text-slate-800 pt-1">
                        data diri
                    </h1>
                </div>

                <div class="bg-white justify-between mb-4 border-[1px] rounded-b-xl shadow-best">
                    <input type="hidden" name="vacancy_id" value="{{ $loker->vacancy_id }}">
                    <div class="p-5 ">
                        <div class="grid md:grid-cols-2 gap-x-6">
                            <div class="py-3">
                                <span class="md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    nama lengkap
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="text" name="nama_lengkap"  placeholder="Nama Lengkap"
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('nama_lengkap') }}" />
                                </div>
                            </div>


                            <div class="py-3">
                                <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    Alamat Email
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="email" name="email" placeholder="john@gmail.com"
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('email') }}" />
                                </div>
                            </div>

                        </div>

                        <div class="grid md:grid-cols-2 gap-x-6">
                            <div class="py-3">
                                <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    Tanggal lahir
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="date" name="tanggal_lahir" placeholder="First Name"
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-slate-600 w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('tanggal_lahir') }}" />
                                </div>
                            </div>


                            <div class="py-3">
                                <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    nomor telp
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="text" name="no_telepon" id="no_telepon" maxlength="14"
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-slate-600 w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('no_telepon') }}"
                                        placeholder="08123456789">
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-x-6">

                            <div class="py-3">

                                <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    Kabupaten
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="text" name="kabupaten" placeholder="Lamongan" required
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('kabupaten') }}" />
                                </div>
                            </div>

                            <div class="py-3">

                                <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                    Kecamatan
                                </span>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                                <div class="relative flex items-center">
                                    <input type="text" name="kecamatan" placeholder="Maduran"
                                        class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('kecamatan') }}" />
                                </div>
                            </div>

                        </div>

                        <div class="max-w-full">
                            <label for="alamat_lengkap"
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Alamat
                                Lengkap</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <textarea name="alamat_lengkap" required
                                class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all"
                                rows="3" placeholder="Alamat Lengkap"></textarea>
                        </div>

                        <div class="max-w-full">
                            <div class="my-4">
                                <label for="textarea-email-label"
                                    class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">upload
                                    CV, Lamaran kerja, Ijazah</label>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                            </div>
                            <input type="file" name="cv" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg"
                                class="file-input file-input-bordered file-input-warning w-full max-w-full rounded-xl fill-yellow-400 border-[1px]" />
                        </div>

                        <div class="max-w-full">
                            <div class="my-4">
                                <label for="textarea-email-label"
                                    class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">upload
                                    foto</label>
                                <sup class="text-red-700 md:text-lg font-medium">
                                    *
                                </sup>
                            </div>
                            <input type="file" name="foto" accept="image/*"
                                class="file-input file-input-bordered file-input-warning w-full max-w-full rounded-xl fill-yellow-400 border-[1px]" />
                        </div>

                    </div>
                </div>

                <div class="flex overflow-hidden border-[1px] rounded-t-xl min-h-[56px] bg-gray-200 px-4 py-2">
                    <h1 class="text-lg md:text-2xl font-semibold font-[sans-serif] capitalize text-slate-800 pt-1">
                        Riwayat Pendidikan
                    </h1>
                </div>
                <div class="bg-white justify-between mb-4 border-[1px] rounded-b-xl shadow-best">
                    <div class="p-5 grid md:grid-cols-2 gap-x-6">
                        <div>
                            <label for="textarea-email-label"
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">jenjang
                                pendidikan</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <select name="jenjang_pendidikan"
                                    class="select select-ghostpx-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-alltransition-all capitalize">
                                    <option disabled selected class="text-base">Jenjang Pendidikan</option>
                                    <option value="SMK" class="text-base">SMK</option>
                                    <option value="SMA" class="text-base">SMA</option>
                                    <option value="S1" class="text-base">S1</option>
                                    <option value="S2" class="text-base">S2</option>
                                </select>

                            </div>
                        </div>

                        <div>
                            <label for="textarea-email-label"
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Nama
                                Institusi</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="text" name="nama_institusi" placeholder="Sekolah/Universitas"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('nama_institusi') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="p-5 grid md:grid-cols-2 gap-x-6">
                        <div>
                            <label for="textarea-email-label"
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Jurusan/Bidang
                                Keahlian</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="text" name="jurusan" placeholder="Jurusan"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('jurusan') }}" />
                            </div>
                        </div>

                        <div>
                            <label for=""
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Nilai/IPK</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="text" name="nilai" placeholder="Masukkan Nilai/IPK (Contoh: 3.50)"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('nilai') }}" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- pengalaman kerja  --}}

                <div class=" overflow-hidden border-[1px] rounded-t-xl min-h-[56px] bg-gray-200 px-4 py-2">
                    <h1 class="text-lg md:text-2xl font-semibold font-[sans-serif] capitalize text-slate-800 pt-1">
                        Pengalaman Kerja
                    </h1>
                    <span class="font-semibold font-[sans-serif] capitalize text-red-500 pt-2">
                        kosongkan Jika Tidak Punya Pengalaman Kerja
                    </span>
                </div>

                <div class="bg-white justify-between mb-4 border-[1px] rounded-b-xl shadow-best">
                    <div class="p-5 grid md:grid-cols-2 gap-x-6">
                        <div>
                            <label for="textarea-email-label"
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Nama
                                Perusahaan</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="text" name="nama_perusahaan" placeholder="PT/CV"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('nama_perusahaan') }}" />
                            </div>
                        </div>

                        <div>
                            <label
                                class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Sebagai</label>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="text" name="sebagai" placeholder="Posisi"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all" value="{{ old('sebagai') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="p-5 grid md:grid-cols-2 gap-x-6">
                        <div>
                            <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Tanggal mulai
                            </span>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="date" name="start_date"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-slate-600 w-full text-lg border outline-[#007bff] rounded-xl transition-all"  />
                            </div>
                        </div>

                        <div>
                            <span class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">
                                Tanggal Keluar
                            </span>
                            <sup class="text-red-700 md:text-lg font-medium">
                                *
                            </sup>
                            <div class="relative flex items-center">
                                <input type="date" name="end_date"
                                    class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-slate-600 w-full text-lg border outline-[#007bff] rounded-xl transition-all" />
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <label for="textarea-email-label"
                            class="pt-3 md:pt-6 font-semibold text-lg md:text-2xl capitalize text-gray-600">Deskripsi
                            Pekerjaan</label>
                        <sup class="text-red-700 md:text-lg font-medium">
                            *
                        </sup>
                        <textarea name="deskripsi_pekerjaan"
                            class="px-2 mt-2 bg-[#ffff] focus:bg-transparent text-black w-full text-lg border outline-[#007bff] rounded-xl transition-all"
                            rows="3" placeholder="deskripsi Pekerjaan"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="m-6 w-full md:w-[10%] px-3 py-2 rounded-lg text-white md:text-xl font-semibold tracking-wider border-none outline-none bg-yellow-400 hover:bg-yellow-600">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
