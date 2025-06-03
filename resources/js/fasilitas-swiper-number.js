document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.swiper-slide');

    slides.forEach((slide, index) => {
        const h6 = slide.querySelector('.numbers');
        if (h6) {
            const number = (index + 1).toString().padStart(2, '0');
            h6.textContent = `${number}.`;
        }
    });
});

