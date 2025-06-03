  // Ambil semua elemen logo dari HTML tersembunyi
  const logoElements = document.querySelectorAll("#logo-sequence .logo-item");
  const logos = [];

  // Masukkan data logo dan tahun ke dalam array
  logoElements.forEach(img => {
    logos.push({
      year: img.getAttribute("data-year"),
      src: img.getAttribute("src")
    });
  });

  let index = 0;
  const logoImage = document.getElementById("logo-image");
  const yearText = document.getElementById("year-text");

  function showNextLogo() {
    if (index < logos.length) {
      // Fade out logo
      logoImage.style.opacity = 0;

      setTimeout(() => {
        // Ganti gambar logo dan tahun
        logoImage.src = logos[index].src;
        yearText.textContent = logos[index].year;

        // Fade in logo
        logoImage.style.opacity = 1;

        // Lanjutkan ke logo berikutnya setelah jeda
        index++;
        setTimeout(showNextLogo, 500); // jeda antar logo
      }, 500); // waktu untuk fade out
    } else {
      // Semua logo selesai ditampilkan
      const splash = document.getElementById("splash-screen");
      const content = document.getElementById("main-content");

      splash.style.opacity = 0;

      setTimeout(() => {
        splash.style.display = "none";
        document.body.classList.remove("no-scroll"); // Aktifkan scroll
        content.style.display = "block";

        setTimeout(() => {
          content.style.opacity = 1;
          content.style.transform = "translateY(0)";
        }, 50);
      }, 1000);
    }
  }

  // Mulai animasi saat window selesai dimuat
  window.addEventListener("load", () => {
    document.body.classList.add("no-scroll"); // Kunci scroll sebelum animasi
    showNextLogo();
  });