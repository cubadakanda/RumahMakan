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

// Retrieve current data for the order
$id_pesanan = $_GET['id_pesanan'] ?? null;
if ($id_pesanan) {
    $result = $conn->query("SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
    $pesanan = $result->fetch_assoc();
} else {
    echo "Pesanan tidak ditemukan.";
    exit;
}

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pemesan = $_POST['nama_pemesan'];
    $tanggal_pesanan = $_POST['tanggal_pesanan'];
    $menu_pesanan = $_POST['menu_pesanan'];

    $update_sql = "UPDATE pesanan SET nama_pemesan = '$nama_pemesan', tanggal_pesanan = '$tanggal_pesanan', menu_pesanan = '$menu_pesanan' WHERE id_pesanan = '$id_pesanan'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil diperbarui'); window.location.href = 'dashboard_pesanan.php';</script>";
    } else {
        echo "Error: " . $update_sql . "<br>" . $conn->error;
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
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pesanan</h2>
        <?php if ($pesanan): ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" class="form-control" value="<?= $pesanan['nama_pemesan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
                    <input type="date" name="tanggal_pesanan" class="form-control" value="<?= $pesanan['tanggal_pesanan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="menu_pesanan" class="form-label">Menu Pesanan</label>
                    <input type="text" name="menu_pesanan" class="form-control" value="<?= $pesanan['menu_pesanan']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Pesanan</button>
            </form>
        <?php else: ?>
            <p>Pesanan tidak ditemukan.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
