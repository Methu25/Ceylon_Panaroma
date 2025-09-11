<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ceylon Panorama | Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/cart.css">
   
</head>
<body onload="clearCart()">

  <!-- Cart Top Bar -->
  <div class="cart-header">
    <a href="home.html">🏠 Home</a>
    <h4>🛒 Your Cart</h4>
    <a href="home.php" onclick="window.close();">❌ Close</a>
  </div>

  <!-- Tour Packages Cart -->
  <div class="cart-section">
    <h3>Tour Packages</h3>
    <div id="packagesCart"></div>
    <div class="total-box">Total: $<span id="packageTotal">0</span></div>
    <button href="" class="btn-buy mt-2" onclick="buyPackages()">Buy Now</button>
  </div>

  <!-- Products Cart -->
  <div class="cart-section">
    <h3>Products</h3>
    <div id="productsCart"></div>
    <div class="total-box">Total: $<span id="productTotal">0</span></div>
    <button class="btn-buy mt-2" onclick="buyProducts()">Buy Now</button>
  </div>

<script src="js/cart.js"></script>
</body>
</html>