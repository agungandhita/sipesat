<header
    class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full rounded-b-4xl bg-white shadow-2xl text-sm py-3">
    <nav class="max-w-[90rem] w-full mx-auto px-2 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold focus:outline-none focus:opacity-80" href="#"
                aria-label="Brand">
                <img src="{{ asset('img/lamongan.png') }}" alt="logo" class='w-14 md:w-16' />
            </a>
            <div class="hidden md:block">
                <h1 class="text-xl px-3 font-bold capitalize">desa
                    <span class="text-base capitalize">gedungboyountung</span>
                </h1>
            </div>
            <div class="sm:hidden">
                <button type="button"
                    class="hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example"
                    aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
        </div>
        <div id="hs-navbar-example"
            class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block"
            aria-labelledby="hs-navbar-example-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-semibold text-black text-base hover:text-blue-600 focus:outline-none"
                    href="{{ Route('home') }}" aria-current="page">Home</a>
                <a class="font-semibold text-black text-base hover:text-blue-700 focus:outline-none focus:text-gray-400"
                    href="{{ Route('profil') }}">Profil desa</a>
                <a class="font-semibold text-black text-base hover:text-blue-700 focus:outline-none focus:text-gray-400"
                    href="{{ Route('pengumuman') }}">Pengumuman</a>

                <a class="font-semibold text-black text-base hover:text-blue-700 focus:outline-none focus:text-gray-400"
                    href="{{ Route('layanan') }}">layanan</a>


                <div class="flex gap-x-3">
                    @guest
                        <a href='{{ route('login') }}'
                            class='font-semibold text-white text-base rounded-xl bg-blue-700 px-5 py-1 focus:outline-none focus:text-gray-400'>Login</a>
                        <a href="/register"
                            class="font-semibold text-black text-base rounded-xl bg-white border-2 border-blue-700 px-5 py-1 focus:outline-none focus:text-gray-400">Register</a>
                    @else
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white font-medium rounded-full text-sm inline-flex items-center border border-blue-300 p-2"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-blue-700">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 ">
                            <ul class="py-2 text-gray-700 " aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href='{{ route('pengajuan.riwayat') }}'
                                        class="block px-4 py-2 hover:bg-gray-100">Pengajuan</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="block cursor-pointer w-full text-left px-4 py-2 hover:bg-gray-100 text-black">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                @endguest
            </div>
        </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const toggleButton = document.getElementById('hs-navbar-example-collapse');
        const navbar = document.getElementById('hs-navbar-example');

        toggleButton.addEventListener('click', () => {
            const isHidden = navbar.classList.contains('hidden');
            navbar.classList.toggle('hidden', !isHidden);
        });
    });
</script>
