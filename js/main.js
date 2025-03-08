// main.js - Modern interactive features for Oman Cars Marketplace

document.addEventListener('DOMContentLoaded', function() {
    // Add animation classes to elements when they come into view
    animateOnScroll();
    
    // Initialize car image gallery functionality
    initGallery();
    
    // Add smooth scrolling for anchor links
    initSmoothScroll();
    
    // Initialize form validation
    initFormValidation();
    
    // Initialize mobile menu toggle
    initMobileMenu();
    
    // Car filtering functionality
    initCarFiltering();
});

// Animation on scroll function
function animateOnScroll() {
    const elements = document.querySelectorAll('.car-card, .feature-box, .section-title');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    elements.forEach(element => {
        element.style.opacity = '0';
        observer.observe(element);
    });
}

// Car gallery functionality
function initGallery() {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.querySelector('.main-image');
    
    if (!thumbnails.length || !mainImage) return;
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function() {
            // Remove active class from all thumbnails
            thumbnails.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked thumbnail
            this.classList.add('active');
            
            // Update main image
            mainImage.src = this.src;
            mainImage.alt = this.alt;
            
            // Add fade effect
            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.style.opacity = '1';
            }, 50);
        });
    });
}

// Smooth scrolling for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (!targetElement) return;
            
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        });
    });
}

// Form validation
function initFormValidation() {
    const forms = document.querySelectorAll('.needs-validation');
    
    if (!forms.length) return;
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
}

// Mobile menu toggle
function initMobileMenu() {
    const menuToggle = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (!menuToggle || !navbarCollapse) return;
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInside = navbarCollapse.contains(event.target) || menuToggle.contains(event.target);
        
        if (!isClickInside && navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
        }
    });
}

// Car filtering functionality
function initCarFiltering() {
    const filterForm = document.querySelector('.car-filter-form');
    if (!filterForm) return;
    
    // Add change event to all filter controls to submit form automatically
    const filterControls = filterForm.querySelectorAll('select, input[type="radio"]');
    filterControls.forEach(control => {
        control.addEventListener('change', () => {
            filterForm.submit();
        });
    });
}
