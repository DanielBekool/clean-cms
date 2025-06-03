  document.addEventListener('DOMContentLoaded', function () {
    const thumbnail = document.querySelector('#video-home > div'); // selektor elemen thumbnail
    thumbnail.addEventListener('click', function () {
      const container = this.parentNode;
      const iframe = container.querySelector('iframe');
      iframe.src = iframe.getAttribute('data-src');
      iframe.classList.remove('hidden');
      this.remove();
    });
  });