document.addEventListener("DOMContentLoaded", function () {
const headers = document.querySelectorAll(".accordion-header");

headers.forEach(header => {
    header.addEventListener("click", () => {
    const content = header.nextElementSibling;
    const icon = header.querySelector(".accordion-icon");
    const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";

    // Tutup semua
    document.querySelectorAll(".accordion-content").forEach(c => c.style.maxHeight = null);
    document.querySelectorAll(".accordion-icon").forEach(i => i.classList.remove("rotate-180"));

    // Jika belum terbuka, buka dan putar ikon
    if (!isOpen) {
        content.style.maxHeight = content.scrollHeight + "px";
        icon.classList.add("rotate-180");
    }
    });
});
});

