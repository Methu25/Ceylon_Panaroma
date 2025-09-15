<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Redirect to the success page after "payment"
    header('Location: PaymentSuccessfulservices.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border-radius: 15px;
            background-color: #ffffff;
            padding: 40px 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            text-align: center;
        }
        h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #343a40;
        }
        p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .btn-pay {
            font-size: 1rem;
            padding: 12px 30px;
            border-radius: 50px;
            transition: background-color 0.2s;
        }
        .btn-pay:hover {
            background-color: #198754;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="max-width: 450px; width: 100%;">
        <h2>Secure Payment</h2>
        <p>Please click the button below to complete your payment securely.</p>
        <form method="POST">
            <button type="submit" class="btn btn-success btn-pay">Pay Now</button>
        </form>
        <p class="mt-3 text-muted">All transactions are simulated for academic purposes only.</p>
    </div>
</body>
</html>