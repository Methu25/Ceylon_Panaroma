<?php
session_start();
include 'db.php';

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    // Redirect to sign-in page
    $redirect = 'product.php';
    header("Location: signin.php?redirect=$redirect");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if product_id is provided
if(!isset($_GET['product_id'])){
    header("Location: product.php");
    exit();
}

$product_id = intval($_GET['product_id']);

// 1️⃣ Get or create cart for this user
$stmt = $conn->prepare("SELECT cart_id FROM carts WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($cart_id);
    $stmt->fetch();
} else {
    // No cart exists → create one
    $stmt_insert = $conn->prepare("INSERT INTO carts (user_id, created_at, updated_at) VALUES (?, NOW(), NOW())");
    $stmt_insert->bind_param("i", $user_id);
    $stmt_insert->execute();
    $cart_id = $stmt_insert->insert_id;
    $stmt_insert->close();
}
$stmt->close();

// 2️⃣ Check if product already in cart_items
$stmt_check = $conn->prepare("SELECT cart_item_id, quantity FROM cart_items WHERE cart_id=? AND item_type='product' AND item_id=?");
$stmt_check->bind_param("ii", $cart_id, $product_id);
$stmt_check->execute();
$stmt_check->store_result();

if($stmt_check->num_rows > 0){
    // Already in cart → increase quantity by 1
    $stmt_check->bind_result($cart_item_id, $quantity);
    $stmt_check->fetch();
    $quantity++;
    $stmt_update = $conn->prepare("UPDATE cart_items SET quantity=?, added_at=NOW() WHERE cart_item_id=?");
    $stmt_update->bind_param("ii", $quantity, $cart_item_id);
    $stmt_update->execute();
    $stmt_update->close();
} else {
    // Not in cart → get product price
    $stmt_price = $conn->prepare("SELECT product_price FROM products WHERE product_id=?");
    $stmt_price->bind_param("i", $product_id);
    $stmt_price->execute();
    $stmt_price->bind_result($price);
    $stmt_price->fetch();
    $stmt_price->close();

    // Insert into cart_items
    $stmt_insert_item = $conn->prepare("INSERT INTO cart_items (cart_id, item_type, item_id, quantity, price, added_at) VALUES (?, 'product', ?, 1, ?, NOW())");
    $stmt_insert_item->bind_param("iid", $cart_id, $product_id, $price);
    $stmt_insert_item->execute();
    $stmt_insert_item->close();
}
$stmt_check->close();

// Redirect to cart page
header("Location: cart.php");
exit();
?>