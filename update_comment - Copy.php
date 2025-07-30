<?php
session_start();
include 'koneksi.php';

$id = $_POST['id'];

if (!isset($_SESSION['user_comments']) || !in_array($id, $_SESSION['user_comments'])) {
    die("Akses ditolak!");
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$stmt = $conn->prepare("UPDATE komentar SET nama=?, email=?, judul=?, isi=? WHERE id=?");
$stmt->bind_param("ssssi", $nama, $email, $judul, $isi, $id);

if ($stmt->execute()) {
    header("Location: portfolio/index.php?status=sukses");
} else {
    echo "Gagal update komentar.";
}
?>
