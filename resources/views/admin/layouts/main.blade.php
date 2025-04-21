<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.start')

    @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <div id="main-content"
        class="relative overflow-y-auto md:ml-64  px-4 min-h-screen pb-10">
            <main class="relative max-w-full">
                @yield('container')
            <main>


        </div>

    {{-- </div> --}}
    @include('admin.partials.end')
    @include('sweetalert::alert')
    
    <!-- Place this before closing body tag -->
    @yield('scripts')
</html>

