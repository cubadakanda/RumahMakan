<?php
session_start(); // Memulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect ke login.php jika belum login
    exit;
}

// Hubungkan ke database
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
    <title>Dashboard Rumah Makan Padang</title>
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
        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .status {
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
            color: white;
        }
        .status-pending {
            background-color: #f39c12;
        }
        .status-dispatch {
            background-color: #28a745;
        }
        .status-completed {
            background-color: #3498db;
        }
        .btn {
            background-color: #1b62f0;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #1543b2;
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
        <h1>Daftar Menu Rumah Makan Padang</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($menuItems)): ?>
                        <?php foreach ($menuItems as $menu): ?>
                        <tr>
                            <td><?= htmlspecialchars($menu['id']); ?></td>
                            <td><?= htmlspecialchars($menu['nama_menu']); ?></td>
                            <td><?= htmlspecialchars($menu['harga']); ?></td>
                            <td>
                                <?php if (!empty($menu['gambar'])): ?>
                                    <img src="<?= htmlspecialchars($menu['gambar']); ?>" alt="Gambar Menu" style="width:100px; height:auto;">
                                <?php else: ?>
                                    <span>Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="status status-dispatch">Tersedia</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Tidak ada data menu yang tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
