<script src="{{ asset('code/script.js') }}"></script>
<script src="{{ asset('code/dropdown.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="dist/clipboard.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Froala Editor JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
</script>
<script>
    // Inisialisasi Froala Editor
    new FroalaEditor('.froala-editor', {
        // Konfigurasi editor
        toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'paragraphFormat',
            'align', 'formatOL', 'formatUL', 'indent', 'outdent',
            'insertImage', 'insertLink', 'insertTable', 'undo', 'redo'
        ],
        placeholderText: 'Tulis konten di sini...',
        language: 'id'
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="./assets/vendor/preline/dist/preline.js"></script>
@stack('scripts')
</body>

</html>
