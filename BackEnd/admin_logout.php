<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to home.php
header("Location: home.php");
exit();
?>