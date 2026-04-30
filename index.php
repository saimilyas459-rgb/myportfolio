<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saim Ilyas Portfolio</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    
</head>
<body>

<?php 
    // Ye PHP code hai. Variable define kar rahe hain.
    $user_name = "Saim Ilyas";
    $email = "saimilyas459@gmail.com";
?>

<header class="site-header">
    <div class="header-logo">
        <?php echo $user_name; ?>
    </div>
   <nav class="main-navbar">
       <a href="index.php" class="nav-item ">Home</a>
       <a href="about.php" class="nav-item">About</a>
       <a href="projects.php" class="nav-item">Projects</a>
       <a href="contact.php" class="nav-item">Contact</a>
    </nav>

</header>

<section class="hero-container" id="home">
    <div class="hero-box">
        <div class="hero-left">
            <h1><?php echo $user_name; ?></h1>
            <p>Passionate developer and designer with skills in:</p>
            <div class="skills">
                <span>WordPress Developer</span>
                <span>Software Developer</span>
                <span>Graphic Designer</span>
            </div>
        </div>
        <div class="hero-right"></div>
    </div>
</section>

<section class="about-section" id="about">
    <div class="about-container">
        <div class="about-left">
            <img src="saim.jpg" alt="Saim Ilyas">
        </div>
        <div class="about-right">
            <h2 class="about-h">About Me</h2>
            <p>
                As a <strong>full-stack software engineer</strong>, I specialize in building scalable web, mobile, and desktop applications. I believe great software starts with clear requirements, clean architecture, and strong communication—focused on delivering solutions that work reliably in real-world production.
            </p>
        </div>
    </div>
</section>

<div class="about-social-btns">
    <a href="https://github.com/saimilyas459-rgb" target="_blank" class="about-btn github" title="GitHub">
        <i class="fab fa-github"></i>
        <span>GitHub</span>
    </a>

    <a href="https://pro.fiverr.com/pe/8zgYNwp" target="_blank" class="about-btn fiverr" title="Fiverr">
        <i class="fas fa-bolt"></i>
        <span>Fiverr</span>
    </a>

    <a href="https://www.linkedin.com/in/saim-ilyas-61a914385" target="_blank" class="about-btn linkedin" title="LinkedIn">
        <i class="fab fa-linkedin"></i>
        <span>LinkedIn</span>
    </a>

    <a href="https://netzingtechnologies.com/" target="_blank" class="about-btn netzing" title="Netzing Technologies">
        <i class="fas fa-external-link-alt"></i>
        <span>Netzing Tech</span>
    </a>
</div>

<section class="projects-section" id="projects">
    <h2 class="section-title">My Projects</h2>
    <div class="projects-container">
        <div class="project-card">
            <img src="wordpress.png" alt="WordPress Development">
            <div class="project-info">
                <h3>WordPress Web Solutions</h3>
                <p>Custom Business Websites</p>
            </div>
        </div>
        <div class="project-card">
            <img src="django.png" alt="Software App">
            <div class="project-info">
                <h3>Django Web Apps</h3>
                <p>Scalable Python Backend</p>
            </div>
        </div>
        <div class="project-card">
            <img src="graphic.png" alt="Graphic Design">
            <div class="project-info">
                <h3>Graphic Design Portfolio</h3>
                <p>Branding & Visual Identity</p>
            </div>
        </div>
        <div class="project-card">
            <img src="marketing.png" alt="Digital Marketing">
            <div class="project-info">
                <h3>Digital Marketing</h3>
                <p>SEO & Performance Growth</p>
            </div>
        </div>
        <div class="project-card">
            <img src="social.png" alt="Social Media">
            <div class="project-info">
                <h3>Social Media Management</h3>
                <p>Engagement & Strategy</p>
            </div>
        </div>
        <div class="project-card">
            <img src="ecommerce.png" alt="E-commerce">
            <div class="project-info">
                <h3>E-commerce Platform</h3>
                <p>Full-Stack Online Store</p>
            </div>
        </div>
    </div>
</section>


