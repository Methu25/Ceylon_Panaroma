<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adventure LK - Products</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <!-- Bootstrap 4 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/products.css">
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">Themes</a>
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
            <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
            <li class="nav-item ml-3">
              <a class="nav-link" href="cart.php">
                <img src="images/cart.png" alt="Cart" width="30" height="30">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Content -->
    <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <h1 class="font-weight-bold">Ceylon Panorama Gallery</h1>
      <p class="lead">Explore the beauty of Sri Lanka through our curated themes</p>
    </div>
  </section>

  <!-- Featured Product Categories -->
  <section class="container" id="explorenow">
    <h2 class="mb-4">🏕 Featured Product Categories</h2>
    <div class="row">
      <div class="col-md-3">
        <div class="category-card">
          <h5>Camping,Hiking & Trekking</h5>
          <p>Tents, sleeping mats & survival tools.</p>
          <a href="#" class="btn btn-cta">Explore now</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="category-card">
          <h5>Outdoor Essentials</h5>
          <p>BBQ grills, gas stoves, and furniture.</p>
          <a href="#" class="btn btn-cta">Explore now</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="category-card">
          <h5>Cultural & Traditional</h5>
          <p>Handicrafts, local arts & clothes.</p>
          <a href="#" class="btn btn-cta">Explore now</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="category-card">
          <h5>Jewelry & accessories</h5>
          <p>traditional & handmade designs.</p>
          <a href="#" class="btn btn-cta">Explore now</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Notable Products for Outdoor Adventures -->
  <section class="container mb-5">
    <h2 class="mb-4">Products for Outdoor Adventures</h2>
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="hiking_backpack.jpg" alt="Hiking Backpack" class="img-fluid mb-2">
          <h6>Hiking Backpack</h6>
          <p>Ergonomic backpack with 40L capacity, hydration compartment included.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Hiking Backpack', 50, 'hiking_backpack.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="mountain_bike.jpg" alt="Mountain Bike" class="img-fluid mb-2">
          <h6>Mountain Bike</h6>
          <p>Durable 21-speed mountain bike for rough terrains and trail adventures.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Mountain Bike', 300, 'mountain_bike.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="kayak.jpg" alt="Inflatable Kayak" class="img-fluid mb-2">
          <h6>Inflatable Kayak</h6>
          <p>Portable 2-person kayak with durable material for rivers and lakes.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Inflatable Kayak', 150, 'kayak.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="hiking_shoes.jpg" alt="Trail Running Shoes" class="img-fluid mb-2">
          <h6>Trail Running Shoes</h6>
          <p>Water-resistant, shock-absorbing shoes for hiking and trail running.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Trail Running Shoes', 80, 'hiking_shoes.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Notable Products: Traditional & Cultural -->
  <section class="container mb-5">
    <h2 class="mb-4">Traditional & Cultural Products</h2>
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="handicraft_basket.jpg" alt="Handicraft Basket" class="img-fluid mb-2">
          <h6>Handicraft Basket</h6>
          <p>Beautifully woven basket made by local artisans, ideal for decor or storage.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Handicraft Basket', 25, 'handicraft_basket.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="traditional_mask.jpg" alt="Traditional Mask" class="img-fluid mb-2">
          <h6>Traditional Mask</h6>
          <p>Colorful mask handcrafted using traditional techniques, perfect for collection.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Traditional Mask', 30, 'traditional_mask.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="local_pottery.jpg" alt="Local Pottery Set" class="img-fluid mb-2">
          <h6>Local Pottery Set</h6>
          <p>Handmade pottery set showcasing local craftsmanship and traditional designs.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Local Pottery Set', 45, 'local_pottery.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="traditional_clothes.jpg" alt="Traditional Attire" class="img-fluid mb-2">
          <h6>Traditional Attire</h6>
          <p>Elegant traditional clothing made from authentic fabrics for cultural events.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Traditional Attire', 60, 'traditional_clothes.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Notable Products: Jewelry & Accessories -->
  <section class="container mb-5">
    <h2 class="mb-4">Jewelry & Accessories</h2>
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="beaded_necklace.jpg" alt="Beaded Necklace" class="img-fluid mb-2">
          <h6>Beaded Necklace</h6>
          <p>Handmade necklace with vibrant beads, perfect for ethnic outfits.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Beaded Necklace', 20, 'beaded_necklace.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="wooden_bracelet.jpg" alt="Wooden Bracelet" class="img-fluid mb-2">
          <h6>Wooden Bracelet</h6>
          <p>Eco-friendly bracelet carved from natural wood, unique and stylish.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Wooden Bracelet', 15, 'wooden_bracelet.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="silver_earrings.jpg" alt="Silver Earrings" class="img-fluid mb-2">
          <h6>Silver Earrings</h6>
          <p>Elegant handmade silver earrings, ideal for both casual and festive wear.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Silver Earrings', 25, 'silver_earrings.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="product-card text-center">
          <img src="handmade_ring.jpg" alt="Handmade Ring" class="img-fluid mb-2">
          <h6>Handmade Ring</h6>
          <p>Intricately designed ring made by local artisans, a true statement piece.</p>
          <a href="#" class="btn btn-cta mt-2" onclick="addProductToCart('Handmade Ring', 18, 'handmade_ring.jpg'); window.location.href='cart.php'">Buy now 🛒</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Shopping Experience -->
  <section class="container">
    <h2 class="mb-4">🛒 Shopping Experience</h2>
    <div class="chat-container" id="chatContainer"></div>
    <div class="input-container">
      <input type="text" id="messageInput" placeholder="Type your message..." />
      <button onclick="sendMessage()">Send</button>
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

  <!-- JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/addtocartproduct.js"></script>
  <script>
    function sendMessage() {
      const input = document.getElementById('messageInput');
      const message = input.value.trim();
      if (message === "") return;

      const messageDiv = document.createElement('div');
      messageDiv.classList.add('message');
      messageDiv.textContent = message;

      const chatContainer = document.getElementById('chatContainer');
      chatContainer.appendChild(messageDiv);
      chatContainer.scrollTop = chatContainer.scrollHeight;

      input.value = "";
      input.focus();
    }

    document.getElementById('messageInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') sendMessage();
    });
  </script>
</body>
</html>