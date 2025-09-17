<?php
session_start();
include 'db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Simple validation
    if(empty($username)) $errors[] = "Username required";
    if(empty($password)) $errors[] = "Password required";
    if(empty($full_name)) $errors[] = "Full Name required";
    if(empty($email)) $errors[] = "Email required";

    // Check if username already exists
    $stmt = $conn->prepare("SELECT admin_id FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) $errors[] = "Username already taken";
    $stmt->close();

    // If no errors, insert admin
    if(empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admins (username, password, full_name, email, phone_number, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $username, $hashed_password, $full_name, $email, $phone);
        if($stmt->execute()){
            $_SESSION['admin_id'] = $stmt->insert_id;
            header("Location: admin_dashboard.php"); // Or some landing page
            exit();
        } else {
            $errors[] = "Failed to create admin account.";
        }
        $stmt->close();
    }
}
?>
<?php
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'home.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="adminsignup.css">
</head>
<body>
<div class="signup-box">
    <h2>Admin Signup</h2>
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul><?php foreach($errors as $error) echo "<li>$error</li>"; ?></ul>
        </div>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" class="form-control" required>
        <input type="password" name="password" placeholder="Password" class="form-control" required>
        <input type="text" name="full_name" placeholder="Full Name" class="form-control" required>
        <input type="email" name="email" placeholder="Email" class="form-control" required>
        <input type="text" name="phone" placeholder="Phone Number" class="form-control">
        <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
</body>
</html>
