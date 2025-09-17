<?php
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceylon Panorama Gallery</title>

  <!-- Bootstrap 4.6.2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/gallery.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Hero Section with Navbar -->
  <section class="hero d-flex flex-column" style="background-image: url('images/gallerymain.png');">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5" style="top:0;">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold mr-5" href="home.php">Ceylon Panorama</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto d-flex align-items-center">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
<li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown">Themes</a>
  <div class="dropdown-menu">
    <a class="dropdown-item " href="nature.php">Nature</a>
    <a class="dropdown-item" href="adventure.php">Adventure</a>
    <a class="dropdown-item" href="culture.php">Culture</a>
  </div>
</li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">Services</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="service.php#hotels">Hotels</a>
    <a class="dropdown-item" href="service.php#medicare">Medicare</a>
    <a class="dropdown-item" href="service.php#transport">Transport</a>
    <a class="dropdown-item" href="service.php#tourguide">Tour Guide</a>
  </div>
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
<li class="nav-item ml-3">
  <a class="nav-link" href="cart.php">
    <img src="images/cart.jpg" alt="Cart" width="30" height="30" style="border-radius: 50%;">
  </a>
</li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1" ;>
      <h1 class="font-weight-bold">Ceylon Panorama Gallery</h1>
      <p class="lead">Explore the beauty of Sri Lanka through our curated themes</p>
    </div>
  </section>

  <!-- Example Section -->
  <section class="custom-section">
    <div class="row no-gutters align-items-center">
      <!-- Description -->
      <div class="col-md-6 p-5">
        <h2 class="font-weight-bold">Nature</h2>
        <p>
          Sri Lanka is a tropical paradise filled with lush greenery, misty mountains, golden beaches, and vibrant wildlife. From serene tea plantations in the highlands to exotic rainforests and cascading waterfalls, the island offers breathtaking scenery, making it a haven for nature lovers and adventure seekers alike.
        </p>
        <a href="#" class="btn btn-outline-light">Read More</a>
      </div>

      <!-- Carousel -->
      <div class="col-md-6 p-0">
        <div class="carousel-one-side left-curve">
          <div id="natureCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/naturegallery08.jpg" class="d-block w-100" alt="slide1">
              </div>
              <div class="carousel-item">
                <img src="images/naturegallery05.jpg" class="d-block w-100" alt="slide2">
              </div>
              <div class="carousel-item">
                <img src="images/naturegallery04.jpg" class="d-block w-100" alt="slide3">
              </div>
            </div>
            <a class="carousel-control-prev" href="#natureCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#natureCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="custom-section">
  <div class="row g-0 align-items-center"> <!-- g-0 removes gutter -->
    
    <!-- Fullscreen Carousel (curved on right side) -->
    <div class="col-md-6 p-0">
  <div class="carousel-one-side">
    <div id="adventureCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/adventuregallery05.jpg" class="d-block w-100" alt="slide1">
        </div>
        <div class="carousel-item">
          <img src="images/adventuregallery01.jpg" class="d-block w-100" alt="slide2">
        </div>
        <div class="carousel-item">
          <img src="images/adventuregallery06.jpg" class="d-block w-100" alt="slide3">
        </div>
      </div>

      <!-- Controls (Bootstrap 4 style) -->
      <a class="carousel-control-prev" href="#adventureCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#adventureCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>


    <!-- Description -->
    <div class="col-md-6 p-5">
      <h2 class="fw-bold">Adventure</h2>
      <p>
        For thrill-seekers, Sri Lanka offers an abundance of adventure activities. Hike to the top of Sigiriya Rock Fortress, explore the rugged Knuckles Mountain Range, or go white-water rafting in Kitulgala. Surf the waves of Arugam Bay, go wildlife safaris in Yala and Udawalawe National Parks, and enjoy adrenaline-pumping experiences that combine natural beauty with excitement.
      </p>
      <a href="#" class="btn btn-outline-light">Read More</a>
    </div>

  </div>
</section>


<section class="custom-section">
  <div class="row g-0 align-items-center">

    <!-- Description (now on left side) -->
    <div class="col-md-6 p-5">
      <h2 class="fw-bold">Culture</h2>
      <p>
        Sri Lanka boasts a rich cultural heritage shaped by over 2,500 years of history. Explore ancient cities like Anuradhapura and Polonnaruwa, marvel at the sacred Temple of the Tooth in Kandy, and experience vibrant festivals such as Esala Perahera. Traditional dance, music, art, and cuisine reflect a unique blend of Sinhalese, Tamil, and colonial influences, offering visitors an unforgettable cultural journey.
      </p>
      <a href="#" class="btn btn-outline-light">Read More</a>
    </div>

    <!-- Carousel (now on right side with curve on left edge) -->
    <div class="col-md-6 p-0">
  <div class="carousel-one-side left-curve">
    <div id="cultureCarousel" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#cultureCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#cultureCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#cultureCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <!-- Slides -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/culturegallery05.jpg" class="d-block w-100" alt="Cultural Event 1">
        </div>
        <div class="carousel-item">
          <img src="images/culturegallery04.jpg" class="d-block w-100" alt="Cultural Event 2">
        </div>
        <div class="carousel-item">
          <img src="images/homepageculture.jpg" class="d-block w-100" alt="Cultural Event 3">
        </div>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#cultureCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#cultureCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>
  </div>
</div>


  </div>
</section>

  <!-- Footer -->
  <footer class="footer bg-dark text-light pt-5">
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-3">
          <h2 class="logo">Ceylon Panorama</h2>
          <p>
            Explore Sri Lanka's beauty with our curated travel themes and packages.
            We are dedicated to making your journey unforgettable.
          </p>
          <div class="footer-social">
            <a href="#"><i class="fab fa-facebook-f mr-2"></i></a>
            <a href="#"><i class="fab fa-twitter mr-2"></i></a>
            <a href="#"><i class="fab fa-instagram mr-2"></i></a>
            <a href="#"><i class="fab fa-linkedin-in mr-2"></i></a>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-md-3">
          <h3>Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href="home.php" class="text-light">Home</a></li>
            <li><a href="gallery.php" class="text-light">Gallery</a></li>
            <li><a href="themes.php" class="text-light">Themes</a></li>
            <li><a href="services.php" class="text-light">Services</a></li>
            <li><a href="contact.php" class="text-light">Contact</a></li>
          </ul>
        </div>

        <!-- Services -->
        <div class="col-md-3">
          <h3>Our Services</h3>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light">Adventure Packages</a></li>
            <li><a href="#" class="text-light">Cultural Tours</a></li>
            <li><a href="#" class="text-light">Nature Escapes</a></li>
          </ul>
        </div>

        <!-- Info -->
        <div class="col-md-3">
          <h3>Contact Info</h3>
          <p><strong>📞 Phone:</strong> +94 71 234 5678</p>
          <p><strong>📧 Email:</strong> info@ceylonpanorama.com</p>
          <p><strong>📍 Address:</strong> Colombo, Sri Lanka</p>
          <p><strong>🕑 Service Hours:</strong><br> We are available <b>24/7</b></p>
        </div>
      </div>

      <div class="footer-bottom text-center py-3 mt-4 border-top">
        <p>© 2025 Ceylon Panorama. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap 4.6.2 JS + dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
