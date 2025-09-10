<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap 4 JS + dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <title>Payment Form</title>
  <link rel="stylesheet" href="css/payment.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
  <!-- Hero Section with Navbar -->
  <section class="hero d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark position-absolute top-0 w-100 px-5">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold me-5" href="#">Ceylon Panorama</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="themes.php" role="button" data-bs-toggle="dropdown">Themes</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="nature.php">Nature</a></li>
                <li><a class="dropdown-item" href="adventure.php">Adventure</a></li>
                <li><a class="dropdown-item" href="culture.php">Culture</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Services</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="hotel.php">Hotels</a></li>
                <li><a class="dropdown-item" href="medicare.php">Medicare</a></li>
                <li><a class="dropdown-item" href="transport.php">Transport</a></li>
                <li><a class="dropdown-item" href="tourguide.php">Tour Guide</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="cart.php"><img src="cart.png" alt="Cart" width="30" height="30"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1">
      <h1 class="fw-bold">Checkout Your Cart</h1>
      <p class="lead">Securely complete your purchase</p>
    </div>
  </section>

  <section class="two">
    <main class="panel" role="main" aria-labelledby="title">
      <div class="heading">
        <h2 id="title" style="margin:0 0 10px;font-size:18px;color:var(--accent)">Payment</h2>
      </div>

      <div class="or-text">Pay using credit card only</div>
      <div class="checkout-box">
        <h2>Checkout</h2>
        <p class="amount">Total Amount: $<span id="totalAmount">0</span></p>

        <form class="form1" method="post" action="checkout.php">
          <!-- Payment Fields -->
          <div class="field">
            <label for="name">Card holder full name</label>
            <input id="name" name="name" class="input" type="text" placeholder="Enter your full name" required />
          </div>
          <div class="field">
            <label for="cardNumber">Card Number</label>
            <input id="cardNumber" name="cardNumber" class="input" type="tel" placeholder="0000 0000 0000 0000" required />
          </div>
          <div class="row">
            <div class="col field">
              <label for="expiry">Expiry / CVV</label>
              <div style="display:flex;gap:10px">
                <input id="expiry" name="expiry" class="input" type="tel" placeholder="MM/YY" required />
                <input id="cvv" name="cvv" class="input" type="tel" placeholder="CVV" style="width:100px" required />
              </div>
            </div>
          </div>

          
          <div class="checkout-wrap">
            <button type="submit" name="confirm" class="confirm">Check Out</button>
            <button type="submit" name="cancel" class="cancel">Cancel</button>
          </div>
        </form>
      </div>
    </main>
  </section>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="footer-container">
      <div class="footer-about">
        <h2 class="logo">Ceylon Panorama</h2>
        <p>We provide the best travel experience in Sri Lanka. Plan your trip with our experts.</p>
        <div class="footer-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <div class="footer-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li><a href="home.html#themes-section">Themes</a></li>
          <li><a href="home.html#services">Services</a></li>
          <li><a href="products.html">Products</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div>

      <div class="footer-info">
        <h3>Information</h3>
        <p><strong>Phone:</strong> +123-234-1234</p>
        <p><strong>Email:</strong> hello@awesomesite.com</p>
        <p><strong>Address:</strong> 99 Roving St, Big City, PKU 23456</p>
        <p><strong>Opening Hours:</strong><br><span class="open-24">Open 24 Hours / 7 Days</span></p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>Copyright © 2023 Ceylon Panorama | All Rights Reserved | Design by R</p>
    </div>
  </footer>

  <script>
    
    function displayTotalAmount() {
      let products = JSON.parse(localStorage.getItem("productsCart")) || [];
      let prodTotal = 0;
      products.forEach((item) => {
        prodTotal += item.price * item.qty;
      });
      document.getElementById("totalAmount").innerText = prodTotal.toFixed(2);
    }
    
    window.onload = displayTotalAmount;
  </script>
</body>
</html>