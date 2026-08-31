document.addEventListener('DOMContentLoaded', () => {

    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const animateOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
                animateOnScroll.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        animateOnScroll.observe(el);
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    document.querySelectorAll('.flash').forEach(flash => {
        setTimeout(() => {
            flash.style.opacity = '0';
            flash.style.transform = 'translateY(-20px)';
            setTimeout(() => flash.remove(), 400);
        }, 5000);
    });

    window.typeWriter = function(element, text, speed = 50) {
        let i = 0;
        element.textContent = '';
        function type() {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    };

    window.animateCounter = function(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        function update() {
            start += increment;
            if (start < target) {
                element.textContent = Math.floor(start);
                requestAnimationFrame(update);
            } else {
                element.textContent = target;
            }
        }
        update();
    };

});
