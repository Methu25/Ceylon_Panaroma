<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get user's cart
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
    font-size: 3rem; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
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

// Get items in cart
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
<link rel="stylesheet" href="css/cart.css">
</head>
<body>
<div class="container my-5">
    <h2>🛒 Your Cart</h2>
    <?php if(empty($items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grand_total = 0;
                foreach($items as $item):
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
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><img src="<?= htmlspecialchars($img) ?>" width="80"></td>
                    <td>$<?= number_format($item['price'],2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= number_format($total,2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Grand Total: $<?= number_format($grand_total,2) ?></h4>
        <form method="GET" action="FakePayment.php">
            <input type="hidden" name="total" value="<?= $grand_total ?>">
            <button type="submit" class="btn btn-success">Proceed to Checkout</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
