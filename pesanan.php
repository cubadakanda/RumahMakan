<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';

try {
    $result = mysqli_query($koneksi, "SELECT * FROM pesanan");
    $pesananItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
} catch (Exception $e) {
    echo "Gagal mengambil data pesanan: " . $e->getMessage();
    $pesananItems = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pesanan</title>
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
            padding: 40px;
            background-color: #f7faff;
            min-height: 100vh;
            border-radius: 15px;
            border: 1px solid #d6e0ef;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .table-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            border: 1px solid #dfe7f3;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-bottom: 25px;
            color: #1b62f0; /* Warna utama */
            font-size: 32px;
            font-weight: bold;
            border-bottom: 3px solid #1b62f0; /* Garis bawah */
            padding-bottom: 8px;
            text-align: center;
        }
        h3:hover {
            transform: scale(1.05);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 16px;
            font-size: 15px;
            border-bottom: 1px solid #d9e2ef;
            text-align: center;
        }
        th {
            background-color: #1b62f0;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            background-color: #f4f8fd;
            color: #333;
        }
        td:nth-child(even) {
            background-color: #ebf2fa;
        }
        .table-container th:first-child,
        .table-container td:first-child {
            border-radius: 10px 0 0 10px;
        }
        .table-container th:last-child,
        .table-container td:last-child {
            border-radius: 0 10px 10px 0;
        }
        .table-container tr:hover td {
            background-color: #e0ebf6;
            transition: background-color 0.2s ease-in-out;
        }
        .btn {
            background-color: #1b62f0;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #16325f;
            text-align: center;
        }
        a.btn-info {
            background-color: #17a2b8;
            color: white;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            transition: background-color 0.3s, transform 0.2s;
        }
        a.btn-info:hover {
            background-color: #138496;
            transform: translateY(-2px);
        }
        a.btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            transition: background-color 0.3s, transform 0.2s;
        }
        a.btn-danger:hover {
            background-color: #b02a37;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <h2>Rm.Padang</h2>
        <a href="pesanan.php"><i class="fas fa-receipt"></i> Data Pesanan</a>
        <a href="pembayaran.php"><i class="fas fa-list"></i> Pembayaran</a>
        <a href="daftar_pesanan.php"><i class="fas fa-tachometer-alt"></i> Daftar Pesanan</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="table-container">
        <h3>Data Pesanan</h3>
        <form method="POST" action="tambah_pesanan.php" class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
        </form>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($pesananItems as $pesanan) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($pesanan['id_pesanan']); ?></td>
                    <td><?php echo htmlspecialchars($pesanan['tanggal_pesanan']); ?></td>
                    <td><?php echo htmlspecialchars($pesanan['menu']); ?></td>
                    <td><?php echo htmlspecialchars($pesanan['jumlah']); ?></td>
                    <td><?php echo htmlspecialchars($pesanan['total_harga']); ?></td>
                    <td><?php echo htmlspecialchars($pesanan['status_pembayaran']); ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="ubah_pesanan.php?id=<?php echo $pesanan['id_pesanan']; ?>">Ubah</a>
                        <a class="btn btn-danger btn-sm" href="hapus_pesanan.php?id=<?php echo $pesanan['id_pesanan']; ?>" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a>
                        <a class="btn btn-primary btn-sm" href="pembayaran.php?id=<?php echo $pesanan['id_pesanan']; ?>">Pembayaran</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
