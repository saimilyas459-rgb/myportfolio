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
    
    
</head>
<body>

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


<section class="project-hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        
        <h1>Turning Ideas Into <span class="text-gradient">Digital Reality</span></h1>
        <p>Explore my journey through Software Engineering, WordPress Development, and Creative Design. Each project is a blend of logic and aesthetics.</p>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-num">20+</span>
                <span class="stat-label">Projects</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">5+</span>
                <span class="stat-label">Countries Visited</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">100%</span>
                <span class="stat-label">Dedication</span>
            </div>
        </div>
        <a href="#projects" class="hero-btn">View My Work <i class="fas fa-arrow-down"></i></a>
    </div>
</section>


<?php include('header.php'); ?>

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

<?php include('footer.php'); ?>


<script src="script.js"></script>
</body>
</html>