 document.getElementById("dropdownButton").addEventListener("click", function () {
        let dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.toggle("hidden");
    });

    // Tutup dropdown jika klik di luar
    document.addEventListener("click", function (event) {
        let dropdown = document.getElementById("dropdownMenu");
        let button = document.getElementById("dropdownButton");
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
