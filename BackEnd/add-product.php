<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "ceylon_panaroma";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

function handleImageUpload($fileField) {
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== UPLOAD_ERR_OK) return null;
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);
    $fileTmp = $_FILES[$fileField]['tmp_name'];
    $fileName = time() . "_" . preg_replace('/[^A-Za-z0-9_.-]/','',basename($_FILES[$fileField]['name']));
    $target_file = $target_dir . $fileName;
    $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','webp'];
    if (!in_array($ext, $allowed)) return null;
    return move_uploaded_file($fileTmp, $target_file) ? $target_file : null;
}

$error = '';
if (isset($_POST['add_product'])) {
    $admin_id = $_SESSION['admin_id'];
    $name = trim($_POST['product_name']);
    $desc = trim($_POST['product_description']);
    $price = floatval($_POST['product_price']);
    $category = trim($_POST['product_category']);
    $image = handleImageUpload('product_image');

    $stmt = $conn->prepare("INSERT INTO products (admin_id, product_name, product_description, product_price, product_category, product_image, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, 'created', NOW(), NOW())");
    $stmt->bind_param("issdss", $admin_id, $name, $desc, $price, $category, $image);
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?msg=" . urlencode("Product added"));
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="admin.css">
</head>
<body class="bg-light">
<!-- NAVBAR PLACEHOLDER -->
<div style="height:72px"></div>

<div class="container my-4">
  <h2>Add Product</h2>
  <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6"><input type="text" name="product_name" class="form-control" placeholder="Product name" required></div>
    <div class="col-md-6"><input type="number" step="0.01" name="product_price" class="form-control" placeholder="Price" required></div>
    <div class="col-md-6"><input type="text" name="product_category" class="form-control" placeholder="Category" required></div>
    <div class="col-12"><textarea name="product_description" class="form-control" placeholder="Description"></textarea></div>
    <div class="col-12"><input type="file" name="product_image" class="form-control"></div>
    <div class="col-12">
      <button name="add_product" class="btn btn-success">Add Product</button>
      <a href="admin_dashboard.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
</body>
</html>