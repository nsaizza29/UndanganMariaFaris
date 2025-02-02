<?php
include 'config.php';

// Load daftar komentar
$sql = "SELECT * FROM guestbook ORDER BY created_at DESC";
$result = $conn->query($sql);
$comments = "";

while ($row = $result->fetch_assoc()) {
    $comments .= "<div class='comment'>
                    <strong>{$row['nama']}</strong>
                    <p>{$row['ucapan']}</p>
                    <span class='comment-date'>{$row['created_at']}</span>
                  </div>";
}

// Load jumlah kehadiran
$sql2 = "SELECT * FROM attendance_count LIMIT 1";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$data = [
    "comments" => $comments,
    "hadir" => $row2['hadir'],
    "tidak_hadir" => $row2['tidak_hadir'],
    "ragu" => $row2['ragu']
];

echo json_encode($data);
$conn->close();
?>
