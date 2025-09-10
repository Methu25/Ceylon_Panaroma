

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Adventure Packages | Ceylon Panorama</title>

  <!-- Bootstrap 4 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/adventure.css">

  <!-- Custom JS -->
  <script src="js/adventure.js"></script>
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
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown">Themes</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="nature.php">Nature</a>
                <a class="dropdown-item active" href="adventure.php">Adventure</a>
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
                <img src="cart.png" alt="Cart" width="30" height="30">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-white text-center mt-5 pt-5">
      <h1 class="hero-title">Adventure Escapes</h1>
      <p class="hero-sub">Thrill, explore, and experience — curated adventure journeys across Sri Lanka.</p>
    </div>
  </section>

  <!-- Packages container -->
  <main class="container py-5">

    <!-- Budget -->
    <section class="mb-5">
      <h2 class="section-title">Budget Adventure Packages</h2>
      <div class="row">

        <!-- A1 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=321" class="card-img-top" alt="Rock Climb">
            <div class="card-body">
              <h5 class="card-title">Rock Climb</h5>
              <p>Half-day rock climbing session with safety gear and guides.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Half-day</li>
                <li>🧗 Beginner-friendly climb</li>
                <li>🥤 Refreshments included</li>
              </ul>
              <p><strong>$95</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Rock Climb', 95, 'https://picsum.photos/400/250?random=321')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A2 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=322" class="card-img-top" alt="Kayaking Trip">
            <div class="card-body">
              <h5 class="card-title">Kayaking Trip</h5>
              <p>Guided kayaking across calm rivers with picnic breaks.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 1 day</li>
                <li>🛶 Kayak rental included</li>
                <li>🍴 Lunch provided</li>
              </ul>
              <p><strong>$120</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Kayaking Trip', 120, 'https://picsum.photos/400/250?random=322')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A3 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=323" class="card-img-top" alt="Cave Exploration">
            <div class="card-body">
              <h5 class="card-title">Cave Exploration</h5>
              <p>Discover hidden caves with headlamps, guides, and local myths.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 3-4 hours</li>
                <li>🔦 Safety gear included</li>
                <li>📸 Scenic photo points</li>
              </ul>
              <p><strong>$100</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Cave Exploration', 100, 'https://picsum.photos/400/250?random=323')">Add to Cart</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Midrange -->
    <section class="mb-5">
      <h2 class="section-title">Mid-Range Adventure Packages</h2>
      <div class="row">

        <!-- A4 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=324" class="card-img-top" alt="Safari Adventure">
            <div class="card-body">
              <h5 class="card-title">2-Day Safari Adventure</h5>
              <p>Camp in the wild, enjoy jeep safaris, and experience night sounds of the jungle.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 2 days / 1 night</li>
                <li>🚙 Jeep safari included</li>
                <li>🍲 Meals & camping gear</li>
              </ul>
              <p><strong>$200</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('2-Day Safari Adventure', 200, 'https://picsum.photos/400/250?random=324')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A5 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=325" class="card-img-top" alt="Mountain Trek">
            <div class="card-body">
              <h5 class="card-title">Mountain Trek</h5>
              <p>Guided mountain trek with camping and stargazing under clear skies.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Weekend</li>
                <li>🏕 Camping included</li>
                <li>🔥 Bonfire & meals</li>
              </ul>
              <p><strong>$220</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Mountain Trek', 220, 'https://picsum.photos/400/250?random=325')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A6 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=326" class="card-img-top" alt="River Rafting">
            <div class="card-body">
              <h5 class="card-title">River Rafting Challenge</h5>
              <p>Experience the thrill of white-water rafting with trained professionals.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 1 day</li>
                <li>🛶 Raft & gear included</li>
                <li>🥤 Refreshments</li>
              </ul>
              <p><strong>$180</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('River Rafting Challenge', 180, 'https://picsum.photos/400/250?random=326')">Add to Cart</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Premium -->
    <section class="mb-5">
      <h2 class="section-title">Premium Adventure Packages</h2>
      <div class="row">

        <!-- A7 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=327" class="card-img-top" alt="Skydiving Experience">
            <div class="card-body">
              <h5 class="card-title">Skydiving Experience</h5>
              <p>Feel the adrenaline rush with tandem skydiving over stunning landscapes.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Half-day</li>
                <li>🪂 Tandem jump with instructor</li>
                <li>📸 Video package included</li>
              </ul>
              <p><strong>$450</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Skydiving Experience', 450, 'https://picsum.photos/400/250?random=327')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A8 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=328" class="card-img-top" alt="Hot Air Balloon Ride">
            <div class="card-body">
              <h5 class="card-title">Hot Air Balloon Ride</h5>
              <p>Soar above landscapes at sunrise with champagne breakfast on landing.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Morning</li>
                <li>🎈 Professional pilot</li>
                <li>🥂 Champagne breakfast</li>
              </ul>
              <p><strong>$380</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Hot Air Balloon Ride', 380, 'https://picsum.photos/400/250?random=328')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- A9 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=329" class="card-img-top" alt="Scuba Diving Retreat">
            <div class="card-body">
              <h5 class="card-title">Scuba Diving Retreat</h5>
              <p>Luxury diving experience with certified instructors and island stay.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 3 days</li>
                <li>🤿 All gear & lessons</li>
                <li>🏝 Island resort stay</li>
              </ul>
              <p><strong>$500</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Scuba Diving Retreat', 500, 'https://picsum.photos/400/250?random=329')">Add to Cart</button>
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
