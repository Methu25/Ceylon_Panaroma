
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Culture Packages | Ceylon Panorama</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/culture.css">

  <!-- Custom JS -->
  <script src="js/culture.js"></script>
</head>
<body>

<!-- Hero Section with Navbar -->
<section class="hero d-flex flex-column">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="home.php">Ceylon Panorama</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>

          <!-- Themes Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="themesDropdown" data-toggle="dropdown">Themes</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="nature.php">Nature</a>
              <a class="dropdown-item" href="adventure.php">Adventure</a>
              <a class="dropdown-item active" href="culture.php">Culture</a>
            </div>
          </li>

          <!-- Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" data-toggle="dropdown">Services</a>
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
  <div class="container text-white text-center mt-5 pt-5">
    <h1 class="hero-title">Cultural Experiences</h1>
    <p class="hero-sub">Immerse, explore, and connect — curated cultural journeys across Sri Lanka.</p>
  </div>
</section>

<!-- Packages Section -->
<!-- Packages container -->
<main class="container py-5">

  <!-- Budget Packages -->
  <section class="mb-5">
    <h2 class="section-title">Budget Culture Packages</h2>
    <div class="row">

      <!-- B1 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=311" class="card-img-top" alt="Village Walk">
          <div class="card-body">
            <h5 class="card-title">Village Walk</h5>
            <p>Meet locals, learn traditional crafts, and experience authentic village life.</p>
            <ul class="text-left small">
              <li>⏱ Duration: Half-day</li>
              <li>🧑‍🌾 Craft demonstrations</li>
              <li>🍵 Local refreshments</li>
            </ul>
            <p><strong>$500</strong></p>
            <a href="culture.php?add_to_cart=1&name=Village%20Walk&price=500&image=https://picsum.photos/400/250?random=311" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- B2 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=312" class="card-img-top" alt="Temple Tour">
          <div class="card-body">
            <h5 class="card-title">Temple Tour</h5>
            <p>Discover heritage sites, observe rituals, and learn about local beliefs.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 1 day</li>
              <li>🛕 Guided temple visits</li>
              <li>📸 Photo opportunities</li>
            </ul>
            <p><strong>$600</strong></p>
            <a href="culture.php?add_to_cart=1&name=Temple%20Tour&price=600&image=https://picsum.photos/400/250?random=312" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- B3 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=313" class="card-img-top" alt="Traditional Dance">
          <div class="card-body">
            <h5 class="card-title">Traditional Dance</h5>
            <p>Enjoy a live performance and join a beginner-friendly dance workshop.</p>
            <ul class="text-left small">
              <li>⏱ Duration: Evening</li>
              <li>💃 Dance workshop</li>
              <li>🎭 Cultural show</li>
            </ul>
            <p><strong>$700</strong></p>
            <a href="culture.php?add_to_cart=1&name=Traditional%20Dance&price=700&image=https://picsum.photos/400/250?random=313" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Midrange Packages -->
  <section class="mb-5">
    <h2 class="section-title">Mid-Range Culture Packages</h2>
    <div class="row">

      <!-- M1 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=321" class="card-img-top" alt="Festival Tour">
          <div class="card-body">
            <h5 class="card-title">Festival Tour</h5>
            <p>Join vibrant local celebrations, parades, and traditional feasts.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 2 days</li>
              <li>🎉 Festival access</li>
              <li>🍽 Traditional meals</li>
            </ul>
            <p><strong>$1000</strong></p>
            <a href="culture.php?add_to_cart=1&name=Festival%20Tour&price=1000&image=https://picsum.photos/400/250?random=321" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- M2 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=322" class="card-img-top" alt="Heritage Village Stay">
          <div class="card-body">
            <h5 class="card-title">Heritage Village Stay</h5>
            <p>Experience local life, cuisine, and hands-on cultural activities.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 2 nights</li>
              <li>🏡 Village homestay</li>
              <li>🍲 Cooking class</li>
            </ul>
            <p><strong>$1200</strong></p>
            <a href="culture.php?add_to_cart=1&name=Heritage%20Village%20Stay&price=1200&image=https://picsum.photos/400/250?random=322" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- M3 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=323" class="card-img-top" alt="Temple Ceremony Experience">
          <div class="card-body">
            <h5 class="card-title">Temple Ceremony Experience</h5>
            <p>Participate in traditional rituals and offerings at historic temples.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 1 day</li>
              <li>🛕 Ritual participation</li>
              <li>📖 Cultural guide</li>
            </ul>
            <p><strong>$1500</strong></p>
            <a href="culture.php?add_to_cart=1&name=Temple%20Ceremony%20Experience&price=1500&image=https://picsum.photos/400/250?random=323" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Premium Packages -->
  <section class="mb-5">
    <h2 class="section-title">Premium Culture Packages</h2>
    <div class="row">

      <!-- P1 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=331" class="card-img-top" alt="Royal Cultural Tour">
          <div class="card-body">
            <h5 class="card-title">Royal Cultural Tour</h5>
            <p>Visit palaces, enjoy traditional feasts, and explore with a private guide.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 3 days</li>
              <li>🏰 Palace visits</li>
              <li>👨‍🏫 Private guide</li>
            </ul>
            <p><strong>$2000</strong></p>
            <a href="culture.php?add_to_cart=1&name=Royal%20Cultural%20Tour&price=2000&image=https://picsum.photos/400/250?random=331" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- P2 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=332" class="card-img-top" alt="Cultural Resort Stay">
          <div class="card-body">
            <h5 class="card-title">Cultural Resort Stay</h5>
            <p>Enjoy private performances, guided excursions, and luxury amenities.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 2 nights</li>
              <li>🏨 Resort accommodation</li>
              <li>🎶 Private shows</li>
            </ul>
            <p><strong>$2500</strong></p>
            <a href="culture.php?add_to_cart=1&name=Cultural%20Resort%20Stay&price=2500&image=https://picsum.photos/400/250?random=332" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

      <!-- P3 -->
      <div class="col-md-4 mb-4">
        <div class="card package-card">
          <img src="https://picsum.photos/400/250?random=333" class="card-img-top" alt="Heritage Palace Experience">
          <div class="card-body">
            <h5 class="card-title">Heritage Palace Experience</h5>
            <p>Enjoy traditional banquets and exclusive access to historic sites.</p>
            <ul class="text-left small">
              <li>⏱ Duration: 2 days</li>
              <li>🍽 Banquet dinners</li>
              <li>🏛 Private tours</li>
            </ul>
            <p><strong>$3000</strong></p>
            <a href="culture.php?add_to_cart=1&name=Heritage%20Palace%20Experience&price=3000&image=https://picsum.photos/400/250?random=333" 
               class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>
      </div>

    </div>
  </section>

</main>




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
          <li><a href="home.php">Home</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="themes.php">Themes</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
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

  <!-- Bootstrap 4 JS + jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/addtocart.js"></script>

</body>
</html>
