{{-- <script src="{{ asset('adminBumbu/sidebar.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"></script>
<script>
    // Pastikan Preline diinisialisasi ulang setelah DOM dimuat
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof HSStaticMethods !== 'undefined') {
            HSStaticMethods.autoInit();
        }
    });
</script>
@stack('scripts')
</body>

</html>
