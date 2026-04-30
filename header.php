<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<header class="site-header">
    <div class="header-logo"><?php echo $user_name; ?></div>
    
    <nav class="main-navbar">
        <a href="index.php" class="nav-item">Home</a>
        <a href="about.php" class="nav-item">About</a>
        <a href="projects.php" class="nav-item">Projects</a>
        <a href="contact.php" class="nav-item">Contact</a>
    </nav>

    <!-- Login/Signup ko alag section mein rakhen -->
    <div class="auth-buttons">
        <a href="login.php" class="login-btn">Login</a>
        <a href="signup.php" class="signup-btn">Sign Up</a>
    </div>
</header>
<script src="script.js"></script>

</body>
</html>