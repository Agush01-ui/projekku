<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Jika tidak login, arahkan ke halaman login
    exit();
}

// Fitur Logout
if (isset($_GET['logout'])) {
    // Menghancurkan sesi dan logout
    session_destroy();
    header('Location: login.php'); // Arahkan kembali ke halaman login setelah logout
    exit();
}

$user = $_SESSION['user']; // Ambil data pengguna dari session
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* General Styles */
    body {
        font-family: 'Josefin Sans', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #000; /* Latar belakang hitam */
        color: #fff; /* Teks putih */
        display: flex;
        justify-content: center; /* Pusatkan secara horizontal */
        align-items: center; /* Pusatkan secara vertikal */
        height: 100vh;
        text-align: center;
    }

    .dashboard-container {
        background-color: #111; /* Hitam pekat */
        padding: 40px;
        border-radius: 20px;
        width: 70%; /* Lebar dashboard */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); /* Bayangan lembut */
    }

    header {
        background-color: transparent;
        color: #fff;
        margin-bottom: 30px;
    }

    header h1 {
        font-size: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .user-info {
        font-size: 1rem;
        margin-top: 5px;
        color: #aaa; /* Abu-abu terang */
    }

    .cards-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        background-color: #222; /* Hitam abu-abu */
        padding: 20px;
        border-radius: 10px;
        width: 30%;
        text-align: center;
        transition: transform 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
    }

    .card:hover {
        transform: translateY(-10px);
        background-color: #1abc9c; /* Hijau terang khas Adidas */
        color: #000; /* Teks hitam */
    }

    .card i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #fff; /* Ikon putih */
        transition: color 0.3s ease;
    }

    .card:hover i {
        color: #000; /* Ikon hitam saat hover */
    }

    .card h3 {
        margin: 10px 0;
        font-size: 1.5rem;
        text-transform: uppercase;
    }

    .card p {
        font-size: 0.9rem;
        color: #aaa; /* Teks abu-abu terang */
    }

    /* Tombol */
    .logout-btn, .back-btn {
        padding: 12px 24px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        text-transform: uppercase;
        margin-top: 20px;
        letter-spacing: 1px;
    }

    .logout-btn {
        background-color: #e74c3c; /* Merah */
        color: #fff;
        border: 1px solid #e74c3c;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #fff;
        color: #e74c3c;
    }

    .back-btn {
        background-color: #1abc9c; /* Hijau */
        color: #000;
        border: 1px solid #1abc9c;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #fff;
        color: #1abc9c;
    }

    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .card {
            width: 45%;
        }

        .dashboard-container {
            width: 90%;
        }
    }

    @media (max-width: 480px) {
        .card {
            width: 100%;
        }
    }
</style>


</head>
<body>
    <header>
        <h1>Selamat Datang di Dashboard</h1>
        <p class="user-info">Hi, <?php echo htmlspecialchars($user['nama_lengkap']); ?>! Anda berhasil login.</p>
    </header>

    <div class="container">
        <div class="cards-container">
            <!-- Card Profil -->
            <div class="card" onclick="window.location='profil.php'">
                <i class="fas fa-user-circle"></i>
                <h3>Profil Pengguna</h3>
                <p>Update profil Anda dan informasi pribadi lainnya.</p>
            </div>

        <div class="button-container">
            <!-- Tombol Kembali ke Halaman Utama -->
            <a href="index.php" class="back-btn">
                Kembali ke Halaman Utama
            </a>

            <!-- Logout Button (Ditempatkan di bawah) -->
            <a href="dashboard.php?logout=true" class="logout-btn" onclick="return confirm('Apakah Anda yakin ingin logout?');">Logout</a>
        </div>
    </div>
</body>
</html>
