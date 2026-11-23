document.addEventListener('DOMContentLoaded', function() {
    // Initialize the carousel
    const carousel = new bootstrap.Carousel(document.getElementById('featuresCarousel'), {
        interval: 5000,
        touch: true
    });

    // Add animation classes to elements when they become visible
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, {
        threshold: 0.2
    });

    // Observe feature cards and other animated elements
    document.querySelectorAll('.feature-card, .icon-box, .award-image').forEach(el => {
        observer.observe(el);
    });

    // Smooth scroll for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add hover effect to feature cards
    document.querySelectorAll('.feature-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Add parallax effect to background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        document.querySelectorAll('.feature-slide').forEach(slide => {
            const speed = 0.5;
            slide.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
});