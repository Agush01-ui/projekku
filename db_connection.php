<?php
$servername = "localhost";
$username = "root";         // Username default untuk XAMPP atau MySQL
$password = "";             // Password default untuk XAMPP atau MySQL
$dbname = "velosta";        // Nama database yang sudah Anda buat di phpMyAdmin

try {
    // Membuat koneksi ke database menggunakan PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
