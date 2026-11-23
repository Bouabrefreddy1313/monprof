document.addEventListener('DOMContentLoaded', function() {
    // Navigation functionality
    const navButtons = document.querySelectorAll('.nav-btn');
    const sections = document.querySelectorAll('.content-section');

    function switchSection(sectionId) {
        // Hide all sections and remove active class from buttons
        sections.forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none';
        });
        navButtons.forEach(btn => btn.classList.remove('active'));

        // Show selected section and activate button
        const selectedSection = document.getElementById(sectionId);
        const selectedButton = document.querySelector(`[data-section="${sectionId}"]`);

        if (selectedSection && selectedButton) {
            selectedSection.style.display = 'block';
            setTimeout(() => {
                selectedSection.classList.add('active');
            }, 50);
            selectedButton.classList.add('active');
        }
    }

    // Add click event listeners to navigation buttons (excluding the "contact" button)
    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const sectionId = button.getAttribute('data-section');
            switchSection(sectionId);
        });
    });

    // Initialize first section
    switchSection('seconde');

    // Add scroll animation for elements
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements with animation classes
    document.querySelectorAll('.content-box, .image-card, .service-card, .info-item').forEach(el => {
        observer.observe(el);
    });
});

