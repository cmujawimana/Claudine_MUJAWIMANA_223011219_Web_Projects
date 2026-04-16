document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    }

    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage || (currentPage === '' && href === 'index.php')) {
            link.classList.add('active');
        }
    });

    // Image Slider
    const slider = document.querySelector('.hero-slider');
    if (slider) {
        const slides = document.querySelectorAll('.slide');
        const indicators = document.querySelectorAll('.slider-indicator');
        let currentSlide = 0;
        const slideInterval = 2000;
        let autoSlide;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(ind => ind.classList.remove('active'));
            
            slides[index].classList.add('active');
            if (indicators[index]) indicators[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function startAutoSlide() {
            autoSlide = setInterval(nextSlide, slideInterval);
        }

        function stopAutoSlide() {
            clearInterval(autoSlide);
        }

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoSlide();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoSlide();
            });
        });

        showSlide(0);
        startAutoSlide();
    }

    // Fade in animations for sections
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

    document.querySelectorAll('.service-card, .feature-item, .services-grid > div').forEach(el => {
        el.classList.add('fade-in');
        observer.observe(el);
    });

    const menuCategoryBtns = document.querySelectorAll('.category-btn');
    const menuItems = document.querySelectorAll('.menu-item-row');
    
    if (menuCategoryBtns.length > 0) {
        menuCategoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                
                menuCategoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                menuItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'table-row';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Gallery Filters
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItemsFilter = document.querySelectorAll('.gallery-item');
    
    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                galleryItemsFilter.forEach(item => {
                    const category = item.getAttribute('data-category');
                    
                    if (filter === 'all' || category === filter) {
                        item.classList.remove('hide');
                        item.classList.add('show');
                    } else {
                        item.classList.add('hide');
                        item.classList.remove('show');
                    }
                });
            });
        });
    }

    const navLinkElements = document.querySelectorAll('.nav-link');
    navLinkElements.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.color = '#c9a227';
        });
        link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.color = '#f5f5f5';
            }
        });
    });

    // Click outside to close dropdown
    document.addEventListener('click', function(e) {
        const dropdowns = document.querySelectorAll('.user-dropdown');
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.user-dropdown-toggle');
            const menu = dropdown.querySelector('.user-dropdown-menu');
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('show');
                toggle.classList.remove('active');
            }
        });
    });

    // dropdown toggle
    const userDropdowns = document.querySelectorAll('.user-dropdown-toggle');
    userDropdowns.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = this.closest('.user-dropdown');
            const menu = dropdown.querySelector('.user-dropdown-menu');
            menu.classList.toggle('show');
            this.classList.toggle('active');
        });
    });

    // Parallax effect for hero
    const heroSlider = document.querySelector('.hero-slider');
    if (heroSlider) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const slides = document.querySelectorAll('.slide');
            slides.forEach(slide => {
                slide.style.transform = `translateY(${scrolled * 0.3}px)`;
            });
        });
    }
});

// Add keyframe animations to document
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .hero h1 {
        animation: fadeInUp 1s ease-out;
    }
    .hero p {
        animation: fadeInUp 1s ease-out 0.3s both;
    }
    .hero .btn {
        animation: fadeInUp 1s ease-out 0.6s both;
    }
`;
document.head.appendChild(style);