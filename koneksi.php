<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "rmpadang";

// Membuat koneksi menggunakan mysqli
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Mengecek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
