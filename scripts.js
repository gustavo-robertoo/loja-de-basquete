let slideIndex = 0;
const slides = document.querySelector('.carousel-slide');
const totalSlides = slides.children.length;

function moveSlide(direction) {
    slideIndex += direction;
    
    if (slideIndex < 0) {
        slideIndex = totalSlides - 1;
    } else if (slideIndex >= totalSlides) {
        slideIndex = 0;
    }

    const offset = -slideIndex * 100;
    slides.style.transform = `translateX(${offset}%)`;
}

// Mova para o próximo slide automaticamente a cada 3 segundos
setInterval(() => {
    moveSlide(1);
}, 3000);