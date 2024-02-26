document.addEventListener("DOMContentLoaded", function() {
    const galleryImages = document.querySelectorAll(".gallery-image");
    let currentIndex = 0;

    // Ocultar todas las imágenes excepto la primera
    for (let i = 1; i < galleryImages.length; i++) {
        galleryImages[i].style.display = "none";
    }

    // Función para mostrar la siguiente imagen
    function showNextImage() {
        if (currentIndex < galleryImages.length - 1) {
            galleryImages[currentIndex].style.display = "none";
            currentIndex++;
            galleryImages[currentIndex].style.display = "block";
        }
    }

    // Función para mostrar la imagen anterior
    function showPreviousImage() {
        if (currentIndex > 0) {
            galleryImages[currentIndex].style.display = "none";
            currentIndex--;
            galleryImages[currentIndex].style.display = "block";
        }
    }

    // Agregar listeners a los botones de navegación
    document.getElementById("nextBtn").addEventListener("click", showNextImage);
    document.getElementById("prevBtn").addEventListener("click", showPreviousImage);
});