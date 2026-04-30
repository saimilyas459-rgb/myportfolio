<?php 
    $user_name = "Saim Ilyas"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me | <?php echo $user_name; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>

<header class="site-header">
    <div class="header-logo">
        <?php echo $user_name; ?>
    </div>
    <nav class="main-navbar">
        <?php 
        // Ye line current page ka naam nikaalti hai
        $current_page = basename($_SERVER['PHP_SELF']); 
        ?>
        
        <a href="index.php" class="nav-item <?php echo ($current_page == 'index.php') ? 'active-link' : ''; ?>">Home</a>
        <a href="about.php" class="nav-item <?php echo ($current_page == 'about.php') ? 'active-link' : ''; ?>">About</a>
        <a href="projects.php" class="nav-item <?php echo ($current_page == 'projects.php') ? 'active-link' : ''; ?>">Projects</a>
        <a href="contact.php" class="nav-item <?php echo ($current_page == 'contact.php') ? 'active-link' : ''; ?>">Contact</a>
    </nav>
</header>
<section class="about-hero-custom">
    <div class="about-hero-bg"></div> 
    <div class="about-hero-content">
        <div class="about-hero-left">
            <h4 class="intro-tag" style="color:#0044ff; letter-spacing:3px; font-size:12px; margin-bottom:10px;">INTRODUCTION</h4>
            <h1><?php echo $user_name; ?></h1>
            <p class="hero-desc">
                I am a dedicated student currently pursuing a degree in <b>Software Engineering Technology</b> at the <b>University of Kotli</b>. Focused on building a strong foundation in modern web technologies and full-stack development.
            </p>
            <div class="hero-action-btns">
                <a href="https://github.com/saimilyas459-rgb" target="_blank" class="hero-btn"><i class="fab fa-github"></i> GitHub</a>
                <a href="https://pro.fiverr.com/pe/8zgYNwp" target="_blank" class="hero-btn"><i class="fas fa-bolt"></i> Fiverr</a>
            </div>
        </div>

        <div class="about-hero-right">
            <div class="interactive-dot-box" id="dotBox">
                <?php for($i=0; $i<196; $i++) echo '<span class="repel-dot"></span>'; ?>
                <div class="box-label">Creative Mind</div>
            </div>
        </div>
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