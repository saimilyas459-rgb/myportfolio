<?php
session_start();
include('db_connection.php');

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['username'];
$msg = "";

// 1. CREATE: Image Upload karna
if(isset($_POST['upload_image'])){
    $caption = mysqli_real_escape_string($conn, $_POST['caption']);
    $img_name = $_FILES['gallery_img']['name'];
    $target = "uploads/" . basename($img_name);

    if(!empty($img_name)){
        if(move_uploaded_file($_FILES['gallery_img']['tmp_name'], $target)){
            $query = "INSERT INTO gallery (username, image_path, caption) VALUES ('$user', '$img_name', '$caption')";
            mysqli_query($conn, $query);
            $msg = "Image uploaded successfully!";
        }
    }
}

// 2. DELETE: Image khatam karna (Sir's Requirement)
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM gallery WHERE id='$id' AND username='$user'";
    mysqli_query($conn, $delete_query);
    $msg = "Image deleted!";
    header("Location: gallery.php");
}

// 3. RETRIEVE: Images fetch karna
$fetch_imgs = mysqli_query($conn, "SELECT * FROM gallery WHERE username='$user'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Gallery | Saim Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; padding: 20px; }
        .gallery-item { background: #161b22; border: 1px solid #30363d; padding: 10px; border-radius: 8px; text-align: center; }
        .gallery-item img { width: 100%; border-radius: 5px; height: 150px; object-fit: cover; }
        .btn-delete { background: #f85149; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 10px; }
    </style>
    <script>
        function validateGallery() {
            let img = document.forms["galleryForm"]["gallery_img"].value;
            if (img == "") {
                alert("Please select an image to upload!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body style="background-color: #0d1117; color: white;">
    <?php include('header.php'); ?>

    <div class="saim-center-container" style="padding-top: 20px; display: flex; flex-direction: column; align-items: center;">
        <div class="saim-project-auth-card">
            <h2 style="text-align: center; color: #58a6ff;">Add Personal Memories</h2>
            <form name="galleryForm" method="POST" enctype="multipart/form-data" onsubmit="return validateGallery()">
                <div class="saim-project-input-group">
                    <input type="file" name="gallery_img" style="color: white;">
                </div>
                <div class="saim-project-input-group">
                    <input type="text" name="caption" placeholder="Enter Caption (e.g. My Graduation)">
                </div>
                <button type="submit" name="upload_image" class="saim-project-btn">Upload to Gallery</button>
            </form>
            <p style="text-align: center; color: #2ea043;"><?php echo $msg; ?></p>
        </div>

        <h2 style="margin-top: 40px; color: #58a6ff;">Your Gallery</h2>
        <div class="gallery-grid">
            <?php while($row = mysqli_fetch_assoc($fetch_imgs)): ?>
                <div class="gallery-item">
                    <img src="uploads/<?php echo $row['image_path']; ?>">
                    <p style="font-size: 14px; margin: 5px 0;"><?php echo $row['caption']; ?></p>
                    <a href="gallery.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Delete this image?')">Delete</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>