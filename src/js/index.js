let lastScrollTop = 0; // Menyimpan posisi scroll terakhir
const navbar = document.getElementById("navbar"); // Mendapatkan elemen navbar

window.addEventListener("scroll", function () {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop; // Mendapatkan posisi scroll saat ini

  if (scrollTop > lastScrollTop) {
    // Jika scroll ke bawah
    navbar.style.transform = "translateY(-1000%)"; // Sembunyikan navbar
  } else {
    // Jika scroll ke atas
    navbar.style.transform = "translateY(0)"; // Tampilkan navbar
  }

  lastScrollTop = scrollTop; // Perbarui posisi scroll terakhir
});
