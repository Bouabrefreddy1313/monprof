class Carousel {
    constructor(element, interval = 3000) {
      this.carousel = element;
      this.slides = Array.from(this.carousel.querySelectorAll('.carousel-slide'));
      this.dotsContainer = document.getElementById('carousel-dots');
      this.interval = interval;
      this.currentIndex = 0;
      
      this.init();
    }
  
    init() {
      // Create navigation dots
      this.slides.forEach((_, index) => {
        const dot = document.createElement('button');
        dot.className = 'carousel-dot';
        dot.setAttribute('aria-label', `Slide ${index + 1}`);
        dot.addEventListener('click', () => this.goToSlide(index));
        this.dotsContainer.appendChild(dot);
      });
  
      // Set initial state
      this.updateSlides();
      
      // Start autoplay
      this.startAutoplay();
    }
  
    updateSlides() {
      // Update slides
      this.slides.forEach((slide, index) => {
        slide.classList.toggle('active', index === this.currentIndex);
      });
  
      // Update dots
      const dots = this.dotsContainer.querySelectorAll('.carousel-dot');
      dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === this.currentIndex);
      });
    }
  
    goToSlide(index) {
      this.currentIndex = index;
      this.updateSlides();
    }
  
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.slides.length;
      this.updateSlides();
    }
  
    startAutoplay() {
      if (this.autoplayInterval) {
        clearInterval(this.autoplayInterval);
      }
  
      this.autoplayInterval = setInterval(() => {
        this.nextSlide();
      }, this.interval);
    }
  }
  
  // Initialize carousel when DOM is loaded
  document.addEventListener('DOMContentLoaded', () => {
    const carouselElement = document.getElementById('carousel');
    new Carousel(carouselElement);
  });