document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('youtubeIframe');
  const openBtn = document.getElementById('openVideoBtn'); // contoh tombol buka video
  const closeBtn = document.getElementById('closeVideoBtn'); // contoh tombol tutup video
  const overlay = document.getElementById('videoModal'); // asumsikan modal juga overlay

  function openVideoModal() {
    const videoURL = "https://www.youtube.com/embed/lZTS74rU6J8?autoplay=1";
    iframe.src = videoURL;
    modal.classList.remove('hidden');
  }

  function closeVideoModal() {
    iframe.src = ''; // Stop video playback
    modal.classList.add('hidden');
  }

  function closeVideoModalOnOverlay(event) {
    // Tutup modal hanya jika klik di overlay, bukan di konten modal
    if (event.target === modal) {
      closeVideoModal();
    }
  }

  // Pasang event listener
  openBtn.addEventListener('click', openVideoModal);
  closeBtn.addEventListener('click', closeVideoModal);
  overlay.addEventListener('click', closeVideoModalOnOverlay);
});
