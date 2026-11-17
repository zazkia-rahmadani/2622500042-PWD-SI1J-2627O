// Mengaktifkan menu navigasi
const menuLinks = document.querySelectorAll(".navigasi ul li a");

menuLinks.forEach(function (link) {
  if (link.href === window.location.href) {
    link.classList.add("active");
  }
});

console.log("Welcome to MANISE Dessert Cake!");

// Validasi formulir (sebelum dikirim ke server)
const form = document.querySelector(".registration-form");

if (form) {
  form.addEventListener("submit", function (event) {
    const nama = form.querySelector('[name="nama"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();

    if (nama.length < 3) {
      alert("Nama minimal 3 karakter!");
      event.preventDefault(); // batalkan kirim
      return;
    }

    if (!email.includes("@")) {
      alert("Masukkan alamat email yang valid!");
      event.preventDefault();
    }
    // kalau valid, form dikirim ke PHP
  });
}
