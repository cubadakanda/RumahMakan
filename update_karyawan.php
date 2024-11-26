<?php
//include koneksi database
include('koneksi.php');

//get data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$gender = $_POST['gender'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE karyawan SET nama = '$nama', posisi = '$posisi', gender = '$gender', no_telepon = '$no_telepon', alamat = '$alamat' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: karyawan.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #004080;
            text-align: center;
        }
        label {
            color: #004080;
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            background-color: #004080;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Data Pelanggan</h2>
        <form action="update_pelanggan.php" method="post">
            <label for="id">ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $nama; ?>">
            
            <label for="posisi">Posisi:</label>
            <input type="text" name="posisi" value="<?php echo $posisi; ?>">

            <label for="gender">Gender:</label>
            <input type="text" name="gender" value="<?php echo $gender; ?>">

            <label for="no_telepon">No. Telepon:</label>
            <input type="text" name="no_telepon" value="<?php echo $no_telepon; ?>">

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $alamat; ?>">

            <div class="button-container">
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
