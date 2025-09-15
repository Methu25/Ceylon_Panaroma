<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ceylon_panaroma";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_GET['product_id'];
$sql = "SELECT product_name, product_description, product_price, product_category, product_id FROM products WHERE product_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($product);

$stmt->close();
$conn->close();
?>