<section class="skills-section" id="skills">
    <h2 class="section-title">Professional Skills</h2>
    <div class="skills-container">
        
        <div class="skill-box">
            <div class="skill-info">
                <span>WordPress Development</span>
                <span>95%</span>
            </div>
            <div class="progress-line"><span class="wordpress"></span></div>
        </div>

        <div class="skill-box">
            <div class="skill-info">
                <span>Graphic Designing</span>
                <span>90%</span>
            </div>
            <div class="progress-line"><span class="graphics"></span></div>
        </div>

        <div class="skill-box">
            <div class="skill-info">
                <span>Digital Marketing</span>
                <span>85%</span>
            </div>
            <div class="progress-line"><span class="marketing"></span></div>
        </div>

        <div class="skill-box">
            <div class="skill-info">
                <span>Social Media Management</span>
                <span>80%</span>
            </div>
            <div class="progress-line"><span class="social"></span></div>
        </div>

        <div class="skill-box">
            <div class="skill-info">
                <span>Django / Python</span>
                <span>88%</span>
            </div>
            <div class="progress-line"><span class="django"></span></div>
        </div>

    </div>
</section>

<section class="review-contact-section" id="contact">
    <div class="reviews-box equal-box">
        <h2 class="section-title">What Clients Say</h2>
        <div class="review-slider">
            <div class="review-card" style="animation-delay: 0s;">
                <div class="stars">★★★★★</div>
                <p>“Saim delivered our Django project with top-notch quality. Highly professional developer.”</p>
                <h4>Usman Arif</h4>
                <span>Full-Stack Developer for Backend & Frontend</span>
            </div>
            <div class="review-card" style="animation-delay: 2s;">
                <div class="stars">★★★★★</div>
                <p>“Excellent work on my WordPress site. His eye for graphic design is truly impressive.”</p>
                <h4>Saran Zafar</h4>
                <span>Full-Stack Developer for Backend & Frontend</span>
            </div>
            <div class="review-card" style="animation-delay: 4s;">
                <div class="stars">★★★★★</div>
                <p>“Great communication and technical skills. He made our social media management seamless.”</p>
                <h4>Saqib Tariq</h4>
                <span>Wordpress Developer</span>
            </div>
            <div class="review-card" style="animation-delay: 6s;">
                <div class="stars">★★★★★</div>
                <p>“Fast delivery and very creative logo designs. Will definitely work with Saim again!”</p>
                <h4>Zain Ali</h4>
                <span>Social Media Manager</span>
            </div>
            <div class="review-card" style="animation-delay: 8s;">
                <div class="stars">★★★★★</div>
                <p>“A talented software engineer who understands complex requirements very quickly.”</p>
                <h4>Ubaid Raza</h4>
                <span>Project Manager</span>
            </div>
        </div>
    </div>

    <div class="contact-box equal-box">
        <div class="profile-img-wrapper">
            <img src="client.png" alt="Saim Ilyas">
        </div>
        <h2>Have a project in mind?</h2>
        <p class="contact-sub">Let's build something amazing together.</p>
        <div class="email-link-box">
           <a href="mailto:saim.ilyas.div@gmail.com" class="email-btn">
       <i class="fas fa-envelope"></i> saim.ilyas.div@gmail.com
</a>
        </div>
    </div>
</section>

<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3 class="footer-brand">Saim Ilyas</h3>
            <p class="footer-desc">Software Engineer & Full Stack Developer. Specialized in building modern web solutions and creative designs.</p>
        </div>

        <div class="footer-column text-center">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="#project">Projects</a></li>
                <li><a href="login.php">Admin Login</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4 class="footer-heading">Contact Info</h4>
            <div class="footer-contact">
                <p><i class="fas fa-map-marker-alt"></i> Kotli, Azad Kashmir</p>
                <p><i class="fas fa-phone"></i> +92 343 5948454</p>
                <p><i class="fas fa-envelope"></i> saim.ilyas.div@gmail.com</p>
            </div>
            <div class="social-wrapper">
                <a href="https://github.com/saimilyas459-rgb" target="_blank" class="social-icon">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/saim-ilyas-61a914385 target="_blank" class="social-icon">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://pro.fiverr.com/pe/8zgYNwp" target="_blank" class="social-icon fiverr-btn">
                    F
                </a>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <p>&copy; 2026 Saim Ilyas | Software Engineering Technology</p>
    </div>
</footer>

<script src="script.js"></script>

</body>
</html>