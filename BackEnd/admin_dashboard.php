<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// DB connect - adjust credentials/dbname if needed
include 'db.php';

// Fetch counts
$user_count = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'] ?? 0;
$package_count = $conn->query("SELECT COUNT(*) AS total FROM packages")->fetch_assoc()['total'] ?? 0;
$product_count = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'] ?? 0;

// Fetch lists (no user input -> safe)
$packages = $conn->query("SELECT * FROM packages ORDER BY package_id DESC");
$products = $conn->query("SELECT * FROM products ORDER BY product_id DESC");

$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="admin.css">
</head>
<body class="bg-light">

<!-- NAVBAR PLACEHOLDER: Paste your navbar here -->
 <section class="hero d-flex flex-column">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5 py-3">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold me-5" href="#">Ceylon Panorama</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Themes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item active" href="nature.php">Nature</a></li>
              <li><a class="dropdown-item" href="adventure.php">Adventure</a></li>
              <li><a class="dropdown-item" href="culture.php">Culture</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Services
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="service.php#hotels">Hotels</a></li>
              <li><a class="dropdown-item" href="service.php#medicare">Medicare</a></li>
              <li><a class="dropdown-item" href="service.php#transport">Transport</a></li>
              <li><a class="dropdown-item" href="service.php#tourguide">Tour Guide</a></li>
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

          <?php if(isset($_SESSION['admin_id'])): ?>
            <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Admin</a></li>
          <?php elseif(isset($_SESSION['user_id'])): ?>
            <li class="nav-item"><a class="nav-link" href="logout.php">Sign Out</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
          <?php endif; ?>

          <li class="nav-item ms-3">
            <a class="nav-link" href="cart.php">
              <img src="images/cart.jpg" alt="Cart" width="30" height="30" class="rounded-circle">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Content -->
  <div class="hero-content d-flex flex-column justify-content-center align-items-center text-center">
    <h1 class="display-3 fw-bold text-white">All Roads Lead Here</h1>
    <p class="lead text-white">Every Corner | Every Culture | One Panorama</p>
  </div>
</section>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Visual space for navbar (replace with your navbar markup) -->
<div style="height:72px"></div>

<div class="container my-4">
  <h1 class="text-center mb-4">Admin Dashboard</h1>

  <?php if($msg): ?>
    <div class="alert alert-info"><?= $msg ?></div>
  <?php endif; ?>

  <!-- Stats Cards -->
  <div class="row mb-4 g-3">
    <div class="col-md-4">
      <div class="card h-100 text-bg-success">
        <div class="card-body text-center">
          <h6>Total Packages</h6>
          <h2 class="fw-bold"><?= $package_count ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 text-bg-warning">
        <div class="card-body text-center">
          <h6>Total Products</h6>
          <h2 class="fw-bold"><?= $product_count ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Actions -->
  <div class="mb-3 text-end">
    <a href="add-package.php" class="btn btn-primary me-2">Add Package</a>
    <a href="add-product.php" class="btn btn-success">Add Product</a>
  </div>

  <!-- Packages Table -->
  <div class="card mb-4">
    <div class="card-header">Packages</div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th><th>Actions</th></tr>
        </thead>
        <tbody>
          <?php while($p = $packages->fetch_assoc()): ?>
            <tr>
              <td><?= $p['package_id'] ?></td>
              <td><?= htmlspecialchars($p['package_name']) ?></td>
              <td>$<?= number_format($p['package_price'],2) ?></td>
              <td><?php if(!empty($p['package_image'])) echo "<img src='".htmlspecialchars($p['package_image'])."' width='60'>"; ?></td>
              <td>
                <a href="update-package.php?id=<?= $p['package_id'] ?>" class="btn btn-sm btn-outline-primary">Update</a>
                <a href="delete-package.php?id=<?= $p['package_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete package?')">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>

  <!-- Products Table -->
  <div class="card mb-5">
    <div class="card-header">Products</div>
    <div class="card-body p-0">
      <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th><th>Actions</th></tr>
        </thead>
        <tbody>
          <?php while($pr = $products->fetch_assoc()): ?>
            <tr>
              <td><?= $pr['product_id'] ?></td>
              <td><?= htmlspecialchars($pr['product_name']) ?></td>
              <td>$<?= number_format($pr['product_price'],2) ?></td>
              <td><?php if(!empty($pr['product_image'])) echo "<img src='".htmlspecialchars($pr['product_image'])."' width='60'>"; ?></td>
              <td>
                <a href="update-product.php?id=<?= $pr['product_id'] ?>" class="btn btn-sm btn-outline-primary">Update</a>
                <a href="delete-product.php?id=<?= $pr['product_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete product?')">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>

</div>
</body>
</html>