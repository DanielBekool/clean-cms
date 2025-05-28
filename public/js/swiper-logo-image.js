const swiperLogo = new Swiper('.swiper-logo', {
  slidesPerView: 7, // default untuk desktop besar
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-logo .swiper-button-next',
    prevEl: '.swiper-logo .swiper-button-prev',
  },
  pagination: {
    el: '.swiper-logo .swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    0: {          // untuk layar >= 0px (mobile kecil dan besar)
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {        // untuk layar >= 768px (tablet)
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {       // untuk layar >= 1024px (desktop)
      slidesPerView: 7,
      spaceBetween: 20,
    },
  },
});
