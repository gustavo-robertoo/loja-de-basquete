// Script para o carrossel de imagens
let slideIndex = 0;
const slides = document.querySelector('.carousel-slide');
const totalSlides = slides ? slides.children.length : 0;

function moveSlide(direction) {
    if (totalSlides === 0) return; // Verifica se há slides

    slideIndex += direction;
    
    if (slideIndex < 0) {
        slideIndex = totalSlides - 1;
    } else if (slideIndex >= totalSlides) {
        slideIndex = 0;
    }

    const offset = -slideIndex * 100;
    slides.style.transform = `translateX(${offset}%)`;
}

document.addEventListener('DOMContentLoaded', function() {
    const sizeButtons = document.querySelectorAll('.size-btn');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            sizeButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
