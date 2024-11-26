<?php
session_start();

// Cek apakah form login telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Autentikasi sederhana (ganti dengan validasi database jika diperlukan)
    if ($username === 'admin' && $password === '123') {
        $_SESSION['loggedin'] = true;
        header('Location: index.php'); // Redirect ke halaman utama untuk admin
        exit;
    } elseif ($username === 'pelayan' && $password === '123') {
        $_SESSION['loggedin'] = true;
        header('Location: pesanan.php'); // Redirect ke dashboard pesanan untuk pelayan
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1b62f0, #6c5ce7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .login-container {
            display: flex;
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            width: 100%;
        }
        .illustration {
            background: linear-gradient(135deg, #5e54e7, #4e44c4);
            width: 50%;
            padding: 40px;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }
        .illustration img {
            width: 100%;
            max-width: 350px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .login-form {
            width: 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form h2 {
            color: #5e54e7;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-control:focus {
            border-color: #5e54e7;
            box-shadow: 0 0 0 0.2rem rgba(94, 84, 231, 0.25);
        }
        .btn-primary {
            background-color: #5e54e7;
            border: none;
            padding: 10px;
            border-radius: 30px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #463a94;
        }
        .form-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .form-text a {
            color: #5e54e7;
            text-decoration: none;
        }
        .form-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="illustration">
            <img src="rumah_gadang.jpeg" alt="Illustration">
            <p>Rumah Gadang Minang Kabau.</p>
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?= $error; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="form-text">
                    <a href="#">Lupa password?</a><br>
                    <a href="#">Buat Akun Baru</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
