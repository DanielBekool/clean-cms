function openVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('youtubeIframe');
    const videoURL = "https://www.youtube.com/embed/lZTS74rU6J8?autoplay=1";
    
    iframe.src = videoURL;
    modal.classList.remove('hidden');
  }

  function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('youtubeIframe');

    iframe.src = ''; // Stop video playback
    modal.classList.add('hidden');
  }

  function closeVideoModalOnOverlay(event) {
    // Hanya tutup jika klik di luar modal content
    closeVideoModal();
  }
