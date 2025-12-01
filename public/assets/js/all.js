// Slider functionality
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    slides[index].classList.add('active');
    dots[index].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

setInterval(nextSlide, 5000);

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        showSlide(currentSlide);
    });
});

// Mobile menu toggle
function toggleMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
}

// Dropdown toggle for mobile
function toggleDropdown(event) {
    if (window.innerWidth <= 968) {
        event.preventDefault();
        const dropdown = event.target.closest('.dropdown');
        dropdown.classList.toggle('active');
    }
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const navMenu = document.getElementById('navMenu');
    const menuToggle = document.querySelector('.menu-toggle');
    
    if (!navMenu.contains(event.target) && !menuToggle.contains(event.target)) {
        navMenu.classList.remove('active');
    }
});

// Close mobile menu when clicking a link (except dropdown toggle)
document.querySelectorAll('.nav-menu a:not(.dropdown-toggle)').forEach(link => {
    link.addEventListener('click', function() {
        if (window.innerWidth <= 968) {
            document.getElementById('navMenu').classList.remove('active');
        }
    });
});

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth > 968) {
        document.getElementById('navMenu').classList.remove('active');
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});

// Intersection Observer for Welcome Section Animation
const observerOptions = {
    threshold: 0.2,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        }
    });
}, observerOptions);

// Observe welcome section, news section, dan ekskul section
document.addEventListener('DOMContentLoaded', function() {
    const welcomeContent = document.querySelector('.welcome-content');
    const welcomeImage = document.querySelector('.welcome-image');
    const newsHeader = document.querySelectorAll('.section-header');
    const newsCards = document.querySelectorAll('.news-card');
    const ekskulCards = document.querySelectorAll('.ekskul-card');
    const galeriCards = document.querySelectorAll('.galeri-card');
    
    if (welcomeContent) observer.observe(welcomeContent);
    if (welcomeImage) observer.observe(welcomeImage);

    galeriCards.forEach(card => {
        if (card) observer.observe(card);
    });
    
    newsHeader.forEach(header => {
        if (header) observer.observe(header);
    });
    
    newsCards.forEach(card => {
        if (card) observer.observe(card);
    });
    
    ekskulCards.forEach(card => {
        if (card) observer.observe(card);
    });
});

// Pagination functionality
document.querySelectorAll('.pagination-btn').forEach((btn, index) => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.pagination-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});