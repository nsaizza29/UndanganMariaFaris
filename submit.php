<?php
include 'config.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $ucapan = $_POST['ucapan'];
    $kehadiran = $_POST['kehadiran'];

    // Pastikan input tidak kosong
    if (!empty($nama) && !empty($ucapan) && !empty($kehadiran)) {
        // Simpan komentar ke database
        $stmt = $conn->prepare("INSERT INTO guestbook (nama, ucapan, kehadiran) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $ucapan, $kehadiran);

        if ($stmt->execute()) {
            // Update jumlah kehadiran
            if ($kehadiran === "Hadir") {
                $conn->query("UPDATE attendance_count SET hadir = hadir + 1");
            } elseif ($kehadiran === "Tidak Hadir") {
                $conn->query("UPDATE attendance_count SET tidak_hadir = tidak_hadir + 1");
            } elseif ($kehadiran === "Masih Ragu") {
                $conn->query("UPDATE attendance_count SET ragu = ragu + 1");
            }

            echo "success"; // Response sukses
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "empty"; // Jika ada field yang kosong
    }
}

$conn->close();
?>
