<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ceylon Panorama | Nature Packages</title>
    <link rel="stylesheet" href="nature.css">
</head>
<body>
   
    <header class="top-banner" style="background-image: url('images/C-Roll.jpg');">
        <nav>
            <a href="home.php">🏠 Home</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="cart.php">🛒 Cart</a>
                <a href="#" id="logoutBtn">Logout</a>
            <?php else: ?>
                <a href="signin.php">Sign In</a>
            <?php endif; ?>
        </nav>
        <div class="banner-overlay">
            <h1>Explore Nature in Sri Lanka</h1>
            <p>Adventure, scenery, and tranquility all in one</p>
        </div>
    </header>

    <main>
        <?php foreach($packagesByCategory as $category => $packs): ?>
            <section class="category-section">
                <h2><?= htmlspecialchars($category); ?> Packages</h2>
                <div class="packages-container">
                    <?php foreach($packs as $row): ?>
                        <div class="package-card">
                            <img src="<?= $row['package_image']; ?>" alt="<?= htmlspecialchars($row['package_name']); ?>">
                            <h3><?= htmlspecialchars($row['package_name']); ?></h3>
                            <p><?= htmlspecialchars($row['package_description']); ?></p>
                            <p>Price: $<?= number_format($row['package_price'], 2); ?></p>
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <form method="GET" action="AddToCart.php">
                                    <input type="hidden" name="package_id" value="<?= $row['package_id']; ?>">
                                    <button type="submit" class="btn-add-cart">Book Now</button>
                                </form>
                            <?php else: ?>
                                <a href="signin.php?redirect=nature.php" class="btn-add-cart">Sign In to Book</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> Ceylon Panorama. All rights reserved.</p>
    </footer>

    <script src="nature.js"></script>
</body>
</html>
