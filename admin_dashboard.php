<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Admin</title>
</head>
<body>
  <h2>Selamat datang, Admin!</h2>
  <a href="logout.php">Logout</a>
</body>
</html>
