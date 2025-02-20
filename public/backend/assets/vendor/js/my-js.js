const menuInner = document.querySelector('.menu-inner');
let scrollTimeout;

// Fungsi untuk menyembunyikan scrollbar
function hideScrollbar() {
    menuInner.classList.add('hide-scrollbar');
}

// Fungsi untuk menampilkan scrollbar
function showScrollbar() {
    menuInner.classList.remove('hide-scrollbar');
}

// Deteksi aktivitas scrolling
menuInner.addEventListener('scroll', () => {
    showScrollbar(); // Tampilkan scrollbar saat di-scroll

    // Reset timer setiap kali ada aktivitas scrolling
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(hideScrollbar, 3000); // Set timeout 3 detik
});

// Inisialisasi: Sembunyikan scrollbar setelah 3 detik pertama
scrollTimeout = setTimeout(hideScrollbar, 3000);