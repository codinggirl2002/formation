import '../css/app.css';

// Modal animations
function openModal() {
    const modal = document.getElementById('reservationModal');
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('reservationModal');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}
window.openModal = openModal;
window.closeModal = closeModal;

// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function() {
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('reservationModal');
        if (event.target === modal) {
            closeModal();
        }
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

    // Scroll animations - Configuration corrigée
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observer tous les éléments fade-in
    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(el => {
        observer.observe(el);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
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

    // Solution alternative : Afficher tous les éléments fade-in après un délai
    setTimeout(() => {
        document.querySelectorAll('.fade-in').forEach(el => {
            el.classList.add('visible');
        });
    }, 500);
});