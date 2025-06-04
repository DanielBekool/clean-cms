document.addEventListener('DOMContentLoaded', function () {
    const phoneLinks = document.querySelectorAll('.phone');

    phoneLinks.forEach(link => {
        let rawNumber = link.textContent.trim();

        // Hilangkan semua karakter selain + dan angka
        let cleaned = rawNumber.replace(/[^\d+]/g, '');

        if (cleaned.startsWith('+62')) {
            let prefix = '+62';
            let rest = cleaned.slice(3);

            // Bagi menjadi blok-blok 4 digit
            let grouped = rest.match(/.{1,4}/g).join(' ');

            // Gabungkan kembali
            let formatted = prefix + ' ' + grouped;

            link.textContent = link.textContent.replace(cleaned, formatted);
        }
    });
});