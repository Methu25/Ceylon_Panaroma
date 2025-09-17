<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
if (!isset($_GET['id'])) { header("Location: admin_dashboard.php"); exit(); }
$id = intval($_GET['id']);

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

// fetch existing product (prepared)
$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows === 0) { $stmt->close(); header("Location: admin_dashboard.php"); exit(); }
$product = $res->fetch_assoc();
$stmt->close();

$error = '';
if (isset($_POST['update_product'])) {
    $name = trim($_POST['product_name']);
    $desc = trim($_POST['product_description']);
    $price = floatval($_POST['product_price']);
    $category = trim($_POST['product_category']);
    $image = handleImageUpload('product_image', $product['product_image']);

    $u = $conn->prepare("UPDATE products SET product_name=?, product_description=?, product_price=?, product_category=?, product_image=?, status='updated', updated_at=NOW() WHERE product_id=?");
    $u->bind_param("ssdssi", $name, $desc, $price, $category, $image, $id);
    if ($u->execute()) {
        $u->close();
        header("Location: admin_dashboard.php?msg=" . urlencode("Product updated"));
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
<title>Update Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<!-- NAVBAR PLACEHOLDER -->
<div style="height:72px"></div>

<div class="container my-4">
  <h2>Update Product</h2>
  <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6"><input type="text" name="product_name" class="form-control" value="<?=htmlspecialchars($product['product_name'])?>" required></div>
    <div class="col-md-6"><input type="number" step="0.01" name="product_price" class="form-control" value="<?=$product['product_price']?>" required></div>
    <div class="col-md-6"><input type="text" name="product_category" class="form-control" value="<?=htmlspecialchars($product['product_category'])?>" required></div>
    <div class="col-12"><textarea name="product_description" class="form-control"><?=htmlspecialchars($product['product_description'])?></textarea></div>
    <div class="col-12">
      <?php if(!empty($product['product_image'])): ?>
        <img src="<?=htmlspecialchars($product['product_image'])?>" width="120" class="mb-2">
      <?php endif; ?>
      <input type="file" name="product_image" class="form-control">
    </div>
    <div class="col-12">
      <button name="update_product" class="btn btn-primary">Update</button>
      <a href="admin_dashboard.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
</body>
</html>