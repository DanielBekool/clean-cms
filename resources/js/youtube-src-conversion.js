document.addEventListener("DOMContentLoaded", function () {
const iframes = document.querySelectorAll('iframe');

iframes.forEach(iframe => {
    const originalUrl = iframe.src;
    const match = originalUrl.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/);

    if (match && match[1]) {
    const videoId = match[1];
    const embedUrl = `https://www.youtube.com/embed/${videoId}`;
    iframe.src = embedUrl;
    }
});
});

