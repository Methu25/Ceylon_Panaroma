<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

// Get total from query string or POST (from cart)
$total = isset($_GET['total']) ? floatval($_GET['total']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Payment Gateway | Ceylon Panorama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }
        .payment-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .payment-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .instructions, .disclaimer {
            text-align: center;
            margin-bottom: 15px;
        }
        .instructions {
            font-size: 1rem;
            color: #555;
        }
        .disclaimer {
            font-size: 0.85rem;
            color: #777;
        }
        .total-box {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
            color: #222;
        }
        .btn-pay {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #555;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>💳 Secure Checkout</h2>
        <p class="instructions">
            You are one step away from completing your purchase. Please review your total amount before proceeding.
        </p>
        <p class="disclaimer">
            Note: This is a secure, simulated payment gateway for testing purposes only. No real transactions will be processed.
        </p>

        <div class="total-box">
            Total Amount: $<?= number_format($total, 2) ?>
        </div>

        <form method="POST" action="payment_success.php">
            <input type="hidden" name="total" value="<?= number_format($total, 2) ?>">
            <button type="submit" class="btn btn-success btn-pay">Pay Now</button>
        </form>

        <a href="cart.php" class="back-link">← Back to Cart</a>
    </div>
</body>
</html>