const swiperLogo = new Swiper('.swiper-logo', {
  slidesPerView: 7, // default 
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
    0: {          // mobile
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {        // tablet
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {       // desktop
      slidesPerView: 7,
      spaceBetween: 20,
    },
  },
});
