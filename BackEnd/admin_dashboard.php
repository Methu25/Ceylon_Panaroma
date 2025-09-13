<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
   
}

// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ceylon_panaroma";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for adding packages
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_package'])) {
    $admin_id = $_SESSION['admin_id'];
    $package_name = $_POST['package_name'];
    $package_description = $_POST['package_description'];
    $package_price = $_POST['package_price'];
    $package_category = $_POST['package_category'];
    $category_type = $_POST['category_type']; // make sure this is coming from the form
    $package_image = $_FILES['package_image']['name'];

    // Handle image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($package_image);
    move_uploaded_file($_FILES['package_image']['tmp_name'], $target_file);

    $sql = "INSERT INTO packages 
    (admin_id, package_name, package_description, package_price, package_category, category_type, package_image, status, created_at, updated_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW())"; // status=1 for active packages

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "issdsss", 
        $admin_id, 
        $package_name, 
        $package_description, 
        $package_price, 
        $package_category, 
        $category_type, 
        $target_file
    );

    if ($stmt->execute()) {
        $add_message = "Package added successfully!";
    } else {
        $add_message = "Error adding package: " . $conn->error;
    }
    $stmt->close();
}


// Handle form submission for updating packages
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_package'])) {
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $package_description = $_POST['package_description'];
    $package_price = $_POST['package_price'];
    $package_category = $_POST['package_category'];
    $category_type = $_POST['category_type']; // new column
    $package_image = $_FILES['package_image']['name'];

    // Handle image upload if provided
    if ($package_image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($package_image);
        move_uploaded_file($_FILES['package_image']['tmp_name'], $target_file);

        $sql = "UPDATE packages 
                SET package_name=?, package_description=?, package_price=?, package_category=?, category_type=?, package_image=?, status=1, updated_at=NOW() 
                WHERE package_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssdsssi", 
            $package_name, 
            $package_description, 
            $package_price, 
            $package_category, 
            $category_type, 
            $target_file, 
            $package_id
        );
    } else {
        $sql = "UPDATE packages 
                SET package_name=?, package_description=?, package_price=?, package_category=?, category_type=?, status=1, updated_at=NOW() 
                WHERE package_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssdssi", 
            $package_name, 
            $package_description, 
            $package_price, 
            $package_category, 
            $category_type, 
            $package_id
        );
    }
    
    if ($stmt->execute()) {
        $update_message = "Package updated successfully!";
    } else {
        $update_message = "Error updating package: " . $conn->error;
    }
    $stmt->close();
}


// Handle package deletion
if (isset($_GET['delete_package'])) {
    $package_id = $_GET['delete_package'];
    $sql = "DELETE FROM packages WHERE package_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $package_id);
    
    if ($stmt->execute()) {
        $delete_message = "Package deleted successfully!";
    } else {
        $delete_message = "Error deleting package: " . $conn->error;
    }
    $stmt->close();
}

