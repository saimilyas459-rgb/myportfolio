<?php 
    $user_name = "Saim Ilyas"; 
    
    // Database Connection
    $conn = new mysqli("localhost", "root", "", "mywebsite");
    if ($conn->connect_error) { 
        die("Database Connection failed: " . $conn->connect_error); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | <?php echo $user_name; ?></title>
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
        // Yeh line check karti hai ke abhi konsi file khuli hui hai
        $current_page = basename($_SERVER['PHP_SELF']); 
    ?>
    <a href="index.php" class="nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
    <a href="about.php" class="nav-item <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
    <a href="projects.php" class="nav-item <?php echo ($current_page == 'projects.php') ? 'active' : ''; ?>">Projects</a>
    <a href="contact.php" class="nav-item <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
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

<section class="projects-section" id="projects">
    <h2 class="section-title">My Projects</h2>
    <div class="projects-container">
        
        <?php
        // Sirf wahi items fetch karega jo 'Projects' page ke liye active hain (is_deleted = 0)
        $fetch_projects = "SELECT * FROM portfolio_items WHERE page_name = 'Projects' AND is_deleted = 0 ORDER BY id DESC";
        $projects_result = $conn->query($fetch_projects);

        if ($projects_result && $projects_result->num_rows > 0):
            while($row = $projects_result->fetch_assoc()):
                
                // 1. Agar dashboard se image upload hui hai toh uska path check karein
                if (!empty($row['image_path']) && file_exists($row['image_path'])) {
                    $img_src = $row['image_path'];
                } else {
                    // 2. Agar dashboard se image upload nahi hui, toh Category ya Title ke hisab se default image set karein
                    $img_src = "wordpress.png"; // Default fallback
                    $title_lower = strtolower($row['title']);
                    $category_lower = strtolower($row['category']);

                    if (stripos($title_lower, 'django') !== false || stripos($category_lower, 'django') !== false) {
                        $img_src = "django.png";
                    } elseif (stripos($title_lower, 'graphic') !== false || stripos($category_lower, 'graphic') !== false) {
                        $img_src = "graphic.png";
                    } elseif (stripos($title_lower, 'marketing') !== false || stripos($category_lower, 'marketing') !== false) {
                        $img_src = "marketing.png";
                    } elseif (stripos($title_lower, 'social') !== false || stripos($category_lower, 'social') !== false) {
                        $img_src = "social.png";
                    } elseif (stripos($title_lower, 'e-commerce') !== false || stripos($category_lower, 'ecommerce') !== false) {
                        $img_src = "ecommerce.png";
                    }
                }
        ?>
                <div class="project-card">
                    <img src="<?= $img_src; ?>" alt="<?= $row['title']; ?>">
                    <div class="project-info">
                        <h3><?= $row['title']; ?></h3>
                        <p><?= $row['description']; ?></p>
                        <?php if(!empty($row['category'])): ?>
                            <small style="color: #00d2ff; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; display: block; margin-top: 5px;"><?= $row['category']; ?></small>
                        <?php endif; ?>
                    </div>
                </div>
        <?php 
            endwhile; 
        else:
            // Fallback Static Content: Agar database abhi khali ho toh yeh default items chalenge
        ?>
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
        <?php endif; ?>

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
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Me</a></li>
                <li><a href="projects.php">Projects</a></li>
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
                <a href="https://www.linkedin.com/in/saim-ilyas-61a914385" target="_blank" class="social-icon">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://pro.fiverr.com/pe/8zgYNwp" target="_blank" class="social-icon fiverr-btn">F</a>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <p>© 2026 Saim Ilyas | Software Engineering Technology</p>
    </div>
</footer>

<?php 
// Closing database connection safely
$conn->close(); 
?>
<script src="script.js"></script>
</body>
</html>