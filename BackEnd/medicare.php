<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] ==='POST')
// Collect POST data
{
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$age = $_POST['age'] ?? '';
$appointment_date = $_POST['appointment_date'] ?? '';
$appointment_time = $_POST['appointment_time'] ?? '';
$service_type = $_POST['service_type'] ?? '';
$insurance_provider = $_POST['insurance_provider'] ?? '';
$additional_notes = $_POST['additional_notes'] ?? '';

// Prepare statement
$stmt = $conn->prepare("INSERT INTO medicare_bookings 
    (full_name, email, phone, gender, age, appointment_date, appointment_time, service_type, insurance_provider, additional_notes) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param(
    "ssssisssss",
    $full_name, $email, $phone, $gender, $age, $appointment_date, $appointment_time, $service_type, $insurance_provider, $additional_notes
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
    <title>Medicare Booking - Ceylon Panorama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="medicare.css">
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
<section class="hero d-flex align-items-center bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="hero-title">Book Your Medicare Appointment</h1>
        <p class="hero-sub">Schedule your consultation or health checkup easily</p>
    </div>
</section>

<!-- Booking Form Section -->
<section class="form-section py-5">
    <div class="container">
        <div class="booking-card mx-auto shadow-lg p-4">
            <h3 class="text-center mb-4">Medicare Booking Form</h3>
            <form id="medicareForm" action="medicare.php" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="gender" required>
                            <option selected disabled>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="age" placeholder="Age" min="0" required>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="appointment_date" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="appointment_time" required>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" name="service_type" required>
                            <option selected disabled>Select Service Type</option>
                            <option>General Checkup</option>
                            <option>Specialist Consultation</option>
                            <option>Lab Test</option>
                            <option>Vaccination</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="insurance_provider" placeholder="Insurance Provider (optional)">
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" name="additional_notes" placeholder="Additional Notes / Symptoms" rows="3"></textarea>
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
<script src="medicare.js"></script>
</body>
</html>