// Fetch all packages for display
$sql = "SELECT * FROM packages";
$packages_result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ceylon Panorama</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin_dashboard.css" rel="stylesheet">
  
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top w-100 px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Ceylon Panorama Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="home.php">Home</a>
                            <a class="dropdown-item" href="gallery.php">Gallery</a>
                            <a class="dropdown-item" href="nature.php">Nature</a>
                            <a class="dropdown-item" href="adventure.php">Adventure</a>
                            <a class="dropdown-item" href="culture.php">Culture</a>
                            <a class="dropdown-item" href="products.php">Products</a>
                            <a class="dropdown-item" href="service.php">Services</a>
                            <a class="dropdown-item" href="contact.php">Contact</a>
                            <a class="dropdown-item" href="cart.php">Cart</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="packagesDropdown" data-toggle="dropdown">Packages</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#add-package">Add Package</a>
                            <a class="dropdown-item" href="#update-package">Update Package</a>
                            <a class="dropdown-item" href="#view-packages">View/Delete Packages</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <div class="container mx-auto p-6 mt-5 pt-5">
        <h1 class="text-3xl font-bold mb-6 text-center">Admin Dashboard</h1>

        <?php 
        if (!empty($add_message)) { ?>
            <div class="message-box bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                <?php echo $add_message; ?>
            </div>
        <?php } 
        if (!empty($update_message)) { ?>
            <div class="message-box bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                <?php echo $update_message; ?>
            </div>
        <?php } 
        if (!empty($delete_message)) { ?>
            <div class="message-box bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                <?php echo $delete_message; ?>
            </div>
        <?php } ?>

        <!-- Add Package Form -->
        <div id="add-package" class="bg-white p-6 rounded shadow-md mb-6">
            <h2 class="text-2xl font-semibold mb-4">Add New Package</h2>
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label for="package_name" class="block text-sm font-medium">Package Name</label>
                    <input type="text" name="package_name" id="package_name" required class="mt-1 block w-full border rounded p-2">
                </div>
                <div>
                    <label for="package_description" class="block text-sm font-medium">Description</label>
                    <textarea name="package_description" id="package_description" class="mt-1 block w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label for="package_price" class="block text-sm font-medium">Price</label>
                    <input type="number" step="0.01" name="package_price" id="package_price" required class="mt-1 block w-full border rounded p-2">
                </div>
                  <label for="package_category" class="block text-sm font-medium">Price Category</label>
                    <select name="package_category" id="package_category" required>
                        <option value="Budget">Budget</option>
                        <option value="Mid-Range">Mid-Range</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div>
                    <label for="category_type" class="block text-sm font-medium">Category</label>
                    <select name="category_type" id="category_type" required class="mt-1 block w-full border rounded p-2">
                        <option value="nature">Nature</option>
                        <option value="adventure">Adventure</option>
                        <option value="culture">Culture</option>
                    </select>
                </div>
                <div>
  
                <div>
                    <label for="package_image" class="block text-sm font-medium">Image</label>
                    <input type="file" name="package_image" id="package_image" accept="image/*" class="mt-1 block w-full">
                </div>
                <button type="submit" name="add_package" class="btn btn-cta px-4 py-2 rounded">Add Package</button>
            </form>
        </div>

        <!-- Update Package Form -->
        <div id="update-package" class="bg-white p-6 rounded shadow-md mb-6">
            <h2 class="text-2xl font-semibold mb-4">Update Package</h2>
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label for="package_id" class="block text-sm font-medium">Select Package</label>
                    <select name="package_id" id="package_id" required class="mt-1 block w-full border rounded p-2" onchange="loadPackageDetails(this.value)">
                        <option value="">Select a package</option>
                        <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT package_id, package_name FROM packages";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['package_id']}'>{$row['package_name']}</option>";
                        }
                        $conn->close();
                        ?>
                    </select>
                </div>
                <div>
                    <label for="update_package_name" class="block text-sm font-medium">Package Name</label>
                    <input type="text" name="package_name" id="update_package_name" required class="mt-1 block w-full border rounded p-2">
                </div>
                <div>
                    <label for="update_package_description" class="block text-sm font-medium">Description</label>
                    <textarea name="package_description" id="update_package_description" class="mt-1 block w-full border rounded p-2"></textarea>
                </div>
                <div>
                    <label for="update_package_price" class="block text-sm font-medium">Price</label>
                    <input type="number" step="0.01" name="package_price" id="update_package_price" required class="mt-1 block w-full border rounded p-2">
                </div>
                </div>
                  <label for="update_package_category" class="block text-sm font-medium">Price Category</label>
                    <select name="update_package_category" id="update_package_category" required>
                        <option value="Budget">Budget</option>
                        <option value="Mid-Range">Mid-Range</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div>
                    <label for="update_category_type" class="block text-sm font-medium">Category</label>
                    <select name="category_type" id="update_category_type" required class="mt-1 block w-full border rounded p-2">
                        <option value="nature">Nature</option>
                        <option value="adventure">Adventure</option>
                        <option value="culture">Culture</option>
                    </select>
                </div>
                <div>
                    <label for="update_package_image" class="block text-sm font-medium">Image (optional)</label>
                    <input type="file" name="package_image" id="update_package_image" accept="image/*" class="mt-1 block w-full">
                </div>
                <button type="submit" name="update_package" class="btn btn-cta px-4 py-2 rounded">Update Package</button>
            </form>
        </div>

        <!-- Display Packages -->
        <div id="view-packages" class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4">All Packages</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Description</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Category</th>
                        <th class="py-2">Image</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $packages_result->fetch_assoc()) { ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $row['package_id']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['package_name']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['package_description']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['package_price']; ?></td>
                            <td class="border px-4 py-2"><?php echo $row['package_category']; ?></td>
                            <td class="border px-4 py-2">
                                <?php if ($row['package_image']) { ?>
                                    <img src="<?php echo $row['package_image']; ?>" alt="Package Image" class="w-20 h-20 object-cover">
                                <?php } ?>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="#update-package" class="text-blue-500 hover:underline" onclick="loadPackageDetails(<?php echo $row['package_id']; ?>)">Edit</a>
                                <a href="?delete_package=<?php echo $row['package_id']; ?>" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure you want to delete this package?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 4 JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadPackageDetails(packageId) {
            if (!packageId) return;
            $.ajax({
                url: 'get_package_details.php',
                type: 'GET',
                data: { package_id: packageId },
                success: function(response) {
                    const data = JSON.parse(response);
                    $('#update_package_name').val(data.package_name);
                    $('#update_package_description').val(data.package_description);
                    $('#update_package_price').val(data.package_price);
                    $('#update_package_category').val(data.package_category);
                    $('#package_id').val(data.package_id);
                },
                error: function() {
                    alert('Error loading package details.');
                }
            });
        }
    </script>
</body>
</html>