<?php
include('db_connection.php');

if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, father_name, email, location, password) 
            VALUES ('$name', '$f_name', '$email', '$location', '$pass')";

    if(mysqli_query($conn, $sql)){
        // Seedha login page par bhejein
        header("Location: login.php?status=registered");
        exit();
    } else {
        $error = "Registration failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account | Saim Ilyas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="saim-project-full-wrapper">
        <div class="saim-project-auth-card">
            <div class="saim-project-header">
                <span class="saim-project-accent">Join Us</span>
                <h2>Register</h2>
            </div>
            <form method="POST">
                <div style="display: flex; gap: 10px;">
                    <div class="saim-project-input-group">
                        <label>Full Name</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="saim-project-input-group">
                        <label>Father's Name</label>
                        <input type="text" name="f_name" required>
                    </div>
                </div>
                <div class="saim-project-input-group">
                    <label>Location</label>
                    <input type="text" name="location" required>
                </div>
                <div class="saim-project-input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required>
                </div>
                <div class="saim-project-input-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" name="register" class="saim-project-btn">Register Now</button>
            </form>
            <div class="saim-project-footer">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>
    </div>
</body>
</html>