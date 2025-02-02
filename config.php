<?php
$host = "localhost";  // Sesuaikan jika database ada di server lain
$user = "root";       // Username MySQL (default: root)
$pass = "";           // Password MySQL (kosong jika localhost)
$dbname = "guestbook_db";  // Nama database yang telah dibuat

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>