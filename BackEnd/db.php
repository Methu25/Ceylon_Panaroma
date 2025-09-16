<?php
// db.php - Database connection for CeylonPanorama

// Database credentials
$servername = "localhost";           // XAMPP default
$username = "root";                  // XAMPP default
$password = "";                      // XAMPP default (blank in XAMPP)
$dbname = "ceylon_panaroma";         // Your database name (all lowercase)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Uncomment the next line to test connection
// echo "Connected to database successfully!";
?>
