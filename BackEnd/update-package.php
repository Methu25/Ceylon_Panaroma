<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_GET['id'])) { header("Location: admin_dashboard.php"); exit(); }
$id = intval($_GET['id']);

// DB
$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "ceylon_panaroma";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

function handleImageUpload($fileField, $oldImage=null) {
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== UPLOAD_ERR_OK) return $oldImage;
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);
    $fileTmp = $_FILES[$fileField]['tmp_name'];
    $fileName = time() . "_" . preg_replace('/[^A-Za-z0-9_.-]/','',basename($_FILES[$fileField]['name']));
    $target_file = $target_dir . $fileName;
    $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','webp'];
    if (!in_array($ext, $allowed)) return $oldImage;
    if (move_uploaded_file($fileTmp, $target_file)) {
        if ($oldImage && file_exists($oldImage)) unlink($oldImage);
        return $target_file;
    }
    return $oldImage;
}

// fetch existing package (prepared)
$stmt = $conn->prepare("SELECT * FROM packages WHERE package_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows === 0) { $stmt->close(); header("Location: admin_dashboard.php"); exit(); }
$package = $res->fetch_assoc();
$stmt->close();

$error = '';
if (isset($_POST['update_package'])) {
    $name = trim($_POST['package_name']);
    $desc = trim($_POST['package_description']);
    $price = floatval($_POST['package_price']);
    $category = trim($_POST['package_category']);
    $type = trim($_POST['category_type']);
    $image = handleImageUpload('package_image', $package['package_image']);

    $u = $conn->prepare("UPDATE packages SET package_name=?, package_description=?, package_price=?, package_category=?, category_type=?, package_image=?, status='updated', updated_at=NOW() WHERE package_id=?");
    $u->bind_param("ssdsssi", $name, $desc, $price, $category, $type, $image, $id);
    if ($u->execute()) {
        $u->close();
        header("Location: admin_dashboard.php?msg=" . urlencode("Package updated"));
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
    $u->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Package</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="admin.css">
</head>
<body class="bg-light">
<!-- NAVBAR PLACEHOLDER -->
<div style="height:72px"></div>

<div class="container my-4">
  <h2>Update Package</h2>
  <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6"><input type="text" name="package_name" class="form-control" value="<?=htmlspecialchars($package['package_name'])?>" required></div>
    <div class="col-md-6"><input type="number" step="0.01" name="package_price" class="form-control" value="<?=$package['package_price']?>" required></div>
    <div class="col-md-6">
      <select name="package_category" class="form-control" required>
        <option value="">Select category</option>
        <option <?= $package['package_category']=="Budget"?"selected":""?>>Budget</option>
        <option <?= $package['package_category']=="Mid-Range"?"selected":""?>>Mid-Range</option>
        <option <?= $package['package_category']=="Premium"?"selected":""?>>Premium</option>
      </select>
    </div>
    <div class="col-md-6">
      <select name="category_type" class="form-control" required>
        <option value="">Select type</option>
        <option <?= $package['category_type']=="nature"?"selected":""?>>nature</option>
        <option <?= $package['category_type']=="adventure"?"selected":""?>>adventure</option>
        <option <?= $package['category_type']=="culture"?"selected":""?>>culture</option>
      </select>
    </div>
    <div class="col-12"><textarea name="package_description" class="form-control"><?=htmlspecialchars($package['package_description'])?></textarea></div>
    <div class="col-12">
      <?php if(!empty($package['package_image'])): ?>
        <img src="<?=htmlspecialchars($package['package_image'])?>" width="120" class="mb-2">
      <?php endif; ?>
      <input type="file" name="package_image" class="form-control">
    </div>
    <div class="col-12">
      <button name="update_package" class="btn btn-primary">Update</button>
      <a href="admin_dashboard.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
</body>
</html>