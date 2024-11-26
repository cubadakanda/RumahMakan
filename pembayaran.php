<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Styling serupa dengan halaman sebelumnya */
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
            padding: 40px;
            background-color: #f7faff;
            min-height: 100vh;
            border-radius: 15px;
            border: 1px solid #d6e0ef;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #1b62f0;
            font-size: 32px;
            font-weight: bold;
            border-bottom: 3px solid #1b62f0;
            padding-bottom: 8px;
            text-align: center;
        }
        h3:hover {
            transform: scale(1.05);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
        }
        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-top: 15px;
        }
        input[type="text"], input[type="date"], input[type="number"], select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #d9e2ef;
            border-radius: 8px;
            font-size: 15px;
            color: #333;
            background-color: #f4f8fd;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        input[type="text"]:focus, input[type="date"]:focus, input[type="number"]:focus, select:focus {
            border-color: #1b62f0;
            outline: none;
            box-shadow: 0 0 8px rgba(27, 98, 240, 0.2);
        }
        .btn {
            background-color: #1b62f0;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #16325f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 16px;
            font-size: 15px;
            border-bottom: 1px solid #d9e2ef;
            text-align: center;
        }
        th {
            background-color: #1b62f0;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            background-color: #f4f8fd;
            color: #333;
        }
        td:nth-child(even) {
            background-color: #ebf2fa;
        }
        .table-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            border: 1px solid #dfe7f3;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <h2>Rm.Padang</h2>
        <a href="pesanan.php"><i class="fas fa-receipt"></i> Data Pesanan</a>
        <a href="pembayaran.php"><i class="fas fa-list"></i> Pembayaran</a>
        <a href="daftar_pesanan.php"><i class="fas fa-receipt"></i> Daftar Pesanan</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="form-container">
            <h3>Pembayaran</h3>
            <form method="POST" action="">
                <label>ID Pesanan:</label>
                <input type="text" name="id_pesanan" required>

                <label>Tanggal Pembayaran:</label>
                <input type="date" name="tanggal_pembayaran" required>

                <label>Metode Pembayaran:</label>
                <select name="metode_pembayaran" required>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="E-Wallet">E-Wallet</option>
                </select>

                <label>Total Bayar:</label>
                <input type="number" name="total_bayar" required>

                <label>Status Pembayaran:</label>
                <select name="status_pembayaran" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>

                <button type="submit" class="btn">Bayar</button>
            </form>
        </div>
    </div>
</body>
</html>
