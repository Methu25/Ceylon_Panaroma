
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceylon Panorama</title>
  <!-- Bootstrap 4 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/home.css">
</head>

<body>

  <!-- Hero Section with Navbar -->
  <section class="hero d-flex flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5">
      <div class="container-fluid">
        <a class="navbar-brand font-weight-bold mr-5" href="#">Ceylon Panorama</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto d-flex align-items-center">
            <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown">Themes</a>
  <div class="dropdown-menu">
    <a class="dropdown-item active" href="nature.php">Nature</a>
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
<li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
<li class="nav-item ml-3">
  <a class="nav-link" href="cart.php">
    <img src="images\cart.png" alt="Cart" width="30" height="30">
  </a>
</li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <h1 class="font-weight-bold">All Roads Lead Here</h1>
      <p class="lead">Every Corner | Every Culture | One Panorama</p>
    </div>
  </section>

  <!-- Promotions Carousel -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-4">Promotions & Offers</h2>
      <div id="promoCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/Promotion01.jpg" class="d-block w-100" alt="Promo 1">
          </div>
          <div class="carousel-item">
            <img src="images/Promotion02.jpg" class="d-block w-100" alt="Promo 2">
          </div>
          <div class="carousel-item">
            <img src="images/Promotion03.jpg" class="d-block w-100" alt="Promo 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#promoCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#promoCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </section>

  <!-- Themes Section -->
  <section id="themes-section" class="container py-5">
    <h2 class="text-center mb-4">Choose Your Passion</h2>
    <p class="text-center mb-4">
      Discover your perfect journey. Adventure, Culture, Nature, or a combination of all – your passion drives your path.
    </p>
    <div class="row justify-content-center">
      <div class="col-md-3 mb-4">
        <a href="nature.html">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=11" class="card-img-top" alt="Nature">
            <div class="card-body text-center">
              <h5 class="card-title">Nature</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-4">
        <a href="adventure.html">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=12" class="card-img-top" alt="Adventure">
            <div class="card-body text-center">
              <h5 class="card-title">Adventure</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-4">
        <a href="culture.html">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=13" class="card-img-top" alt="Culture">
            <div class="card-body text-center">
              <h5 class="card-title">Culture</h5>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="container py-5 why-choose-us">
    <div class="row align-items-center">
      <div class="col-md-6 offset-md-3 text-center">
        <h2 class="mb-4 display-5">Why Ceylon Panorama?</h2>
        <p class="lead">
          Ceylon Panorama is your gateway to exploring the beauty of Sri Lanka. We offer a complete suite of services to ensure your adventure is seamless and unforgettable.
        </p>
        <div class="row text-center my-4 justify-content-center">
          <div class="col-4">
            <h3 class="font-weight-bold text-primary display-6">10K+</h3>
            <p class="text-muted">Happy Customers</p>
          </div>
          <div class="col-4">
            <h3 class="font-weight-bold text-success display-6">3860</h3>
            <p class="text-muted">Completed Tours</p>
          </div>
          <div class="col-4">
            <h3 class="font-weight-bold text-info display-6">24/7</h3>
            <p class="text-muted">Customer Support</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="container py-5" id="services">
    <h2 class="text-center mb-4">Our Services</h2>
    <p class="text-center mb-4">
      From hotels to travel guides, we offer a complete suite of services to ensure your Sri Lankan adventure is seamless and unforgettable.
    </p>
    <div class="row">
      <div class="col-md-4 mb-4">
        <a href="service.html#hotels">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=15" class="card-img-top" alt="Hotels">
            <div class="card-body text-center">
              <h5 class="card-title">Hotels</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 mb-4">
        <a href="service.html#medicare">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=16" class="card-img-top" alt="Medicare">
            <div class="card-body text-center">
              <h5 class="card-title">Medicare</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 mb-4">
        <a href="service.html#transport">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=17" class="card-img-top" alt="Transport">
            <div class="card-body text-center">
              <h5 class="card-title">Transport</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 mb-4">
        <a href="service.html#tourguide">
          <div class="card h-100 shadow">
            <img src="https://picsum.photos/400/250?random=18" class="card-img-top" alt="Tour Guide">
            <div class="card-body text-center">
              <h5 class="card-title">Tour Guide</h5>
            </div>
          </div>
        </a>
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
            <li><a href="index.html" class="text-light">Home</a></li>
            <li><a href="gallery.html" class="text-light">Gallery</a></li>
            <li><a href="themes.html" class="text-light">Themes</a></li>
            <li><a href="services.html" class="text-light">Services</a></li>
            <li><a href="contact.html" class="text-light">Contact</a></li>
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

  <!-- Bootstrap 4 JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
