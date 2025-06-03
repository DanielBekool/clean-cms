const switcher = document.getElementById("bg-switcher");
const items = document.querySelectorAll("[data-bg]");

function activateItem(item) {
  const newBg = item.getAttribute("data-bg");
  switcher.style.backgroundImage = `url('${newBg}')`;

  // Hapus .active dari semua
  items.forEach(i => i.classList.remove("active"));

  // Tambahkan .active ke elemen saat ini
  item.classList.add("active");
}

// Hover effect
items.forEach(item => {
  item.addEventListener("mouseenter", () => {
    activateItem(item);
  });

});

// 🔥 Trigger otomatis pada item pertama saat halaman dibuka
window.addEventListener("DOMContentLoaded", () => {
  if (items.length > 0) {
    activateItem(items[0]);
  }
});


