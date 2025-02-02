<?php
include 'config.php';

$sql = "SELECT * FROM attendance_count LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$data = [
    "hadir" => $row['hadir'],
    "tidak_hadir" => $row['tidak_hadir'],
    "ragu" => $row['ragu']
];

echo json_encode($data); // Kirim data dalam format JSON
$conn->close();
?>
