<header class='shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] sticky top-0 py-3 px-4 sm:px-10 bg-white z-50 min-h-[70px]'>
    <div class='flex flex-wrap items-center gap-4'>
        <a href="javascript:void(0)"><img src="{{ asset('img/logo.png') }}" alt="logo" class='w-14 md:w-16' />
        </a>

        <div id="collapseMenu"
            class='max-lg:hidden lg:!block max-lg:fixed max-lg:before:fixed transition-all duration-300 ease-in-out max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
            <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                    <path
                        d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                        data-original="#000000"></path>
                    <path
                        d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                        data-original="#000000"></path>
                </svg>
            </button>

            <ul
                class='lg:ml-12 lg:flex gap-x-6 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                <li class='mb-6 hidden max-lg:block'>
                    <a href="javascript:void(0)">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" class='w-14' />
                        <h1 class="text-base mt-3 pl-2 font-semibold text-slate-700">
                            Resto Jepang Kekinian
                        </h1>
                    </a>
                </li>
                <li class='max-lg:border-b max-lg:py-3 px-3'>
                    <a href='/'
                        class='{{ Request::is('/') ? 'text-yellow-400' : 'text-black' }} hover:text-yellow-400 block font-semibold transition-all'>
                        Home
                    </a>
                </li>
                <li class='max-lg:border-b max-lg:py-3 px-3'>
                    <a href='/about'
                        class='{{ Request::is('about') ? 'text-yellow-400' : 'text-black' }} hover:text-yellow-400 block font-semibold transition-all'>
                        About
                    </a>
                </li>
                <li class='max-lg:border-b max-lg:py-3 px-3'>
                    <a href='javascript:void(0)'
                        class='{{ Request::is('menu') ? 'text-yellow-400' : 'text-black' }} hover:text-yellow-400 block font-semibold transition-all'>
                        Menu
                    </a>
                </li>
                <li class='max-lg:border-b max-lg:py-3 px-3'>
                    <a href='/career'
                        class='{{ Request::is('career') ? 'text-yellow-400' : 'text-black' }} hover:text-yellow-400 block font-semibold transition-all'>
                        Career
                    </a>
                </li>
            </ul>

        </div>

        <div class='flex ml-auto'>
            <button class='mr-6 font-semibold border-none outline-none text-base'><a href='/login'
                    class='text-yellow-400 hover:underline'>Login</a></button>
            <button
                class='bg-yellow-400 hover:bg-yellow-700 transition-all text-white text-base rounded-full px-5 py-2.5'><a
                    href="/register">Sign
                    up</a> </button>
            <button id="toggleOpen" class='lg:hidden ml-7'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</header>


<script>
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
        if (collapseMenu.style.display === 'block') {
            collapseMenu.style.display = 'none';
        } else {
            collapseMenu.style.display = 'block';
        }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);
</script>
</body>
