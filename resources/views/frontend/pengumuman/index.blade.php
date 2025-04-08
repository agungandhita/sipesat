@extends('frontend.layouts.main')

@section('container')
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mb-10">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Customer stories</h2>
            <p class="mt-1 text-gray-600 ">See how game-changing companies are making the most of every
                engagement with Preline.</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card -->
            <a class="group block rounded-xl focus:outline-hidden" href="#">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full object-cover rounded-xl"
                        src="https://images.unsplash.com/photo-1668869713519-9bcbb0da7171?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                        alt="Blog Image">
                </div>
                <h3
                    class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600">
                    Unity’s inside sales team drives 80% of its revenue with Preline.
                </h3>
                <p class="mt-2 text-sm text-gray-600 ">
                    September 12, 2022
                </p>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group block rounded-xl focus:outline-hidden" href="#">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full object-cover rounded-xl"
                        src="https://images.unsplash.com/photo-1668584054035-f5ba7d426401?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                        alt="Blog Image">
                </div>
                <h3
                    class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600">
                    Living Spaces creates a unified experience across the customer journey.
                </h3>
                <p class="mt-2 text-sm text-gray-600 ">
                    September 12, 2022
                </p>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group block rounded-xl focus:outline-hidden" href="#">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full object-cover rounded-xl"
                        src="https://images.unsplash.com/photo-1668863699009-1e3b4118675d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                        alt="Blog Image">
                </div>
                <h3
                    class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600">
                    Atlassian powers sales and support at scale with Preline.
                </h3>
                <p class="mt-2 text-sm text-gray-600 ">
                    September 12, 2022
                </p>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group block rounded-xl focus:outline-hidden" href="#">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full object-cover rounded-xl"
                        src="https://images.unsplash.com/photo-1668584054131-d5721c515211?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                        alt="Blog Image">
                </div>
                <h3
                    class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600">
                    Everything you need to know about Preline Pro.
                </h3>
                <p class="mt-2 text-sm text-gray-600 ">
                    September 12, 2022
                </p>
            </a>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
@endsection
