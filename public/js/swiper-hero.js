const swiperHero = new Swiper('.swiper-hero', {
  loop: true,
  spaceBetween: 0,
  speed: 600,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  allowTouchMove: true,
  breakpoints: {
    1024: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 1,
    },
    0: {
      slidesPerView: 1,
    },
  },
  // autoplay: {
  //   delay: 5000,
  //   disableOnInteraction: true,
  // },
});

