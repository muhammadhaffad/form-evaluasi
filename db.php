<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "evaluasi2"; // ganti sesuai nama database kamu

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $conn = new PDO($dsn, $user, $pass);
    // Set error mode agar PDO menampilkan exception jika terjadi error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi berhasil!"; // optional untuk testing
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
