<?php
//include koneksi database
include('koneksi.php');

//get data dari form
$id = $_POST['id'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE menu SET nama_menu = '$nama_menu', harga = '$harga' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: menu.php");
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
    <title>Update Menu</title>
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
        <h2>Update Data Menu</h2>
        <form action="update_menu.php" method="post">
            <label for="id">ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly>

            <label for="nama_menu">Nama Menu:</label>
            <input type="text" name="nama_menu" value="<?php echo $nama_menu; ?>">

            <label for="harga">Harga:</label>
            <input type="text" name="harga" value="<?php echo $harga; ?>">

            <div class="button-container">
                <button type="submit" class="btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
