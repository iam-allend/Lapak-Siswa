// script.js
let prevScrollPos = window.pageYOffset; // Simpan posisi scroll sebelumnya

window.onscroll = function() {
    // Cek jika lebar layar <= 768px (perangkat mobile)
    if (window.innerWidth <= 768) {
        const currentScrollPos = window.pageYOffset; // Dapatkan posisi scroll saat ini
        const navbar = document.getElementById("navbar");

        if (prevScrollPos > currentScrollPos) {
            // Jika scroll ke atas, tampilkan navbar
            navbar.style.top = "0";
        } else {
            // Jika scroll ke bawah, sembunyikan navbar
            navbar.style.top = "-60px"; // Sesuaikan dengan tinggi navbar
        }

        prevScrollPos = currentScrollPos; // Update posisi scroll sebelumnya
    }
};