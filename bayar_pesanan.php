<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Placeholder for connecting to a database
$conn = new mysqli('localhost', 'username', 'password', 'database_name');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fetch orders for selection
$result = $conn->query("SELECT id_pesanan, nama_pemesan FROM pesanan");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pesanan = $_POST['id_pesanan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $tanggal_transaksi = date('Y-m-d');

    $sql = "INSERT INTO pembayaran (id_pesanan, metode_pembayaran, tanggal_transaksi) VALUES ('$id_pesanan', '$metode_pembayaran', '$tanggal_transaksi')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pembayaran berhasil ditambahkan'); window.location.href = 'dashboard_pesanan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Pembayaran Pesanan</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="id_pesanan" class="form-label">Pilih Pesanan</label>
                <select name="id_pesanan" class="form-select" required>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?= $row['id_pesanan']; ?>"><?= $row['id_pesanan'] . " - " . $row['nama_pemesan']; ?></option>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <option value="">Tidak ada pesanan</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="form-select" required>
                    <option value="Tunai">Tunai</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
