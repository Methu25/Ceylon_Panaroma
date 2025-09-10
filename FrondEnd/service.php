

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Services | Ceylon Panorama</title>

  <!-- Bootstrap 4 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/service.css">
  <script src="js/service.js"></script>
</head>

<body>

  <!-- Hero Section with Navbar -->
  <section class="hero d-flex flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5" style="top:0;">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold mr-5" href="#">Ceylon Panorama</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto d-flex align-items-center">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown">Themes</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="nature.php">Nature</a>
                <a class="dropdown-item active" href="adventure.php">Adventure</a>
                <a class="dropdown-item" href="culture.php">Culture</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown">Services</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="service.php#hotels">Hotels</a>
                <a class="dropdown-item" href="service.php#medicare">Medicare</a>
                <a class="dropdown-item" href="service.php#transport">Transport</a>
                <a class="dropdown-item" href="service.php#tourguide">Tour Guide</a>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
            <li class="nav-item ml-3">
              <a class="nav-link" href="cart.php">
                <img src="cart.png" alt="Cart" width="30" height="30">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <h1 class="hero-title">Adventure Escapes</h1>
      <p class="hero-sub">Thrill, explore, and experience — curated adventure journeys across Sri Lanka.</p>
    </div>
  </section>

  <!-- Services container -->
  <main class="container py-5">

    <!-- Hotels -->
    <section id="hotels" class="mb-5">
      <div class="row">
        <div class="col-md-6">
          <img src="https://images.unsplash.com/photo-1501117716987-c8e2e0b1b8f0?auto=format&fit=crop&w=800&q=80"
            class="img-fluid rounded shadow" alt="Hotels">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
          <h3>Hotels</h3>
          <p>Discover the best hotels across Sri Lanka — from budget stays to luxurious resorts. Select your
            preferred location and budget to book instantly.</p>
          <a href="#" class="btn btn-primary mt-3 book-btn" data-service="hotels">Book Now</a>
        </div>
      </div>
    </section>

    <!-- Transport -->
    <section id="transport" class="mb-5">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="https://images.unsplash.com/photo-1508253578933-8f4a4d65d39c?auto=format&fit=crop&w=800&q=80"
            class="img-fluid rounded shadow" alt="Transport">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center order-md-1">
          <h3>Transport</h3>
          <p>Reliable and comfortable transport options for your travels — buses, cabs, tuk-tuks, and vans. Choose
            your pickup and drop-off locations to get started.</p>
          <a href="#" class="btn btn-primary mt-3 book-btn" data-service="transport">Book Now</a>
        </div>
      </div>
    </section>

    <!-- Medicare -->
    <section id="medicare" class="mb-5">
      <div class="row">
        <div class="col-md-6">
          <img src="https://images.unsplash.com/photo-1588776814546-8f2f16b6d5d0?auto=format&fit=crop&w=800&q=80"
            class="img-fluid rounded shadow" alt="Medicare">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
          <h3>Medicare</h3>
          <p>Book medical services with ease — find hospitals, specialists, and OPD services in your preferred
            town. Your health, simplified and secure.</p>
          <a href="#" class="btn btn-primary mt-3 book-btn" data-service="medicare">Book Now</a>
        </div>
      </div>
    </section>

    <!-- Tour Guide -->
    <section id="tourguide" class="mb-5">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="https://images.unsplash.com/photo-1508253578933-8f4a4d65d39c?auto=format&fit=crop&w=800&q=80"
            class="img-fluid rounded shadow" alt="Tour Guide">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center order-md-1">
          <h3>Tour Guide</h3>
          <p>Professional guides to help you explore Sri Lanka’s hidden gems, cultural sites, and adventure trails.</p>
          <a href="#" class="btn btn-primary mt-3 book-btn" data-service="tourguide">Book Now</a>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer class="footer bg-dark text-white pt-5">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <h5>Ceylon Panorama</h5>
          <p>Explore Sri Lanka's beauty with our curated travel themes and packages. We are dedicated to making your journey unforgettable.</p>
          <div>
            <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white mr-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>

        <div class="col-md-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="home.php" class="text-white">Home</a></li>
            <li><a href="gallery.php" class="text-white">Gallery</a></li>
            <li><a href="themes.php" class="text-white">Themes</a></li>
            <li><a href="service.php" class="text-white">Services</a></li>
            <li><a href="contact.php" class="text-white">Contact</a></li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5>Our Services</h5>
          <ul class="list-unstyled">
            <li><a href="#hotels" class="text-white">Hotels</a></li>
            <li><a href="#medicare" class="text-white">Medicare</a></li>
            <li><a href="#transport" class="text-white">Transport</a></li>
            <li><a href="#tourguide" class="text-white">Tour Guide</a></li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5>Contact Info</h5>
          <p>📞 +94 71 234 5678</p>
          <p>📧 info@ceylonpanorama.com</p>
          <p>📍 Colombo, Sri Lanka</p>
          <p>🕑 Service Hours: 24/7</p>
        </div>

      </div>

      <div class="footer-bottom text-center mt-4">
        <p>© 2025 Ceylon Panorama. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- BookNow Button Logic -->
  <script>
    document.querySelectorAll(".book-btn").forEach(btn => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        let service = this.getAttribute("data-service");

        let isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
          window.location.href = "signin.php";
        } else {
          window.location.href = "bookingforservices.php?service=" + service;
        }
      });
    });
  </script>

</body>
</html>
