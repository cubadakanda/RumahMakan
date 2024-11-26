<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into pelanggan (nama, gender, no_telepon, alamat) values ('$nama','$gender','$no_telepon','$alamat')");
 
// mengalihkan halaman kembali ke index.php
header("location:pelanggan.php");
 
?>