<?php
include 'db.php'; // your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect POST data safely
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $vehicle = $_POST['vehicle'] ?? '';
    $passengers = $_POST['passengers'] ?? '';
    $pickup = $_POST['pickup'] ?? '';
    $drop = $_POST['drop_location'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $special = $_POST['special_requests'] ?? '';

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO transport_bookings 
        (full_name, email, vehicle, passengers, pickup, drop_location, date, time, budget, special_requests)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssissssss",
        $full_name, $email, $vehicle, $passengers, $pickup, $drop, $date, $time, $budget, $special
    );

    if ($stmt->execute()) {
        header("Location: fakepaymentservices.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Booking - Ceylon Panorama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="transport.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Ceylon Panorama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="hero-title">Book Your Ride</h1>
            <p class="hero-sub">Tuk-tuks, cabs, or buses — travel across Sri Lanka with comfort</p>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="form-section">
        <div class="container">
            <div class="booking-card mx-auto shadow-lg">
                <h3 class="text-center mb-4">Transport Booking Form</h3>
                <form id="transportForm" action="transport.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="full_name" placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="vehicle" name="vehicle" required>
                                <option selected disabled>Select Vehicle</option>
                                <option value="Bus">Bus</option>
                                <option value="Cab">Cab</option>
                                <option value="Tuk-Tuk">Tuk-Tuk</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="passengers" name="passengers" placeholder="Passengers" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="pickup" name="pickup" placeholder="Pickup Location" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="drop" name="drop_location" placeholder="Drop Location" required>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="budget" name="budget" required>
                                <option selected disabled>Select Budget</option>
                                <option value="Budget">Budget</option>
                                <option value="Mid-range">Mid-range</option>
                                <option value="Luxurious">Luxurious</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="special" name="special_requests" placeholder="Special Requests">
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3 bg-light mt-5">
        © 2025 Ceylon Panorama. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="transport.js"></script>
</body>
</html>