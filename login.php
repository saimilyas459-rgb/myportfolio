<?php
session_start();
include('db_connection.php');

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($pass, $user['password'])){
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Incorrect Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Secure Access</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="saim-project-full-wrapper">
        <div class="saim-project-auth-card">
            <div class="saim-project-header">
                <span class="saim-project-accent">SECURE LOGIN</span>
                <h2>User Login</h2>
            </div>

            <?php if(isset($error)) echo "<p style='color:#ff4d4d; font-size:14px; margin-bottom:15px;'>$error</p>"; ?>

            <form method="POST" action="login.php">
                <div class="saim-project-input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="example@mail.com" required>
                </div>
                <div class="saim-project-input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" name="login" class="saim-project-btn">Login Now</button>
            </form>

            <!-- Links sirf yahan card ke andar rahen ge -->
            <div style="display: flex; justify-content: space-between; margin-top: 25px; font-size: 13px;">
                <a href="forgot_password.php" style="color: #888; text-decoration: none;">Forgot Password?</a>
                <a href="signup.php" style="color: #1877f2; text-decoration: none; font-weight: bold;">Create Account</a>
            </div>

            <div style="margin-top: 25px; border-top: 1px solid #222; padding-top: 15px;">
                <p style="color: #555; font-size: 11px; margin-bottom: 5px;">Saim Ilyas © 2026</p>
                <p style="color: #444; font-size: 12px;">Don't have an account? <a href="signup.php" style="color: #1877f2; text-decoration: none;">Register Now</a></p>
            </div>
        </div>
    </div>
</body>
</html>