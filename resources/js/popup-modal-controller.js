window.openModal = function(element) {
    // Mendapatkan data dari elemen yang diklik dengan pengecekan jika elemen tidak ada
    const name = element.querySelector('.name')?.textContent || '';
    const position = element.querySelector('.position')?.textContent || '';
    const photo = element.querySelector('.photo')?.src || '';
    const description = element.querySelector('.description')?.innerHTML || '';

    // Mengisi data ke dalam modal
    const modalTitle = document.querySelector('.modal-title');
    if (modalTitle) modalTitle.textContent = name;

    const modalPosition = document.querySelector('.modal-position');
    if (modalPosition) modalPosition.textContent = position;

    const modalImage = document.querySelector('.modal-image img');
    if (modalImage && photo) modalImage.src = photo;

    const modalDescription = document.querySelector('.modal-description');
    if (modalDescription) modalDescription.innerHTML = description;

    // Menampilkan modal
    document.getElementById('modal')?.classList.remove('hidden');

    // Mencegah scroll pada body
    document.body.style.overflow = 'hidden';
}

window.closeModal = function() {
    // Menyembunyikan modal
    document.getElementById('modal')?.classList.add('hidden');

    // Mengaktifkan kembali scroll pada body
    document.body.style.overflow = 'auto';
}
