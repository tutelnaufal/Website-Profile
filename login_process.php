<?php
session_start();

// Data login sederhana (bisa diganti dengan validasi dari database)
$valid_user = "admin";
$valid_pass = "admin123";

// Ambil data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Cek login
if ($username === $valid_user && $password === $valid_pass) {
    $_SESSION['admin'] = true;
    header("Location: admin_dashboard.php"); // Ganti ini sesuai halaman admin kamu
    exit;
} else {
    echo "<script>alert('Username atau password salah!'); window.location.href='login.html';</script>";
}
?>
