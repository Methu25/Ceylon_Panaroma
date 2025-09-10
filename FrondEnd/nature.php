

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nature Packages | Ceylon Panorama</title>

  <!-- Bootstrap 4 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/nature.css">

    <!-- Custom JS -->
  <script src="js/nature.js"></script>
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
    <img src="cart.png" alt="Cart" width="30" height="30">
  </a>
</li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-white text-center mt-5 pt-5">
      <h1 class="hero-title">Nature Escapes</h1>
      <p class="hero-sub">Restore, wander, and breathe — curated nature journeys across Sri Lanka.</p>
    </div>
  </section>

  <!-- Packages container -->
  <main class="container py-5">

    <!-- Budget -->
    <section class="mb-5">
      <h2 class="section-title">Budget Nature Packages</h2>
      <div class="row">

        <!-- B1 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=311" class="card-img-top" alt="Forest Walk">
            <div class="card-body">
              <h5 class="card-title">Forest Walk</h5>
              <p>Morning trail with birdwatching and a light snack. Perfect for beginners.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Half-day</li>
                <li>👣 Guided nature trail</li>
                <li>🥪 Packed snack included</li>
              </ul>
              <p><strong>$75</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Forest Walk', 75, 'https://picsum.photos/400/250?random=311')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- B2 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=312" class="card-img-top" alt="Waterfall Hop">
            <div class="card-body">
              <h5 class="card-title">Waterfall Hop</h5>
              <p>Short hikes to two scenic waterfalls with photo stops and cooling dips.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 1 day</li>
                <li>🚶 Easy to moderate hikes</li>
                <li>🍴 Lunch provided</li>
              </ul>
              <p><strong>$90</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Waterfall Hop', 90, 'https://picsum.photos/400/250?random=312')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- B3 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=313" class="card-img-top" alt="Tea Garden Walk">
            <div class="card-body">
              <h5 class="card-title">Tea Garden Walk</h5>
              <p>Leisurely stroll through lush plantations, ending with a tea tasting session.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 3 hours</li>
                <li>🍵 Tea tasting included</li>
                <li>📸 Guided photo spots</li>
              </ul>
              <p><strong>$80</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Tea Garden Walk', 80, 'https://picsum.photos/400/250?random=313')">Add to Cart</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Midrange -->
    <section class="mb-5">
      <h2 class="section-title">Mid-Range Nature Packages</h2>
      <div class="row">

        <!-- M1 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=314" class="card-img-top" alt="Jungle Camp">
            <div class="card-body">
              <h5 class="card-title">2-Day Jungle Camp</h5>
              <p>Stay in tents, enjoy local meals, and experience a thrilling guided night walk.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 2 days / 1 night</li>
                <li>🔥 Campfire & night-walk</li>
                <li>🍲 Meals included</li>
              </ul>
              <p><strong>$150</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('2-Day Jungle Camp', 150, 'https://picsum.photos/400/250?random=314')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- M2 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=315" class="card-img-top" alt="Eco Lodge">
            <div class="card-body">
              <h5 class="card-title">Eco-Lodge Stay</h5>
              <p>Sleep in a sustainable lodge, with guided treks and authentic local cuisine.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 2 nights</li>
                <li>🚶 Daily guided hikes</li>
                <li>🥘 Local organic meals</li>
              </ul>
              <p><strong>$180</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Eco-Lodge Stay', 180, 'https://picsum.photos/400/250?random=315')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- M3 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=316" class="card-img-top" alt="River Cabin">
            <div class="card-body">
              <h5 class="card-title">River Cabin Retreat</h5>
              <p>Relax in a cozy riverside cabin, enjoy paddling, fishing, and home-cooked meals.</p>
              <ul class="text-left small">
                <li>⏱ Duration: Weekend</li>
                <li>🛶 Canoeing included</li>
                <li>🍳 Full-board meals</li>
              </ul>
              <p><strong>$200</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('River Cabin Retreat', 200, 'https://picsum.photos/400/250?random=316')">Add to Cart</button>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Premium -->
    <section class="mb-5">
      <h2 class="section-title">Premium Nature Packages</h2>
      <div class="row">

        <!-- P1 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=317" class="card-img-top" alt="Rainforest Escape">
            <div class="card-body">
              <h5 class="card-title">Private Rainforest Escape</h5>
              <p>Exclusive villa in the rainforest, with private guide, chef, and spa treatments.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 3 days</li>
                <li>🏡 Luxury villa stay</li>
                <li>👨‍🍳 Private chef & guide</li>
              </ul>
              <p><strong>$350</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Private Rainforest Escape', 350, 'https://picsum.photos/400/250?random=317')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- P2 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=318" class="card-img-top" alt="Luxury Lake Lodge">
            <div class="card-body">
              <h5 class="card-title">Luxury Lake Lodge</h5>
              <p>Stay in a lakeside lodge with private boat rides, spa therapies, and fine dining.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 2 nights</li>
                <li>🛥 Private boat tours</li>
                <li>💆 Spa sessions included</li>
              </ul>
              <p><strong>$320</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Luxury Lake Lodge', 320, 'https://picsum.photos/400/250?random=318')">Add to Cart</button>
            </div>
          </div>
        </div>

        <!-- P3 -->
        <div class="col-md-4 mb-4">
          <div class="card package-card">
            <img src="https://picsum.photos/400/250?random=319" class="card-img-top" alt="Eco-Resort Exclusive">
            <div class="card-body">
              <h5 class="card-title">Eco-Resort Exclusive</h5>
              <p>Premium eco-resort with guided safaris, gourmet meals, and private nature tours.</p>
              <ul class="text-left small">
                <li>⏱ Duration: 3 nights</li>
                <li>🚙 Jeep safaris</li>
                <li>🍷 Fine dining included</li>
              </ul>
              <p><strong>$400</strong></p>
              <button class="btn btn-cta" onclick="addPackageToCart('Eco-Resort Exclusive', 400, 'https://picsum.photos/400/250?random=319')">Add to Cart</button>
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
          <li><a href="index.html">Home</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li><a href="themes.html">Themes</a></li>
          <li><a href="services.html">Services</a></li>
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

  <!-- Bootstrap 4 JS + jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/addtocart.js"></script>
</body>
</html>
