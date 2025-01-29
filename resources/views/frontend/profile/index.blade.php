@extends('frontend.layouts.main')

@section('container')
    <div class="bg-white text-black text-[15px]">
        <div class="px-4 sm:px-10 mt-5 md:mt-2">
            <div class="md:grid md:grid-cols-2 items-center justify-center">
                <div class="">
                    <img src="{{ asset('img/lamongan.png') }}" alt="logo" class='w-28 md:w-64 mx-auto' />
                    <h1 class="text-xl md:text-3xl font-sans text-black md:mt-4 text-center font-bold">Desa Gedongboyountung</h1>
                    <p class="text-xl md:text-xl font-sans text-black md:mt-4 text-center font-semibold">
                        kecamatan Turi, Kabupaten Lamongan, Provinsi Jawa Timur,
                    </p>
                </div>
                <div>
                    <h2 class="md:text-4xl text-3xl font-semibold mb-4">"Visi"</h2>
                    <p>mewujudkan pelayanan masyarakat yang profesional dan transparan demi kemajuan dan kesejahteraan masyarakat Desa Gedong Boyo untung.</p>

                    <br>

                    <h2 class="md:text-4xl text-3xl font-semibold mb-4">"Misi"</h2>
                    <ul class="text-justify mx-3 md:block">
                        <li class="list-disc">Meningkatkan kualitas pelayanan masyarakat yang profesional, mudah diakses, dan transparan.</li>
                        <li class="list-disc">Mendorong pembangunan infrastruktur desa untuk mendukung kemajuan ekonomi dan sosial masyarakat.</li>
                        <li class="list-disc">Mengembangkan potensi sumber daya manusia dan sumber daya alam untuk kesejahteraan bersama.</li>
                        <li class="list-disc">Mewujudkan lingkungan desa yang bersih, aman, dan nyaman sebagai tempat tinggal yang ideal.</li>
                    </ul>
                </div>
            </div>

            <!-- Team Section -->
            <div class="font-[sans-serif] px-4 py-8 bg-gradient-to-t from-green-50 to-purple-50 mt-8">
                <div class="lg:max-w-5xl mx-auto">
                    <!-- Kades -->
                    <div class="text-center mb-12">
                        <h4 class="text-gray-800 text-2xl font-bold">Moh Naufal Al Bardany</h4>
                        <p class="text-lg text-blue-600 mt-2">Kepala Desa (Kades)</p>
                    </div>

                    <!-- Grid Team -->
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
                        <!-- Kasi -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Zainul</h4>
                            <p class="text-sm text-blue-600">Kasi Pemerintahan</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Mujianto</h4>
                            <p class="text-sm text-blue-600">Kasi Kemasyarakatan</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Nur Kholidah</h4>
                            <p class="text-sm text-blue-600">Kasi Pelayanan</p>
                        </div>

                        <!-- Kasun -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Sholikhan</h4>
                            <p class="text-sm text-blue-600">Kasun Gedong</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Akhmad Zaini</h4>
                            <p class="text-sm text-blue-600">Kasun Klari</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Sukandar</h4>
                            <p class="text-sm text-blue-600">Kasun Dampet</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Mokhamad Saiful Buchori</h4>
                            <p class="text-sm text-blue-600">Kasun Mlanggeng</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Askari</h4>
                            <p class="text-sm text-blue-600">Kasun Boyosari</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Mujianto</h4>
                            <p class="text-sm text-blue-600">Kasun Nataan PJ</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Suut</h4>
                            <p class="text-sm text-blue-600">Kasun Ngujungjobo</p>
                        </div>

                        <!-- Sekdes & Kaur -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Zainul</h4>
                            <p class="text-sm text-blue-600">Sekdes PJ</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Hartini</h4>
                            <p class="text-sm text-blue-600">Kaur Keuangan</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">Zakaria</h4>
                            <p class="text-sm text-blue-600">Kaur Perencanaan</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-gray-800 text-lg font-bold mb-2">-</h4>
                            <p class="text-sm text-blue-600">Kaur Umum</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white min-h-screen p-8">
                <h1 class="text-blue-700 text-4xl font-bold mb-4 md:text-center">PETA LOKASI DESA</h1>
                <h2 class="text-xl mb-8 md:text-center">Peta Lokasi Desa Gedongboyountung</h2>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Desa Gedongboyountung</h2>

                        <div class="mb-8">
                            <h3 class="text-xl text-gray-600 mb-4">Batas Desa</h3>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-bold mb-2">Utara</h4>
                                    <p>Desa Sukoanyar</p>
                                </div>

                                <div>
                                    <h4 class="font-bold mb-2">Timur</h4>
                                    <p>Desa Kemlagilor</p>
                                </div>

                                <div>
                                    <h4 class="font-bold mb-2">Selatan</h4>
                                    <p>Desa Sukorejo</p>
                                </div>

                                <div>
                                    <h4 class="font-bold mb-2">Barat</h4>
                                    <p>Desa Balun</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-100 p-4 rounded-lg">
                            <h3 class="font-bold mb-2">Informasi Wilayah</h3>
                            <p>Kecamatan: Turi</p>
                            <p>Kabupaten: Lamongan</p>
                            <p>Provinsi: Jawa Timur</p>
                        </div>
                    </div>

                    <!-- Right Column - Map -->
                    <div class="bg-gray-100 rounded-lg p-4 min-h-[400px] flex items-center justify-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.125361068662!2d112.37376931789282!3d-7.046242726470318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778f5f44444445%3A0x5f5265adb9afd13e!2sGedongboyountung%2C%20Kec.%20Turi%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1706521150459!5m2!1sid!2sid"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-lg">
                        </iframe>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
