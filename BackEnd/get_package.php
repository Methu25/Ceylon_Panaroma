<?php
// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ceylon_panaroma";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];
    $sql = "SELECT package_id, package_name, package_description, package_price, package_category FROM packages WHERE package_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $package_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }
    $stmt->close();
}
$conn->close();
?>