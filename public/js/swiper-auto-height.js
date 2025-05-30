function equalizeSwiperSlideHeights() {
    const slides = document.querySelectorAll('.same-height');
    let maxHeight = 0;

    // Reset tinggi agar bisa dihitung ulang saat resize
    slides.forEach(slide => {
        slide.style.height = 'auto';
    });

    // Dapatkan tinggi tertinggi
    slides.forEach(slide => {
        const height = slide.offsetHeight;
        if (height > maxHeight) {
            maxHeight = height;
        }
    });

    // Terapkan tinggi maksimum ke semua slide
    slides.forEach(slide => {
        slide.style.height = maxHeight + 'px';
    });
}

// Jalankan setelah halaman dimuat
window.addEventListener('load', equalizeSwiperSlideHeights);

// Jalankan ulang jika ukuran jendela diubah
window.addEventListener('resize', equalizeSwiperSlideHeights);

