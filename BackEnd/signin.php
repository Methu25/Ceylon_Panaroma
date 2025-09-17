<?php
session_start();
include 'db.php';


$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'home.php';



$errors = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type']; // 'user' or 'admin'
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($type === 'user') {
        $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE username=?");
    } else {
        $stmt = $conn->prepare("SELECT admin_id, password FROM admins WHERE username=?");
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if ($type === 'user') {
                $_SESSION['user_id'] = $row['user_id'];
                header("Location: home.php");
            } else {
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: admin_dashboard.php");
            }
            exit();
        } else {
            $errors = "Incorrect password!";
        }
    } else {
        $errors = "Username not found!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign In | Ceylon Panorama</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="auth.css">
<script>
function toggleForm(type) {
    if(type === 'user'){
        document.getElementById('userForm').style.display = 'block';
        document.getElementById('adminForm').style.display = 'none';
    } else {
        document.getElementById('userForm').style.display = 'none';
        document.getElementById('adminForm').style.display = 'block';
    }
}
</script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Sign In</h2>
    <?php if($errors): ?>
        <div class="alert alert-danger"><?= $errors ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-outline-primary me-2" onclick="toggleForm('user')">User</button>
        <button class="btn btn-outline-secondary" onclick="toggleForm('admin')">Admin</button>
    </div>

    <!-- User Form -->
    <form id="userForm" action="" method="POST" style="display:none;">
        <input type="hidden" name="type" value="user">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-2">
            <a href="signup.php?redirect=<?= urlencode($redirect) ?>" class="link-primary">Create account</a>
        </div>
        <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">

        <button type="submit" class="btn btn-primary w-100">Sign In as User</button>
    </form>

    <!-- Admin Form -->
    <form id="adminForm" action="" method="POST" style="display:none;">
        <input type="hidden" name="type" value="admin">
        <div class="mb-3">
            <label>Admin Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-2">
            <a href="admin_signup.php?redirect=<?= urlencode($redirect) ?>" class="link-primary">Create admin account</a>
        </div>
         <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">
        <button type="submit" class="btn btn-secondary w-100">Sign In as Admin</button>
    </form>
</div>

<script>
window.onload = function() {
    // Default show User form
    toggleForm('user');
}
</script>
</body>
</html>
