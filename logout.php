<?php
session_start(); // Memulai sesi

// Menghapus semua data sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Redirect ke halaman login setelah logout
header('Location: login.php');
exit;
?>
