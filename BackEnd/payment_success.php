<?php
session_start();
include 'db.php';

// Ensure user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get total from POST
$total = isset($_POST['total']) ? floatval($_POST['total']) : 0;

// Optionally: Insert order into orders table (if you have one)
// $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
// $stmt->bind_param("id", $user_id, $total);
// $stmt->execute();
// $stmt->close();

// Clear user's cart
$stmt = $conn->prepare("DELETE FROM carts WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .success-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .success-container h2 {
            color: #28a745;
        }
        .btn-home {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h2>Payment Successful!</h2>
        <p>Your total payment: <strong>$<?= number_format($total, 2) ?></strong></p>
        <p>Thank you for booking with Ceylon Panorama.</p>
        <a href="home.php" class="btn btn-primary btn-home">Return to Home</a>
    </div>
</body>
</html>
