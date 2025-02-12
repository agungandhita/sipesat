<div class="min-h-[500px] md:pt-8">
    <div class="grid md:grid-cols-2 justify-center items-center gap-10">
        <!-- Kolom Teks -->
        <div class="max-md:order-1">
            <h1 class="md:text-5xl text-3xl font-bold md:!leading-[55px]">Selamat datang di Sistem Pelayanan Surat Terpadu <span
                    class="text-blue-700">(SIPESAT)</span></h1>
            {{-- <h1 class="md:text-2xl text-blue-700 text-xl font-semibold md:!leading-[55px]">Sistem Informasi Pelayanan Surat</h1> --}}
            <span class="text-black font-bold">Desa Gedongboyountung, Kecamatan Turi, Kabupaten Lamongan</span>
            <p class="mt-4 text-lg leading-relaxed text-black font-serif text-justify">✨Kemudahan, Transparansi, dan
                Pelayanan Terbaik untuk masyarakat. Kami berkomitmen untuk memberikan layanan desa yang cepat, mudah, dan transparan. Lewat platform ini,
                Anda dapat mengakses informasi desa, layanan administrasi, dan kebutuhan lainnya secara langsung.
            </p>
            <!-- Search Bar -->
            <div class="bg-white mt-10 flex px-1 py-1.5 rounded-r-2xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] overflow-hidden">
                <input type='email' placeholder='Cari Sesuatu...'
                    class="w-full outline-none bg-white pl-4 border-none" />
                <button type='button'
                    class="bg-blue-700 hover:bg-blue-500 font-bold transition-all text-white rounded-r-full px-5 py-2">Search</button>
            </div>
            <!-- Logo Organisasi -->
            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 items-center">
                <img src="{{ asset('img/bpd.png') }}" class="w-28 mx-auto fill-black" alt="BPD Logo" />
                <img src="{{ asset('img/karang-taruna2-removebg-preview.png') }}" class="w-28 mx-auto" alt="Karang Taruna Logo" />
                <img src="{{ asset('img/PKK-removebg-preview.png') }}" class="w-32 mx-auto" alt="PKK Logo" />
                <img src="{{ asset('img/Posyandu.png') }}" class="w-32 mx-auto" alt="Posyandu Logo" />
            </div>
        </div>
        <!-- Kolom Gambar -->
        <div class="max-md:mt-12 h-full">
            <img src="{{ asset('img/main.jpg') }}" alt="Banner SIPESAT" class="w-full h-full object-cover rounded-lg" />
        </div>
    </div>
</div>
