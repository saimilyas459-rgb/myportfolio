<?php
session_start();
// Security Check: Agar login nahi hai to wapas login page pr bhejo
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// Database Connection
$conn = new mysqli("localhost", "root", "", "mywebsite");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$message = "";
$status = "";

// 1. CREATE & UPDATE OPERATION WITH FILE UPLOAD
if (isset($_POST['save_item'])) {
    $id = $_POST['item_id'];
    $page_name = $_POST['page_name'];
    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    
    // Image Upload Logic
    $image_path = $_POST['existing_image']; // Fallback if no new image uploaded
    if (isset($_FILES['portfolio_image']) && $_FILES['portfolio_image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) { mkdir($target_dir, 0777, true); }
        
        $file_name = time() . '_' . basename($_FILES['portfolio_image']['name']);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES['portfolio_image']['tmp_name'], $target_file)) {
            $image_path = $target_file;
        }
    }

    if (!empty($title) && !empty($page_name)) {
        if (!empty($id)) {
            // UPDATE
            $stmt = $conn->prepare("UPDATE portfolio_items SET page_name=?, title=?, category=?, description=?, image_path=? WHERE id=?");
            $stmt->bind_param("sssssi", $page_name, $title, $category, $description, $image_path, $id);
            $message = "Content Updated Successfully inside '$page_name' Section!";
        } else {
            // INSERT (CREATE)
            $stmt = $conn->prepare("INSERT INTO portfolio_items (page_name, title, category, description, image_path) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $page_name, $title, $category, $description, $image_path);
            $message = "New Content Live on '$page_name' Page!";
        }
        $stmt->execute();
        $stmt->close();
        $status = "success";
    } else {
        $message = "Please fill out the Title and Page Selection fields.";
        $status = "error";
    }
}

// 2. SOFT DELETE (Recycle Bin Movement)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("UPDATE portfolio_items SET is_deleted = 1 WHERE id = $id");
    $message = "Item moved to Recycle Bin!";
    $status = "success";
}

// 3. RESTORE FROM RECYCLE BIN
if (isset($_GET['restore'])) {
    $id = intval($_GET['restore']);
    $conn->query("UPDATE portfolio_items SET is_deleted = 0 WHERE id = $id");
    $message = "Item Restored to active website page successfully!";
    $status = "success";
}

// 4. PERMANENT DELETE
if (isset($_GET['perm_delete'])) {
    $id = intval($_GET['perm_delete']);
    // Pehle database se image ka path lein taake file delete ho sake
    $res = $conn->query("SELECT image_path FROM portfolio_items WHERE id = $id");
    $row = $res->fetch_assoc();
    if(!empty($row['image_path']) && file_exists($row['image_path'])) {
        unlink($row['image_path']); // Storage se photo delete
    }
    $conn->query("DELETE FROM portfolio_items WHERE id = $id");
    $message = "Item permanently deleted from database.";
    $status = "success";
}

