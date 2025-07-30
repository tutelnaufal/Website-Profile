<?php
session_start();
include 'db.php'; // Jika butuh koneksi DB, meskipun tidak digunakan di sini

$username = $_POST['username'];
$password = $_POST['password'];

// Cek login admin (statis, bisa diganti database)
if ($username === 'admin' && $password === 'admin123') {
    $_SESSION['admin'] = true;
    $_SESSION['welcome_admin'] = true;
    header("Location: portfolio/index.php");
    exit();
} else {
    header("Location: login.html?error=1");
    exit();
}
?>
