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
       <a href="index.php" class="nav-item active-link">Home</a>
       <a href="about.php" class="nav-item">About</a>
       <a href="projects.php" class="nav-item">Projects</a>
       <a href="contact.php" class="nav-item">Contact</a>
    </nav>

</header>

<section class="contact-hero-professional">
    <!-- Background Dots Overlay -->
    <div class="dots-overlay"></div>
    
    <div class="hero-content-center">
        <h1 class="hero-title">Contact</h1>
        <div class="animated-line"></div>
        <p class="hero-subtitle">Have a question or want to work together? I'm just a message away.</p>
    </div>

    <!-- Scroll Down Icon -->
    <div class="scroll-down-wrapper">
        <div class="mouse-icon">
            <div class="wheel"></div>
        </div>
    </div>
</section>

<section class="contact-layout-pro">
    <div class="contact-grid">
        <!-- Left Side: Professional Info -->
        <div class="info-column">
            <h2 class="section-heading">Let's discuss your project</h2>
            <p class="section-subtext">Let’s embark on a creative journey together by shaping a visual narrative of your brand.</p>
            
            <div class="contact-box">
                <div class="icon-circle"><i class="fas fa-phone-alt"></i></div>
                <div class="box-content">
                    <span>Phone</span>
                    <p>+923435948454</p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                <div class="box-content">
                    <span>Email</span>
                    <p>saimilyas459@gmail.com</p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                <div class="box-content">
                    <span>Address</span>
                    <p>City & District Kotli, AJK, Pakistan</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="form-column">
            <form class="glass-form">
                <div class="pro-input-group">
                    <input type="text" placeholder="Your Name" required>
                </div>
                <div class="pro-input-group">
                    <input type="email" placeholder="Email Address" required>
                </div>
                <div class="pro-input-group">
                    <input type="text" placeholder="Subject" required>
                </div>
                <div class="pro-input-group">
                    <textarea placeholder="Message in brief..." rows="5"></textarea>
                </div>
                <button type="submit" class="blue-submit-btn">Send Message</button>
            </form>
        </div>
    </div>
</section>
<!-- Hero Map Section: Ye puri screen cover karega -->
<section class="map-hero">
    <div class="map-container-full">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.664408168239!2d73.8943!3d33.5134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391e3e7f5e1f79f3%3A0x63920c57c6b907e5!2sUniversity%20of%20Kotli%20Azad%20Jammu%20and%20Kashmir!5e0!3m2!1sen!2s!4v1700000000000" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
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