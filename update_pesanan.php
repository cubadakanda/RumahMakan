<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_pesanan'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $sql = "UPDATE pesanan SET status_pembayaran='$status_pembayaran' WHERE id_pesanan='$id'";
    if (mysqli_query($koneksi, $sql)) {
        header('Location: pesanan.php');
        exit;
    } else {
        echo "Gagal memperbarui status pembayaran: " . mysqli_error($koneksi);
    }
}
?>
