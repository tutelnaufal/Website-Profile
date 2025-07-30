<?php

include 'db.php';

$sql = "SELECT * FROM komentar ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $comment_id = $row['id'];
    $is_owner = isset($_SESSION['komentar_ids']) && in_array($comment_id, $_SESSION['komentar_ids']);
    $is_admin = isset($_SESSION['admin']);

    echo "<div style='border: 1px solid #ccc; border-radius: 8px; padding: 15px; margin-bottom: 15px; background-color: #f9f9f9;'>";
    echo "<h3 style='margin: 0 0 10px;'>" . htmlspecialchars($row['judul']) . "</h3>";
    echo "<p style='margin: 0 0 5px; color: #666; font-size: 14px;'>" . htmlspecialchars($row['nama']) . " (" . htmlspecialchars($row['email']) . ")</p>";
    echo "<p style='margin: 10px 0;'>" . nl2br(htmlspecialchars($row['isi'])) . "</p>";

    // Tampilkan tombol edit & delete jika admin atau pemilik komentar
    if ($is_admin || $is_owner) {
        echo "<div style='margin-top: 10px;'>";
        echo "<a href='edit_comment.php?id=" . $comment_id . "' style='margin-right: 10px; color: #fff; background-color: #f0ad4e; padding: 6px 10px; text-decoration: none; border-radius: 4px;'>Edit</a>";
        echo "<a href='delete_comment.php?id=" . $comment_id . "' onclick='return confirm(\"Yakin ingin menghapus komentar ini?\")' style='color: #fff; background-color: #d9534f; padding: 6px 10px; text-decoration: none; border-radius: 4px;'>Delete</a>";
        echo "</div>";
    }

    echo "</div>";
}
?>
