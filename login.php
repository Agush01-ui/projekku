<?php
session_start();
include 'db_connection.php'; // Pastikan untuk menyertakan file koneksi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // SQL untuk mendapatkan data pengguna berdasarkan username
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Jika password cocok, simpan data pengguna di session
            $_SESSION['user'] = $user;
            echo "Login berhasil!";
            header('Location: dashboard.php'); // Arahkan ke dashboard
        } else {
            $error = "Username atau password salah.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
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
            max-width: 400px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: black;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            background-color:  #ebe9e9;
           
            color: black;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1abc9c;
            box-shadow: 0 0 5px rgba(26, 188, 156, 0.5);
        }

        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
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
            background-color:   rgb(0, 255, 145);
        }

        button:disabled {
            background-color: #7f8c8d;
            cursor: not-allowed;
        }

        .login-link {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color:   rgb(0, 255, 145);
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
            color: black;
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

        .back-button {
            position: fixed;
            top: 15px;
            left: 15px;
            background-color: black;
            color: #FFFFFF;
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
            background-color:   rgb(0, 255, 145);
        }

        .back-button span {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
         <!-- Menampilkan error jika login gagal -->
         <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <a href="index.php" class="back-button">
            &#8592;<span>Kembali</span>
        </a>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        <div class="login-link">
            <p style="color:black">Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
