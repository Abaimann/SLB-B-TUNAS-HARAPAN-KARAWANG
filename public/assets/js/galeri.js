/* Membuka Lightbox dengan data yang diterima sebagai parameter. */
function openLightbox(imageSrc, title, date) {
    const lightbox = document.getElementById('lightbox');
    
    // Set data yang diterima ke elemen Lightbox
    document.getElementById('lightboxImage').src = imageSrc;
    document.getElementById('lightboxTitle').textContent = title;
    document.getElementById('lightboxDate').textContent = date;
    
    // Tampilkan lightbox
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden'; // Nonaktifkan scroll
}

/* Menutup Lightbox.*/
function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto'; // Aktifkan scroll kembali
}

// ❌ Fungsi navigasi (changeLightboxImage) DIBUANG.

// Close lightbox on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    } 
    // Event listener ArrowLeft/Right DIBUANG.
});

// Close lightbox when clicking outside image (hanya jika target adalah overlay modal itu sendiri)
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});