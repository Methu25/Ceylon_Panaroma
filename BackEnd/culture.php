<?php
session_start();
include 'db.php';

// Fetch all active Culture packages grouped by category
$packagesQuery = $conn->prepare("SELECT * FROM packages WHERE category_type='Culture' AND status=1 ORDER BY FIELD(package_category,'Budget','Mid-Range','Premium')");
$packagesQuery->execute();
$packagesResult = $packagesQuery->get_result();

// Prepare packages by category
$packagesByCategory = [];
while($row = $packagesResult->fetch_assoc()){
    $cat = $row['package_category'];
    $packagesByCategory[$cat][] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ceylon Panorama | Culture Packages</title>
    <link rel="stylesheet" href="css/culture.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <section class="hero d-flex flex-column" style="background-image: url('images/culture-hero-bg.jpg');">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top w-100 px-5">
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold mr-5" href="#">Ceylon Panorama</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto d-flex align-items-center">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Themes</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="nature.php">Nature</a>
                                <a class="dropdown-item" href="adventure.php">Adventure</a>
                                <a class="dropdown-item active" href="culture.php">Culture</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="service.php#hotels">Hotels</a>
                                <a class="dropdown-item" href="service.php#medicare">Medicare</a>
                                <a class="dropdown-item" href="service.php#transport">Transport</a>
                                <a class="dropdown-item" href="service.php#tourguide">Tour Guide</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li class="nav-item"><a class="nav-link" href="#" id="logoutBtn">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                        <?php endif; ?>
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="cart.php">
                                <img src="images/cart.jpg" alt="Cart" width="30" height="30" style="border-radius: 50%;">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center flex-grow-1">
            <h1 class="font-weight-bold">Immerse Yourself in History</h1>
            <p class="lead">Discover Ancient Traditions and Rich Heritage</p>
        </div>
    </section>

    <main>
        <?php foreach($packagesByCategory as $category => $packs): ?>
            <section class="category-section">
                <h2><?= htmlspecialchars($category); ?> Packages</h2>
                <div class="packages-container">
                    <?php foreach($packs as $row): ?>
                        <div class="package-card">
                            <img src="<?= htmlspecialchars($row['package_image']); ?>" alt="<?= htmlspecialchars($row['package_name']); ?>">
                            <h3><?= htmlspecialchars($row['package_name']); ?></h3>
                            <p><?= htmlspecialchars($row['package_description']); ?></p>
                            <p>Price: $<?= number_format($row['package_price'], 2); ?></p>
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <form method="GET" action="AddToCart.php">
                                    <input type="hidden" name="package_id" value="<?= htmlspecialchars($row['package_id']); ?>">
                                    <button type="submit" class="btn-add-cart">Book Now</button>
                                </form>
                            <?php else: ?>
                                <a href="signin.php?redirect=culture.php" class="btn-add-cart">Sign In to Book</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <footer class="footer bg-dark text-light pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="logo">Ceylon Panorama</h2>
                    <p>
                        Explore Sri Lanka's beauty with our curated travel themes and packages.
                        We are dedicated to making your journey unforgettable.
                    </p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f mr-2"></i></a>
                        <a href="#"><i class="fab fa-twitter mr-2"></i></a>
                        <a href="#"><i class="fab fa-instagram mr-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in mr-2"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-light">Home</a></li>
                        <li><a href="gallery.html" class="text-light">Gallery</a></li>
                        <li><a href="themes.html" class="text-light">Themes</a></li>
                        <li><a href="services.html" class="text-light">Services</a></li>
                        <li><a href="contact.html" class="text-light">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h3>Our Services</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Adventure Packages</a></li>
                        <li><a href="#" class="text-light">Cultural Tours</a></li>
                        <li><a href="#" class="text-light">Nature Escapes</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h3>Contact Info</h3>
                    <p><strong>📞 Phone:</strong> +94 71 234 5678</p>
                    <p><strong>📧 Email:</strong> info@ceylonpanorama.com</p>
                    <p><strong>📍 Address:</strong> Colombo, Sri Lanka</p>
                    <p><strong>🕑 Service Hours:</strong><br> We are available <b>24/7</b></p>
                </div>
            </div>

            <div class="footer-bottom text-center py-3 mt-4 border-top">
                <p>© 2025 Ceylon Panorama. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="nature.js"></script>
</body>
</html>