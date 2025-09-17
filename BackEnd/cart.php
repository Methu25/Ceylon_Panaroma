<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_quantity'])) {
        $cart_item_id = intval($_POST['cart_item_id']);
        $quantity = intval($_POST['quantity']);
        $stmt = $conn->prepare("UPDATE cart_items SET quantity=? WHERE cart_item_id=?");
        $stmt->bind_param("ii", $quantity, $cart_item_id);
        $stmt->execute();
        $stmt->close();
        header("Location: cart.php");
        exit();
    }

    if (isset($_POST['remove_item'])) {
        $cart_item_id = intval($_POST['cart_item_id']);
        $stmt = $conn->prepare("DELETE FROM cart_items WHERE cart_item_id=?");
        $stmt->bind_param("i", $cart_item_id);
        $stmt->execute();
        $stmt->close();
        header("Location: cart.php");
        exit();
    }
}

$stmt_cart = $conn->prepare("SELECT cart_id FROM carts WHERE user_id=?");
$stmt_cart->bind_param("i", $user_id);
$stmt_cart->execute();
$stmt_cart->store_result();
$stmt_cart->bind_result($cart_id);
if ($stmt_cart->num_rows === 0) {
    echo "<p style='
        width: 100%; 
        height: 100vh; 
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        align-items: center; 
        text-align: center; 
        font-size: 2.5rem; 
        font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif; 
        color: #333; 
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        margin: 0;
        padding: 0.5rem;
    '>
        🛒 Your Cart is Empty!<br>
        Add some amazing packages or products and start your adventure.
    </p>";
    exit();
}
$stmt_cart->fetch();
$stmt_cart->close();

$stmt_items = $conn->prepare("
    SELECT ci.cart_item_id, ci.item_type, ci.item_id, ci.quantity, ci.price, 
           p.package_name, p.package_image,
           pr.product_name, pr.product_image
    FROM cart_items ci
    LEFT JOIN packages p ON ci.item_type='package' AND ci.item_id=p.package_id
    LEFT JOIN products pr ON ci.item_type='product' AND ci.item_id=pr.product_id
    WHERE ci.cart_id=?
");
$stmt_items->bind_param("i", $cart_id);
$stmt_items->execute();
$result = $stmt_items->get_result();
$items = $result->fetch_all(MYSQLI_ASSOC);
$stmt_items->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="cart.css">
<style>
body { font-family: "Inter", sans-serif; background-color:#f4f7fc; }
.cart-container { margin-top: 100px; margin-bottom: 50px; }
.cart-card { background: #f6f8faee; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); margin-bottom: 20px; padding:20px; transition: transform 0.2s; }
.cart-card:hover { transform: translateY(-3px); }
.cart-card img { border-radius: 10px; max-width:100px; }
.cart-info { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; }
.cart-details { flex:1 1 200px; padding:10px; }
.cart-actions { text-align: right; }
.quantity-input { width:70px; display:inline-block; margin-right:5px; }
.btn-update { margin-right:5px; }
.btn-remove { background-color:#dc3545; color:#fff; border:none; }
.grand-total { background:#fff; padding:20px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); display:flex; justify-content: space-between; align-items:center; }
@media(max-width:768px){ .cart-info { flex-direction:column; text-align:center; } .cart-actions{ text-align:center; margin-top:10px; } }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="home.php">Ceylon Panorama</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Themes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="nature.php">Nature</a></li>
            <li><a class="dropdown-item" href="adventure.php">Adventure</a></li>
            <li><a class="dropdown-item" href="culture.php">Culture</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="service.php#hotels">Hotels</a></li>
            <li><a class="dropdown-item" href="service.php#medicare">Medicare</a></li>
            <li><a class="dropdown-item" href="service.php#transport">Transport</a></li>
            <li><a class="dropdown-item" href="service.php#tourguide">Tour Guide</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>

        <li class="nav-item ms-3">
          <a class="nav-link" href="cart.php">
            <img src="images/cart.png" alt="Cart" width="28" height="28">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container cart-container">
    <h2 class="mb-4 text-center">🛒 Your Cart</h2>
    <?php if(empty($items)): ?>
        <p class="text-center">Your cart is empty.</p>
    <?php else: ?>
        <?php $grand_total = 0; ?>
        <?php foreach($items as $item): ?>
            <?php
                if ($item['item_type'] === 'package') {
                    $name = $item['package_name'];
                    $img = $item['package_image'];
                } else {
                    $name = $item['product_name'];
                    $img = $item['product_image'];
                }
                $total = $item['price'] * $item['quantity'];
                $grand_total += $total;
            ?>
            <div class="cart-card">
                <div class="cart-info">
                    <div class="cart-details">
                        <h5><?= htmlspecialchars($name) ?></h5>
                        <p>Price: $<?= number_format($item['price'],2) ?></p>
                        <p>Total: $<?= number_format($total,2) ?></p>
                    </div>
                    <div class="cart-details">
                        <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($name) ?>">
                    </div>
                    <div class="cart-actions">
                        <form method="POST" class="mb-2">
                            <input type="hidden" name="cart_item_id" value="<?= $item['cart_item_id'] ?>">
                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control quantity-input">
                            <button type="submit" name="update_quantity" class="btn btn-sm btn-primary btn-update">Update</button>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="cart_item_id" value="<?= $item['cart_item_id'] ?>">
                            <button type="submit" name="remove_item" class="btn btn-sm btn-remove">Remove ❌</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="grand-total">
            <h4>Grand Total: $<?= number_format($grand_total,2) ?></h4>
            <form method="GET" action="FakePayment.php">
                <input type="hidden" name="total" value="<?= $grand_total ?>">
                <button type="submit" class="btn btn-success btn-lg">Proceed to Checkout 💳</button>
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>