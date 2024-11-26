<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];

// menginput data ke database
mysqli_query($koneksi,"insert into menu (nama_menu, harga) values ('$nama_menu','$harga')");
 
// mengalihkan halaman kembali ke index.php
header("location:menu.php");
 
?>