<?php
include 'db.php';
session_start();

$nama = $_POST['nama'];
$email = $_POST['email'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

$sql = "INSERT INTO komentar (nama, email, judul, isi) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nama, $email, $judul, $isi);
$stmt->execute();

// Simpan ID komentar ke dalam session agar bisa diedit oleh pengunjung
$comment_id = $stmt->insert_id;
if (!isset($_SESSION['komentar_ids'])) {
    $_SESSION['komentar_ids'] = [];
}
$_SESSION['komentar_ids'][] = $comment_id;

$stmt->close();
$conn->close();

// Redirect kembali ke halaman index.php
header("Location: portfolio/index.php?status=sukses");
exit();
?>
