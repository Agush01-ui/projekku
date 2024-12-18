<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['name'];
    $payment_method = $_POST['payment_method'];
    $card_number = $_POST['card_number'];
    $total_price = $_POST['total_price'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO payments (user_name, payment_method, card_number, total_price, size, quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_name, $payment_method, $card_number, $total_price, $size, $quantity]);

    echo json_encode(["status" => "success", "message" => "Pembayaran berhasil disimpan."]);
}
?>
