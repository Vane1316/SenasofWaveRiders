class App {
    constructor() {
        this.track = document.getElementById('track');
        this.carruselItems = document.querySelectorAll('.carrusel-item');
        this.totalItems = this.carruselItems.length;
        this.index = 0;
        this.intervalDuration = 3000; // Cambia el tiempo de intervalo si lo deseas
        this.startAutoScroll();
    }

    showNextImage() {
        this.index = (this.index + 1) % this.totalItems;
        this.track.style.transform = `translateX(-${this.index * 100}%)`;
    }

    startAutoScroll() {
        this.interval = setInterval(() => {
            this.showNextImage();
        }, this.intervalDuration);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new App();
});
