<?php
session_start(); // Memulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect ke login.php jika belum login
    exit;
}

// Kode index.php Anda di sini (tampilkan halaman utama)
require 'koneksi.php';

// Ambil data dari database
try {
    $result = mysqli_query($koneksi, "SELECT * FROM menu");
    $menuItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Gagal mengambil data menu: " . $e->getMessage();
    $menuItems = []; // Inisialisasi dengan array kosong jika terjadi error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Menu Rumah Makan Padang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #1b62f0;
            height: 100vh;
            position: fixed;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .sidebar a:hover {
            background-color: #1543b2;
            transform: translateX(5px);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .table {
            background-color: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Rm.Padang</h2>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="menu.php"><i class="fas fa-list"></i> Menu</a>
        <a href="pelanggan.php"><i class="fas fa-chart-bar"></i> Data Pelanggan</a>
        <a href="karyawan.php"><i class="fas fa-users"></i> Data Karyawan</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <h1>Selamat Datang Di Rumah Makan Padang!!</h1>
        <div class="table">
            <img src="rumahgadang.jpeg">
        </div>
    </div>
</body>
</html>
