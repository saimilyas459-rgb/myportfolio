<?php
session_start();
include('db_connection.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['username'];
$success = "";
$error = "";

// RETRIEVE: Database se purana data nikalna
$fetch_query = "SELECT * FROM users WHERE username='$user'";
$res = mysqli_query($conn, $fetch_query);
$row = mysqli_fetch_assoc($res);

// UPDATE: Form submit hone par data save karna
if(isset($_POST['update_profile'])){
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $hobbies = mysqli_real_escape_string($conn, $_POST['hobbies']);
    
    $pic_name = $_FILES['profile_pic']['name'];
    if($pic_name){
        $target = "uploads/" . basename($pic_name);
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
        $pic_query = ", profile_pic='$pic_name'";
    } else {
        $pic_query = "";
    }

    // PHP Validation: Sir ki requirement
    if(!empty($education) && !empty($skills)){
        $update_query = "UPDATE users SET education='$education', experience='$experience', skills='$skills', hobbies='$hobbies' $pic_query WHERE username='$user'";
        if(mysqli_query($conn, $update_query)){
            $success = "Profile updated successfully!";
            header("Refresh:2"); 
        }
    } else {
        $error = "Education and Skills are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile | Saim Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Is se form bilkul center mein aa jayega */
        .saim-center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background-color: #0d1117;
            padding-top: 50px;
        }
        .saim-project-auth-card {
            background: #161b22;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #30363d;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .saim-project-input-group { margin-bottom: 15px; }
        .saim-project-input-group label { color: #8b949e; display: block; margin-bottom: 5px; }
        .saim-project-input-group input, .saim-project-input-group textarea {
            width: 100%;
            padding: 10px;
            background: #0d1117;
            border: 1px solid #30363d;
            color: white;
            border-radius: 6px;
        }
        .saim-project-btn {
            width: 100%;
            padding: 12px;
            background: #238636;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <script>
        // JS Validation: Sir ki requirement
        function validateForm() {
            let edu = document.forms["profileForm"]["education"].value;
            let skill = document.forms["profileForm"]["skills"].value;
            if (edu == "" || skill == "") {
                alert("Education and Skills cannot be empty!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body style="margin: 0; padding: 0;">
    <?php include('header.php'); ?>
    
    <div class="saim-center-container">
        <div class="saim-project-auth-card">
            <h2 style="text-align: center; color: #58a6ff; margin-bottom: 20px;">Update Your Profile</h2>
            
            <?php if($success) echo "<p style='color:#2ea043; text-align:center;'>$success</p>"; ?>
            <?php if($error) echo "<p style='color:#f85149; text-align:center;'>$error</p>"; ?>

            <form name="profileForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                
                <div class="saim-project-input-group">
                    <label>Profile Picture</label>
                    <input type="file" name="profile_pic">
                    <?php if($row['profile_pic']) echo "<small style='color: #58a6ff;'>File: ".$row['profile_pic']."</small>"; ?>
                </div>

                <div class="saim-project-input-group">
                    <label>Education</label>
                    <textarea name="education" placeholder="e.g. BS Software Engineering"><?php echo $row['education']; ?></textarea>
                </div>

                <div class="saim-project-input-group">
                    <label>Work Experience</label>
                    <textarea name="experience" placeholder="e.g. 2 Years in WordPress"><?php echo $row['experience']; ?></textarea>
                </div>

                <div class="saim-project-input-group">
                    <label>Skills</label>
                    <input type="text" name="skills" value="<?php echo $row['skills']; ?>" placeholder="HTML, CSS, PHP, MySQL">
                </div>

                <div class="saim-project-input-group">
                    <label>Hobbies</label>
                    <input type="text" name="hobbies" value="<?php echo $row['hobbies']; ?>" placeholder="Gaming, Driving">
                </div>

                <button type="submit" name="update_profile" class="saim-project-btn">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>