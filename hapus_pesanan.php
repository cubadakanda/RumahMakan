<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM pesanan WHERE id_pesanan='$id'";
if (mysqli_query($koneksi, $sql)) {
    header('Location: pesanan.php');
    exit;
} else {
    echo "Gagal menghapus data pesanan: " . mysqli_error($koneksi);
}
?>