// EDIT FETCH LOGIC
$edit_item = ['id' => '', 'page_name' => 'Home', 'title' => '', 'category' => 'Project', 'description' => '', 'image_path' => ''];
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = $conn->query("SELECT * FROM portfolio_items WHERE id = $id");
    if ($result->num_rows > 0) { $edit_item = $result->fetch_assoc(); }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saim Admin System Control</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="dashboard-wrapper">
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-laptop-code"></i> Saim Admin
        </div>
        <ul>
            <li><a href="dashboard.php" class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li><a href="#crud-form-section"><i class="fa-solid fa-plus-minus"></i> Create / Update</a></li>
            <li><a href="#active-section"><i class="fa-solid fa-folder-open"></i> All Active Content</a></li>
            <li><a href="#recycle-section" class="trash-link"><i class="fa-solid fa-trash-can"></i> Recycle Bin / Trash</a></li>
            <hr style="border: 1px solid #333; margin: 15px 0;">
            <li class="sidebar-info-header">Live Page Targets</li>
            <li><a href="index.php" target="_blank"><i class="fa-solid fa-house"></i> View Live Site</a></li>
        </ul>
    </div>

    <div class="main-content fade-in">
        <div class="topbar">
            <div class="topbar-title">
                <h1>Saim Ilyas | Portfolio Core Manager</h1>
                <p class="subtitle">Full CRUD Operations with Media Attachment Layer</p>
            </div>
            <div class="user-meta">
                <span>Welcome, <strong><?= $_SESSION['username']; ?></strong> <i class="fa-regular fa-circle-user"></i></span>
                <a href="logout.php" class="logout-btn"><i class="fa-solid fa-power-off"></i></a>
            </div>
        </div>

        <?php if(!empty($message)): ?>
            <div class="alert-box <?= $status == 'success' ? 'alert-success' : 'alert-danger'; ?>">
                <i class="fa-solid <?= $status == 'success' ? 'fa-circle-check' : 'fa-triangle-exclamation'; ?>"></i> <?= $message; ?>
            </div>
        <?php endif; ?>

        <div class="crud-container" id="crud-form-section">
            <form action="dashboard.php" method="POST" enctype="multipart/form-data" class="crud-form" id="mainCoreForm">
                <input type="hidden" name="item_id" value="<?= $edit_item['id']; ?>">
                <input type="hidden" name="existing_image" value="<?= $edit_item['image_path']; ?>">

                <div class="form-header">
                    <h3><i class="fa-solid fa-pen-to-square"></i> <?= !empty($edit_item['id']) ? "Update/Modify Content" : "Create & Upload New Content"; ?></h3>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fa-solid fa-file-lines"></i> Select Target Page</label>
                        <select name="page_name" class="form-control" id="pageSelector">
                            <option value="Home" <?= $edit_item['page_name'] == 'Home' ? 'selected' : ''; ?>>Home Page</option>
                            <option value="About" <?= $edit_item['page_name'] == 'About' ? 'selected' : ''; ?>>About Section</option>
                            <option value="Projects" <?= $edit_item['page_name'] == 'Projects' ? 'selected' : ''; ?>>Projects Grid</option>
                            <option value="Contact" <?= $edit_item['page_name'] == 'Contact' ? 'selected' : ''; ?>>Contact Block</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-tags"></i> Classification Type (Category)</label>
                        <input type="text" name="category" class="form-control" placeholder="e.g., WordPress, Django, Graphic Design" value="<?= $edit_item['category']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-heading"></i> Element Title</label>
                    <input type="text" name="title" id="formTitleInput" class="form-control" placeholder="Enter headline or skill name" value="<?= $edit_item['title']; ?>">
                    <div class="validation-error" id="titleValidationError">Title structure cannot be empty!</div>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-align-left"></i> Description Body Text</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Write full specifications here..."><?= $edit_item['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-image"></i> Attachment File/Media (Image)</label>
                    <input type="file" name="portfolio_image" class="form-control file-input" accept="image/*">
                    <?php if(!empty($edit_item['image_path'])): ?>
                        <div class="current-img-preview">
                            <p>Current Attached Image:</p>
                            <img src="<?= $edit_item['image_path']; ?>" width="80" style="border-radius:6px; margin-top:5px; border: 1px solid #00d2ff;">
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" name="save_item" class="btn-submit"><i class="fa-solid fa-cloud-arrow-up"></i> Upload & Sync Component</button>
            </form>
        </div>

        <h2 class="table-section-heading" id="active-section"><i class="fa-solid fa-circle-check" style="color: #00cc66;"></i> Currently Active Core Content</h2>
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Page Location</th>
                        <th>Component Image</th>
                        <th>Title / Header</th>
                        <th>Classification</th>
                        <th>Actions Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $active_data = $conn->query("SELECT * FROM portfolio_items WHERE is_deleted = 0 ORDER BY page_name ASC, id DESC");
                    if($active_data->num_rows == 0):
                        echo "<tr><td colspan='5' class='text-center'>No active dynamic content loaded on pages.</td></tr>";
                    endif;
                    while($row = $active_data->fetch_assoc()):
                        $display_img = !empty($row['image_path']) ? $row['image_path'] : 'wordpress.png'; // safe fallback
                    ?>
                    <tr>
                        <td><span class="badge-page"><?= $row['page_name']; ?></span></td>
                        <td><img src="<?= $display_img; ?>" class="table-thumb" alt="thumb"></td>
                        <td><strong><?= $row['title']; ?></strong></td>
                        <td><span style="color: #00d2ff;"><?= !empty($row['category']) ? $row['category'] : 'None'; ?></span></td>
                        <td>
                            <a href="dashboard.php?edit=<?= $row['id']; ?>#crud-form-section" class="action-btn btn-edit-mode" title="Update/Edit"><i class="fa-solid fa-pen"></i></a>
                            <a href="dashboard.php?delete=<?= $row['id']; ?>" class="action-btn btn-trash-mode" title="Move to Trash" onclick="return confirm('Are you sure you want to send this to the Recycle Bin?')"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <h2 class="table-section-heading" id="recycle-section" style="color: #ff3333; margin-top: 60px;"><i class="fa-solid fa-dumpster" style="color: #ff3333;"></i> Recycle Bin System</h2>
        <div class="table-responsive">
            <table class="dashboard-table trash-table-style">
                <thead>
                    <tr>
                        <th>Origin Page</th>
                        <th>Deleted Element Name</th>
                        <th>Recovery Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $trash_data = $conn->query("SELECT * FROM portfolio_items WHERE is_deleted = 1 ORDER BY id DESC");
                    if($trash_data->num_rows == 0):
                        echo "<tr><td colspan='3' class='text-center' style='color:#666; padding: 20px;'>Recycle Bin is empty. No deleted structures found.</td></tr>";
                    endif;
                    while($row = $trash_data->fetch_assoc()):
                    ?>
                    <tr>
                        <td><span class="badge-page transparent-badge"><?= $row['page_name']; ?></span></td>
                        <td><strike style="color: #666;"><?= $row['title']; ?></strike></td>
                        <td>
                            <a href="dashboard.php?restore=<?= $row['id']; ?>" class="action-btn btn-restore-mode" title="Restore Data"><i class="fa-solid fa-rotate-left"></i> Restore</a>
                            <a href="dashboard.php?perm_delete=<?= $row['id']; ?>" class="action-btn btn-kill-mode" title="Delete Permanently" onclick="return confirm('⚠️ Warning! This will delete the data and media completely from server storage. Proceed?')"><i class="fa-solid fa-skull"></i> Wipe</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="dashboard.js"></script>
</body>
</html>