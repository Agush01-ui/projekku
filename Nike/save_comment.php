<?php
// Konfigurasi database
$host = "localhost";
$username = "root"; // Sesuaikan dengan user database Anda
$password = ""; // Sesuaikan dengan password database Anda
$database = "velosta";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Koneksi ke database gagal: " . $conn->connect_error
    ]));
}

// Ambil data POST dari JavaScript
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
$comment_text = $_POST['comment_text'];

// Validasi input
if (empty($product_id) || empty($rating) || empty($comment_text)) {
    echo json_encode([
        "status" => "error",
        "message" => "Data tidak lengkap!"
    ]);
    exit;
}

// Query untuk menyimpan komentar
$sql = "INSERT INTO tbl_comments (product_id, rating, comment_text) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $product_id, $rating, $comment_text);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Komentar berhasil disimpan!"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal menyimpan komentar: " . $stmt->error
    ]);
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
