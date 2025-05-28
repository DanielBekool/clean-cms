document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter');
  const options = {
    threshold: 0.5
  };

  // Format angka dengan pemisah ribuan (ID = Indonesia)
  const formatNumber = (num) => {
    return new Intl.NumberFormat('id-ID').format(num);
  };

  const animateCounter = (el, target) => {
    const duration = 2000;
    const startTime = performance.now();

    const update = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const value = Math.floor(progress * target);
      el.textContent = formatNumber(value);

      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        el.textContent = formatNumber(target);
      }
    };

    requestAnimationFrame(update);
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-target'));
        animateCounter(el, target);
        observer.unobserve(el);
      }
    });
  }, options);

  counters.forEach(counter => {
    observer.observe(counter);
  });
});
