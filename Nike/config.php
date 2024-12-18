<?php
$host = 'localhost';
$db = 'velosta';
$user = 'root'; // Ubah sesuai konfigurasi Anda
$pass = ''; // Ubah sesuai konfigurasi Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
