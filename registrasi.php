<?php
// Sertakan koneksi ke database
include 'db_connection.php';

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $namaLengkap = htmlspecialchars($_POST['namaLengkap']);
    $email = htmlspecialchars($_POST['email']);
    $nomorTelepon = htmlspecialchars($_POST['nomorTelepon']);
    $alamatRumah = htmlspecialchars($_POST['alamatRumah']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Proses upload gambar
    $uploadDir = 'uploads/profiles/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Membuat folder jika belum ada
    }

    $profileImagePath = null; // Default jika tidak ada gambar yang diupload

    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profileImage']['tmp_name'];
        $fileName = $_FILES['profileImage']['name'];
        $fileSize = $_FILES['profileImage']['size'];
        $fileType = $_FILES['profileImage']['type'];
        
        // Tentukan lokasi tujuan penyimpanan gambar
        $destPath = $uploadDir . basename($fileName);

        // Pastikan file yang diupload adalah gambar
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            // Pindahkan file ke direktori yang telah ditentukan
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $profileImagePath = $destPath;
            } else {
                echo "Terjadi kesalahan saat meng-upload gambar.";
                $profileImagePath = null;
            }
        } else {
            echo "File yang di-upload bukan gambar yang valid.";
            $profileImagePath = null;
        }
    }

    // Simpan data ke database (contoh sederhana, tambahkan koneksi sesuai kebutuhan)
    try {
        // Siapkan query untuk memasukkan data ke database
        $stmt = $conn->prepare("INSERT INTO users (nama_lengkap, email, nomor_telepon, alamat_rumah, username, password, profile_image) 
                                VALUES (:namaLengkap, :email, :nomorTelepon, :alamatRumah, :username, :password, :profileImage)");

        // Binding data dari form ke query
        $stmt->bindParam(':namaLengkap', $namaLengkap);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nomorTelepon', $nomorTelepon);
        $stmt->bindParam(':alamatRumah', $alamatRumah);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':profileImage', $profileImagePath);  // Menyimpan path gambar di database

        // Eksekusi query untuk menyimpan data
        $stmt->execute();

        // Menampilkan pesan sukses jika data berhasil disimpan
        $successMessage = "Registrasi berhasil! Silakan lanjut ke login.";
    } catch (PDOException $e) {
        // Tampilkan pesan error jika terjadi masalah
        $errorMessage = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna Baru</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        /* General Styles */
        body {
            font-family: 'Josefin Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('background1.png');
        }

        .container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            border-radius: 10px;
            padding: 40px 30px;
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: black;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #ebe9e9;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1abc9c;
            box-shadow: 0 0 5px rgba(26, 188, 156, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: black;
            border: none;
            border-radius: 5px;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(0, 255, 145);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer a {
            color: rgb(0, 255, 145);
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
            color: black;
        }

        .back-button {
            position: fixed;
            top: 15px;
            left: 15px;
            background-color: white;
            color: black;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: rgb(0, 255, 145);
        }

        .back-button span {
            margin-left: 5px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            h2 {
                font-size: 18px;
            }

            .form-group input {
                font-size: 12px;
                padding: 10px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-button">
            &#8592;<span>Kembali</span>
        </a>
        <h2>Registrasi Pengguna Baru</h2>
        <!-- Pesan sukses atau error jika ada -->
        <?php if (isset($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <form id="registrationForm" action="registrasi.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" id="namaLengkap" name="namaLengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="nomorTelepon">Nomor Telepon</label>
                <input type="tel" id="nomorTelepon" name="nomorTelepon" required>
            </div>
            <div class="form-group">
                <label for="alamatRumah">Alamat Rumah</label>
                <input type="text" id="alamatRumah" name="alamatRumah" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="profileImage">Upload Foto Profil</label>
                <input type="file" id="profileImage" name="profileImage" accept="image/*">
            </div>
            <button type="submit">Registrasi</button>
        </form>
        <div class="form-footer">
            <p style="color:black">Sudah punya akun? GSUHDHJEBFUE <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
