document.addEventListener("DOMContentLoaded", function () {
    const fromNameSpans = document.querySelectorAll('.from-name');

    fromNameSpans.forEach(span => {
        // Cari <li> balasan
        const currentLi = span.closest('li');

        if (!currentLi) return;

        // Cari <ol> yang membungkus currentLi
        const currentOl = currentLi.parentElement;

        // Cari <li> komentar induk dari <ol> ini
        const parentLi = currentOl.closest('li');

        if (!parentLi) return;

        // Ambil nama dari <h5> di dalam komentar induk
        const parentNameH5 = parentLi.querySelector('> article h5.name');

        if (parentNameH5) {
            span.textContent = parentNameH5.textContent.trim();
        }
    });
});
