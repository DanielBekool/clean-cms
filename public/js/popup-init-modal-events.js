 // Script ini akan dieksekusi setelah DOM selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Menutup modal saat mengklik overlay
        const modalOverlay = document.querySelector('.modal-overlay');
        if (modalOverlay) {
            modalOverlay.addEventListener('click', closeModal);
        }
        
        // Menutup modal dengan tombol ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
        
        // Alternatif: Menambahkan event listener pada semua kartu manajemen
        // Ini adalah cara alternatif jika onclick di HTML tidak berfungsi
        document.querySelectorAll('.item-for-popup').forEach(function(card) {
            card.addEventListener('click', function() {
                openModal(this);
            });
        });
    });