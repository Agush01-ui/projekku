<?php
session_start();
require 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Jika tidak login, arahkan ke halaman login
    exit();
}

// Ambil data pengguna dari session
$user_id = $_SESSION['user']['id'];

// Ambil data pengguna dari database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Proses Update atau Simpan Profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $alamat_rumah = $_POST['alamat_rumah'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $profile_image = $user['profile_image']; // Simpan gambar lama jika tidak ada yang baru

    // Cek jika ada gambar baru yang di-upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileName = $_FILES['profile_image']['name'];
        $fileType = $_FILES['profile_image']['type'];
        
        // Tentukan lokasi penyimpanan
        $uploadDir = 'uploads/profiles/';
        $destPath = $uploadDir . basename($fileName);

        // Pastikan file adalah gambar
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            // Pindahkan file
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $profile_image = $destPath; // Update path gambar profil
            }
        }
    }

    // Update data pengguna di database
    $stmt = $conn->prepare("UPDATE users SET nama_lengkap = :nama_lengkap, email = :email, alamat_rumah = :alamat_rumah, nomor_telepon = :nomor_telepon, profile_image = :profile_image WHERE id = :id");
    $stmt->bindParam(':nama_lengkap', $nama_lengkap);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':alamat_rumah', $alamat_rumah);
    $stmt->bindParam(':nomor_telepon', $nomor_telepon);
    $stmt->bindParam(':profile_image', $profile_image);
    $stmt->bindParam(':id', $user_id);

    if ($stmt->execute()) {
        $_SESSION['user']['nama_lengkap'] = $nama_lengkap; // Perbarui data di session
        $action = isset($_POST['update']) ? 'update' : 'save';
        header("Location: profil.php?success=$action");
        exit();
    } else {
        $error = "Gagal memproses profil.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    /* General Styles */
    body {
        font-family: 'Josefin Sans', sans-serif;
        background-color: #000; /* Latar belakang hitam */
        color: #fff; /* Teks putih */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        width: 90%;
        max-width: 500px; /* Maksimal ukuran 500px */
        background-color: #121212; /* Abu-abu gelap */
        padding: 30px; /* Padding yang proporsional */
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    h2 {
        font-size: 28px; /* Ukuran lebih kecil agar pas */
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
        margin-bottom: 20px;
        border-bottom: 2px solid #fff;
        display: inline-block;
        padding-bottom: 5px;
    }

    .user-info {
        text-align: left;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .user-info div {
        margin-bottom: 15px;
        padding: 8px 10px;
        background-color: #1c1c1c;
        border-radius: 5px;
    }

    .user-info label {
        font-weight: bold;
        color: #bbb; /* Teks abu-abu terang */
    }

    .user-info span {
        font-size: 14px;
        color: #fff;
    }

    input {
        width: 100%;
        padding: 10px; /* Padding lebih kecil */
        font-size: 14px; /* Ukuran teks lebih kecil */
        color: #fff;
        border: 2px solid #333;
        background-color: #1c1c1c;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    input:focus {
        border-color: #fff;
        outline: none;
    }

    button,
    .delete-btn,
    .back-button {
        display: inline-block;
        width: auto;
        padding: 10px 20px; /* Ukuran tombol lebih kecil */
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        margin-top: 15px;
        cursor: pointer;
    }

    button {
        background-color: #fff;
        color: #000;
    }

    button:hover {
        background-color: #1abc9c; /* Hijau Adidas */
        color: #fff;
    }

    .delete-btn {
        background-color: #e74c3c;
        color: #fff;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }

    .back-button {
        background-color: #555;
        color: #fff;
    }

    .back-button:hover {
        background-color: #333;
    }

    img {
        border-radius: 50%;
        width: 100px; /* Ukuran gambar lebih kecil */
        height: 100px;
        object-fit: cover;
        border: 2px solid #fff;
        margin-bottom: 15px;
    }

    form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 15px; /* Spasi antar field lebih kecil */
        text-align: left;
    }

    .form-group label {
        font-size: 12px; /* Ukuran label lebih kecil */
        color: #bbb;
        margin-bottom: 5px;
        display: block;
        text-transform: uppercase;
    }

    .success-message {
        color: #1abc9c;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .error-message {
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>


</head>
<body>

<div class="container">
    <h2>Profil Pengguna</h2>

    <!-- Pesan Sukses atau Error -->
    <?php if (isset($_GET['success'])): ?>
        <?php if ($_GET['success'] === 'update'): ?>
            <p class="success-message">Profil berhasil diperbarui!</p>
        <?php elseif ($_GET['success'] === 'save'): ?>
            <p class="success-message">Profil berhasil disimpan!</p>
        <?php endif; ?>
    <?php elseif (isset($error)): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Menampilkan Gambar Profil -->
    <div class="user-info">
    <!-- Menampilkan Gambar Profil -->
    <div style="text-align: center;"> <!-- Pusatkan gambar -->
        <?php if ($user['profile_image']): ?>
            <img src="<?php echo $user['profile_image']; ?>" alt="Foto Profil" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
        <?php else: ?>
            <p>Foto profil belum di-upload.</p>
        <?php endif; ?>
    </div>
    <div><label>Nama Lengkap:</label> <span><?php echo htmlspecialchars($user['nama_lengkap']); ?></span></div>
    <div><label>Email:</label> <span><?php echo htmlspecialchars($user['email']); ?></span></div>
    <div><label>Alamat:</label> <span><?php echo htmlspecialchars($user['alamat_rumah']); ?></span></div>
    <div><label>Nomor Telepon:</label> <span><?php echo htmlspecialchars($user['nomor_telepon']); ?></span></div>
</div>


    <!-- Form Update Profil -->
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>" required></div>
        <div class="form-group"><label>Email</label><input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required></div>
        <div class="form-group"><label>Alamat</label><input type="text" name="alamat_rumah" value="<?php echo htmlspecialchars($user['alamat_rumah']); ?>" required></div>
        <div class="form-group"><label>Nomor Telepon</label><input type="text" name="nomor_telepon" value="<?php echo htmlspecialchars($user['nomor_telepon']); ?>" required></div>
        
        <!-- Form untuk Upload Foto Profil -->
        <div class="form-group">
            <label>Ganti Foto Profil</label>
            <input type="file" name="profile_image" accept="image/*">
        </div>

        <div style="text-align: center;">
            <button type="submit" name="update">Update Profil</button>
            <button type="submit" name="save" style="margin-left: 10px;">Simpan Profil</button>
        </div>
    </form>

    <!-- Tombol Hapus Profil -->
    <a href="profil.php?delete=true" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus profil ini?');">Hapus Profil</a>

    <!-- Tombol Kembali ke Dashboard -->
    <a href="dashboard.php" class="back-button">Kembali ke Dashboard</a>
</div>

</body>
</html>
