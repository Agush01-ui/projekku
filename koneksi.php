<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=velosta", "root", ""); // Ganti 'velosta' dengan nama database Anda
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
