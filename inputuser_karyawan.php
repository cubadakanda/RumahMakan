<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$gender = $_POST['gender'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi,"insert into karyawan (nama, posisi, gender, no_telepon, alamat) values ('$nama','$posisi','$gender','$no_telepon','$alamat')");
 
// mengalihkan halaman kembali ke index.php
header("location:karyawan.php");
 
?>