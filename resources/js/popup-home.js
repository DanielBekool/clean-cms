document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup-home");

    // Tampilkan popup saat halaman dimuat
    popup.classList.remove("hidden");

    // Fungsi global untuk menutup popup
    window.closePopup = function () {
        popup.classList.add("hidden");
    };

    // Tambahkan event listener ke overlay (bukan kontennya)
    popup.addEventListener("click", function (event) {
        if (event.target === popup) {
            closePopup();
        }
    });
});
