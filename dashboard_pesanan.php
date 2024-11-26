<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Data dummy untuk contoh
$pesanan = [
    ['id_pesanan' => 1, 'tanggal_pesanan' => '2024-11-14', 'menu' => 'Rendang', 'jumlah' => 2, 'total_harga' => 100000, 'status_pembayaran' => 'Belum Dibayar'],
    ['id_pesanan' => 2, 'tanggal_pesanan' => '2024-11-15', 'menu' => 'Ayam Pop', 'jumlah' => 1, 'total_harga' => 50000, 'status_pembayaran' => 'Sudah Dibayar'],
];

// Fungsi untuk menampilkan semua pesanan
function tampilPesanan($pesanan) {
    foreach ($pesanan as $item) {
        echo "<tr>
                <td>{$item['id_pesanan']}</td>
                <td>{$item['tanggal_pesanan']}</td>
                <td>{$item['menu']}</td>
                <td>{$item['jumlah']}</td>
                <td>Rp " . number_format($item['total_harga'], 0, ',', '.') . "</td>
                <td>{$item['status_pembayaran']}</td>
                <td>
                    <a href='edit_pesanan.php?id={$item['id_pesanan']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_pesanan.php?id={$item['id_pesanan']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pesanan ini?\")'>Hapus</a>";
        if ($item['status_pembayaran'] === 'Belum Dibayar') {
            echo " <a href='bayar_pesanan.php?id={$item['id_pesanan']}' class='btn btn-primary btn-sm'>Bayar</a>";
        }
        echo "</td>
            </tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard Pesanan</h1>
        <a href="tambah_pesanan.php" class="btn btn-success mb-3">Tambah Pesanan Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
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
                <?php tampilPesanan($pesanan); ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
