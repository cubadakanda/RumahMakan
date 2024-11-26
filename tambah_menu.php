<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #1b62f0;
            height: 100vh;
            position: fixed;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .sidebar a:hover {
            background-color: #1543b2;
            transform: translateX(5px);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #ffffff;
            min-height: 100vh;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .table-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h3 {
            margin-bottom: 30px;
            color: #1b62f0;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
        }
        .table {
            width: 100%;
            border-spacing: 0;
            margin-bottom: 20px;
        }
        .table td {
            padding: 12px;
            vertical-align: middle;
            font-size: 16px;
        }
        .table input[type="text"] {
            width: 100%;
            padding: 14px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #dcdfe6;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }
        .table input[type="text"]:focus {
            border-color: #1b62f0;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 8px rgba(27, 98, 240, 0.3);
        }
        .btn {
            background-color: #1b62f0;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.3s, box-shadow 0.2s;
        }
        .btn:hover {
            background-color: #1543b2;
            box-shadow: 0 4px 12px rgba(21, 67, 178, 0.3);
        }
        .btn:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Rm.Padang</h2>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="menu.php"><i class="fas fa-list"></i> Menu</a>
        <a href="pelanggan.php"><i class="fas fa-chart-bar"></i> Data Pelanggan</a>
        <a href="karyawan.php"><i class="fas fa-users"></i> Data Karyawan</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="table-container">
            <h3>Tambah Data Menu</h3>
            <form method="POST" action="inputuser_menu.php">
                <table class="table">
                <tr>
                    <td>Nama Menu</td>
                    <td><input type="text" name="nama_menu" placeholder="Nama Menu" required></td>
                </tr>
                <tr>            
                    <td>Harga</td>
                    <td><input type="text" name="harga" placeholder="Harga" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="btn">Simpan</button>
                    </td>
                </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
