@extends('home.layouts.main')

@section('container')
    <div class="bg-white text-black text-[15px]">
        <div class="px-4 sm:px-10 mt-1">
            @include('home.page._jumbotron')
            <div class="mt-8 bg-gray-50 px-4 sm:px-10 py-12">
                <div class="max-w-7xl mx-auto">
                    <div class="md:text-center max-w-3xl mx-auto">
                        <h2 class="md:text-4xl text-3xl font-bold mb-6">Temukan Cita Rasa Kami</h2>
                        <p class="md:text-xl">Buka dunia penuh kemungkinan dengan cita rasa eksklusif kami. Jelajahi
                            bagaimana rasa yang unik, kami dapat membuat anda dan keluarga Anda untuk menikmati cita rasa
                            otentik dari cita rasa jepang asli.</p>
                    </div>
                    @include('home.page._hero')
                </div>
            </div>

            <div class="mt-20">
                <div class="md:text-center max-w-3xl mx-auto">
                    <h2 class="md:text-4xl text-3xl font-bold mb-6">Temukan Penawaran Unik yang kami sajikan</h2>
                    <p class="md:text-xl">tentunya dengan harga yang pas di kantong dan rasa asli otentik dari chef
                        berpengalaman dari jepang, yang akan membawa anda berselancar seperti makan di restoran jepang asli
                    </p>
                </div>
                <div class="mt-14">
                    <div class="grid md:grid-cols-2 items-center gap-16">
                        <div>
                            <img src="{{ asset('bahan/13.jpg') }}"
                                class="w-fit object-contain rounded-lg h- shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
                        </div>
                        <div class="max-w-full">
                            <h3 class="text-4xl font-semibold mb-4">Tailored Customization</h3>
                            <p class="md:text-xl">Experience unparalleled customization options tailored to suit your unique
                                needs. Our platform provides
                                a wide array of features, ensuring you have the flexibility to personalize your journey.</p>
                            <button type="button"
                                class="bg-yellow-400 hover:bg-yellow-600 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                                Learn More
                            </button>
                        </div>
                        <div class="max-md:order-1 max-w-full">
                            <h3 class="text-4xl font-semibold mb-4">Optimized Performance</h3>
                            <p class="md:text-xl">Unlock top-notch performance with our advanced optimization techniques. We
                                prioritize speed,
                                efficiency, and reliability to ensure a seamless experience, no matter the complexity of
                                your tasks.</p>
                            <button type="button"
                                class="bg-yellow-400 hover:bg-yellow-600 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                                Learn More
                            </button>
                        </div>
                        <div>
                            <img src="{{ asset('bahan/14.jpg') }}"
                                class="w-full object-contain rounded-lg h- shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 bg-gray-50 px-4 sm:px-10 py-12">
                <div class="max-w-7xl max-md:max-w-lg mx-auto">
                    <h2 class="md:text-4xl text-3xl font-bold md:text-center mb-14">Our Latest Blogs</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">
                        <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
                            <div class="relative overflow-hidden">
                                <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                                    class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">
                                    June 10, 2023</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold line-clamp-1">A Guide to Igniting Your Imagination</h3>
                                <button type="button"
                                    class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                                    More</button>
                            </div>
                        </div>
                        <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
                            <div class="relative overflow-hidden">
                                <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2"
                                    class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">
                                    April 20, 2023</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold line-clamp-1">Hacks to Supercharge Your Day</h3>
                                <button type="button"
                                    class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                                    More</button>
                            </div>
                        </div>
                        <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
                            <div class="relative overflow-hidden">
                                <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3"
                                    class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">
                                    August 16, 2023</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold line-clamp-1">Trends and Predictions</h3>
                                <button type="button"
                                    class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                                    More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="mt-28">
        <div class="grid md:grid-cols-2 justify-center items-center gap-10">
          <div>
            <h2 class="md:text-4xl text-3xl font-bold mb-6">Unlock Premium Features</h2>
            <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim aute sit. Elit
              occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
            <button type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">
              Upgrade Now
            </button>
          </div>
          <div class="text-center">
            <img src="https://readymadeui.com/login-image.webp" alt="Premium Benefits" class="w-full mx-auto" />
          </div>
        </div>
      </div> --}}



            <div class="mt-1 bg-gray-50 px-4 sm:px-10 py-12">
                <h1 class="text-center mb-8 font-semibold text-4xl ">
                    Testimonial
                </h1>
                <div class="max-w-6xl mx-auto">
                    <div class="grid md:grid-cols-2 items-center gap-8">
                        <div class="space-y-6 bg-gray-100 rounded-md p-6 max-w-md max-md:order-1">
                            <div class="flex sm:items-center max-sm:flex-col-reverse">
                                <div class="mr-3">
                                    <h4 class="text-base font-semibold">John Doe</h4>
                                    <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit
                                        ullamco veniam minim
                                        aute sit.</p>
                                </div>
                                <img src='https://readymadeui.com/profile_2.webp'
                                    class="w-16 h-16 rounded-full max-sm:mb-2" />
                            </div>
                            <div
                                class="flex sm:items-center max-sm:flex-col-reverse p-6 relative lg:left-12 bg-white shadow-[0_2px_20px_-4px_rgba(93,96,127,0.2)] rounded-md">
                                <div class="mr-3">
                                    <h4 class="text-base font-semibold">Mark Adair</h4>
                                    <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit
                                        ullamco veniam minim
                                        aute sit.</p>
                                </div>
                                <img src='https://readymadeui.com/profile_3.webp'
                                    class="w-16 h-16 rounded-full max-sm:mb-2" />
                            </div>
                            <div class="flex sm:items-center max-sm:flex-col-reverse">
                                <div class="mr-3">
                                    <h4 class="text-base font-semibold">Simon Konecki</h4>
                                    <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit
                                        ullamco veniam minim
                                        aute sit.</p>
                                </div>
                                <img src='https://readymadeui.com/profile_4.webp'
                                    class="w-16 h-16 rounded-full max-sm:mb-2" />
                            </div>
                        </div>
                        <div>
                            <h2 class="md:text-4xl text-3xl font-bold">We are loyal with our customer</h2>
                            <div class="mt-4">
                                <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                                    aute sit. Elit
                                    occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="mt-28">
        <h2 class="md:text-4xl text-3xl font-bold text-center mb-14">Application Metrics</h2>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6 max-lg:gap-12">
          <div class="text-center">
            <h3 class="text-4xl font-semibold">5.4<span class="text-blue-600">M+</span></h3>
            <p class="text-base font-semibold mt-4">Total Users</p>
            <p class="mt-2">The total number of registered users on the platform.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">$80<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Revenue</p>
            <p class="mt-2">The total revenue generated by the application.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">100<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Engagement</p>
            <p class="mt-2">The level of user engagement with the application's content and features.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">99.9<span class="text-blue-600">%</span></h3>
            <p class="text-base font-semibold mt-4">Server Uptime</p>
            <p class="mt-2">The percentage of time the server has been operational and available.</p>
          </div>
        </div>
      </div> --}}

            {{-- accordion --}}

            <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12 space-y-6">
                <div class="md:text-center max-w-2xl mx-auto mb-14">
                    <h2 class="md:text-4xl text-3xl font-bold mb-6">Frequently Asked Questions</h2>
                    <p>Explore common questions and find answers to help you make the most out of our services. If you don't
                        see
                        your question here, feel free to contact us for assistance.</p>
                </div>



                <div id="accordion-open" data-accordion="open">
                    <h2 id="accordion-open-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                            aria-controls="accordion-open-body-1">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg> What is Flowbite?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of
                                interactive components built on top of Tailwind CSS including buttons, dropdowns, modals,
                                navbars, and more.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                                    href="/docs/getting-started/introduction/"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start
                                developing websites even faster with components on top of Tailwind CSS.</p>
                        </div>
                    </div>

                    <h2 id="accordion-open-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>Is there a Figma file available?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed
                                using the Figma software so everything you see in the library has a design equivalent in our
                                Figma file.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out the <a
                                    href="https://flowbite.com/figma/"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based
                                on the utility classes from Tailwind CSS and components from Flowbite.</p>
                        </div>
                    </div>

                    <h2 id="accordion-open-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                            <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>Is there a Figma file available?</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed
                                using the Figma software so everything you see in the library has a design equivalent in our
                                Figma file.</p>
                            <p class="text-gray-500 dark:text-gray-400">Check out the <a
                                    href="https://flowbite.com/figma/"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based
                                on the utility classes from Tailwind CSS and components from Flowbite.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
