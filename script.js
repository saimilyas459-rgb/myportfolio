document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');

        if (href.startsWith('#') && href.length > 1) {
            const targetElement = document.querySelector(href);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });
});


const box = document.getElementById('dotBox');
const dots = document.querySelectorAll('.repel-dot');

box.addEventListener('mousemove', (e) => {
    const boxRect = box.getBoundingClientRect();
    const mouseX = e.clientX - boxRect.left;
    const mouseY = e.clientY - boxRect.top;

    dots.forEach(dot => {
        const dotX = dot.offsetLeft + (dot.offsetWidth / 2);
        const dotY = dot.offsetTop + (dot.offsetHeight / 2);

        const distance = Math.sqrt(Math.pow(mouseX - dotX, 2) + Math.pow(mouseY - dotY, 2));

        if (distance < 80) {
            const angle = Math.atan2(dotY - mouseY, dotX - mouseX);
            const force = (80 - distance) / 2; // Extra 's' hata diya
            const moveX = Math.cos(angle) * force;
            const moveY = Math.sin(angle) * force;
            
            dot.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.5)`;
            dot.style.background = '#0044ff';
            dot.style.boxShadow = '0 0 10px #0044ff';
        } else {
            dot.style.transform = 'translate(0, 0) scale(1)';
            dot.style.background = 'rgba(255, 255, 255, 0.08)';
            dot.style.boxShadow = 'none';
        }
    });
});

// Mouse jab box se bahar jaye toh dots wapas apni jagah aa jayein
box.addEventListener('mouseleave', () => {
    dots.forEach(dot => {
        dot.style.transform = 'translate(0, 0) scale(1)';
        dot.style.background = 'rgba(255, 255, 255, 0.08)';
        dot.style.boxShadow = 'none';
    });
});

box.addEventListener('mouseleave', () => {
    dots.forEach(dot => {
        dot.style.transform = 'translate(0, 0) scale(1)';
        dot.style.background = 'rgba(255, 255, 255, 0.15)'; // Reset to light state
        dot.style.boxShadow = 'none';
    });
});