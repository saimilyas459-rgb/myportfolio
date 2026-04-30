<?php
include('db_connection.php');

if(isset($_POST['reset_submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Security check using Email and Location
    $check = "SELECT * FROM users WHERE email='$email' AND location='$location'";
    $run_check = mysqli_query($conn, $check);

    if(mysqli_num_rows($run_check) > 0){
        $update = "UPDATE users SET password='$new_pass' WHERE email='$email'";
        mysqli_query($conn, $update);
        $success = "Password reset successfully! Please login.";
    } else {
        $error = "Invalid Email or Location!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password | Secure Access</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="saim-project-full-wrapper">
        <div class="saim-project-auth-card">
            <div class="saim-project-header">
                <span class="saim-project-accent">RECOVERY</span>
                <h2>Reset Password</h2>
            </div>

            <?php if(isset($success)) echo "<p style='color:#00ff00; font-size:14px; margin-bottom:15px;'>$success</p>"; ?>
            <?php if(isset($error)) echo "<p style='color:#ff4d4d; font-size:14px; margin-bottom:15px;'>$error</p>"; ?>

            <form method="POST">
                <div class="saim-project-input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="saim-project-input-group">
                    <label>Your Location (Security Check)</label>
                    <input type="text" name="location" placeholder="e.g. Punjab or Kotli" required>
                </div>
                <div class="saim-project-input-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" placeholder="••••••••" required>
                </div>
                <button type="submit" name="reset_submit" class="saim-project-btn">Reset Now</button>
            </form>

            <div style="margin-top: 25px; border-top: 1px solid #222; padding-top: 15px; text-align: center;">
                <a href="login.php" style="color: #1877f2; text-decoration: none; font-size: 13px; font-weight: bold;">← Back to Login</a>
                <p style="color: #555; font-size: 11px; margin-top: 15px;">Saim Ilyas © 2026</p>
            </div>
        </div>
    </div>
</body>
</html>