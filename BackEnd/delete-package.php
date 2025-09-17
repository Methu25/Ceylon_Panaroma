<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: login.php"); exit(); }
if (!isset($_GET['id'])) { header("Location: admin_dashboard.php"); exit(); }
$id = intval($_GET['id']);

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "ceylon_panaroma";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// get image (prepared)
$stmt = $conn->prepare("SELECT package_image FROM packages WHERE package_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
if ($row = $res->fetch_assoc()) {
    if (!empty($row['package_image']) && file_exists($row['package_image'])) unlink($row['package_image']);
}
$stmt->close();

// delete record
$d = $conn->prepare("DELETE FROM packages WHERE package_id = ?");
$d->bind_param("i", $id);
$d->execute();
$d->close();

header("Location: admin_dashboard.php?msg=" . urlencode("Package deleted"));
exit();