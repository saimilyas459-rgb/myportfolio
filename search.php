<?php
session_start();
include('db_connection.php');

// Agar login nahi hai to access nahi milega
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$search_results = null;

if(isset($_POST['search_btn'])){
    $search_term = mysqli_real_escape_string($conn, $_POST['search_term']);
    
    // Sir's Requirement: Database se data search karna
    // Hum Skills ya Username dono par search kar sakte hain
    $query = "SELECT * FROM users WHERE skills LIKE '%$search_term%' OR username LIKE '%$search_term%'";
    $search_results = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Users | Saim Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .search-box {
            background: #161b22;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #30363d;
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
        }
        .result-card {
            background: #0d1117;
            border: 1px solid #30363d;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            color: white;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .result-card img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #58a6ff;
        }
        .no-result { color: #f85149; text-align: center; margin-top: 20px; }
    </style>
</head>
<body style="background-color: #0d1117; color: white; margin: 0;">
    <?php include('header.php'); ?>

    <div class="search-box">
        <h2 style="text-align: center; color: #58a6ff;">Find Developers & Skills</h2>
        <form method="POST" style="display: flex; gap: 10px;">
            <input type="text" name="search_term" placeholder="Search by name or skill (e.g. WordPress, PHP)" 
                   style="flex: 1; padding: 10px; border-radius: 6px; border: 1px solid #30363d; background: #0d1117; color: white;" required>
            <button type="submit" name="search_btn" class="saim-project-btn" style="width: auto; margin-top: 0; padding: 0 20px;">Search</button>
        </form>

        <?php if($search_results): ?>
            <div style="margin-top: 30px;">
                <h3 style="color: #8b949e; border-bottom: 1px solid #30363d; padding-bottom: 10px;">Results:</h3>
                <?php if(mysqli_num_rows($search_results) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($search_results)): ?>
                        <div class="result-card">
                            <img src="uploads/<?php echo $row['profile_pic'] ? $row['profile_pic'] : 'default.png'; ?>" alt="User">
                            <div>
                                <h4 style="margin: 0; color: #58a6ff;"><?php echo $row['username']; ?></h4>
                                <p style="margin: 5px 0; font-size: 13px; color: #c9d1d9;">Skills: <?php echo $row['skills']; ?></p>
                                <p style="margin: 0; font-size: 12px; color: #8b949e;">Education: <?php echo $row['education']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-result">No users found with that skill or name.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>