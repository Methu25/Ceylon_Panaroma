<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceylon Panorama - Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="service.css">
</head>

<body>

  <!-- Hero Section with Navbar -->
  <section class="hero d-flex flex-column" style="background-image: url('css/servicemain.png');">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark position-absolute top-0 w-100 px-5">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold me-5" href="#">Ceylon Panorama</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item"><a class="nav-link " href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Themes</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="nature.php">Nature</a></li>
                <li><a class="dropdown-item" href="adventure.php">Adventure</a></li>
                <li><a class="dropdown-item" href="culture.php">Culture</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Services</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="service.php#hotels">Hotels</a></li>
                <li><a class="dropdown-item" href="service.php#medicare">Medical</a></li>
                <li><a class="dropdown-item" href="service.php#transport">Transport</a></li>
                <li><a class="dropdown-item" href="service.php#tourguide">Tour Guide</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <?php if (isset($_SESSION['admin_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Admin</a></li>
                        <?php elseif (isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Sign Out</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                        <?php endif; ?>
            <li class="nav-item ms-3">
              <a class="nav-link" href="cart.html">
                <img src="images/cart.jpg" alt="Cart" width="30" height="30" style="border-radius: 50%;">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container">
      <h1 class="hero-title">Ceylon Panorama Services</h1>
      <p class="hero-sub">Welcome! Explore our top-notch services to make your Sri Lankan journey unforgettable.</p>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section container py-5">

    <!-- Hotel Service -->
    <div id="hotels" class="service-item row align-items-center mb-5">
      <div class="col-md-6">
        <h3>Hotels</h3>
        <p>Discover the best hotels across Sri Lanka — from budget stays to luxurious resorts. Select your
          preferred location and budget to book instantly.</p>
        <a href="hotel.php" class="btn btn-primary mt-3">Book Now</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/homepagehotels.jpg" alt="Hotels" class="img-fluid rounded shadow">
      </div>
    </div>

    <!-- Transport Service -->
    <div id="transport" class="service-item row align-items-center mb-5 flex-md-row-reverse">
      <div class="col-md-6">
        <h3>Transport</h3>
        <p>Reliable and comfortable transport options for your travels — buses, cabs, tuk-tuks, and vans. Choose
          your pickup and drop-off locations to get started.</p>
        <a href="transport.php" class="btn btn-primary mt-3">Book Now</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/homepagetransport.jpg" alt="Transport" class="img-fluid rounded shadow"alt="Transport" class="img-fluid rounded shadow">
      </div>
    </div>

    <!-- Medical Service -->
    <div id="medicare" class="service-item row align-items-center mb-5">
      <div class="col-md-6">
        <h3>Medicare</h3>
        <p>Book medical services with ease — find hospitals, specialists, and OPD services in your preferred
          town. Your health, simplified and secure.</p>
        <a href="medicare.php" class="btn btn-primary mt-3">Book Now</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/homepagemedicare.jpg" alt="Medical" class="img-fluid rounded shadow">
      </div>
    </div>

    <!-- Tour Guide -->
    <div id="tourguide" class="service-item row align-items-center mb-5 flex-md-row-reverse">
      <div class="col-md-6">
        <h3>Tour Guide</h3>
        <p>Reliable and comfortable transport options for your travels — buses, cabs, tuk-tuks, and vans. Choose
          your pickup and drop-off locations to get started.</p>
        <a href="tourguide.php" class="btn btn-primary mt-3">Book Now</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/homepagetourguide.jpg" alt="Tour Guide" class="img-fluid rounded shadow">
      </div>
    </div>

  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <!-- Left -->
      <div class="footer-about">
        <h2 class="logo">Ceylon Panorama</h2>
        <p>
          Explore Sri Lanka's beauty with our curated travel themes and packages.
          We are dedicated to making your journey unforgettable.
        </p>
        <div class="footer-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li><a href="themes.html">Themes</a></li>
          <li><a href="service.html">Services</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div class="footer-services">
        <h3>Our Services</h3>
        <ul>
          <li><a href="#">Adventure Packages</a></li>
          <li><a href="#">Cultural Tours</a></li>
          <li><a href="#">Nature Escapes</a></li>
          <li><a href="#">Combo Experiences</a></li>
        </ul>
      </div>

      <!-- Information -->
      <div class="footer-info">
        <h3>Contact Info</h3>
        <p><strong>📞 Phone:</strong> +94 71 234 5678</p>
        <p><strong>📧 Email:</strong> info@ceylonpanorama.com</p>
        <p><strong>📍 Address:</strong> Colombo, Sri Lanka</p>
        <p><strong>🕑 Service Hours:</strong><br> We are available <b>24/7</b> for your travel needs.</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Ceylon Panorama. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
