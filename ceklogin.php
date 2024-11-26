<?php
session_start();
require 'koneksi.php'; // Ganti dengan koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk memeriksa username dan password di database
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php'); // Redirect ke halaman utama
        exit;
    } else {
        $_SESSION['error'] = "Username atau password salah.";
        header('Location: login.php'); // Redirect kembali ke halaman login
        exit;
    }
}
?>
