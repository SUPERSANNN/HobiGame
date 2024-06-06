<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location: ../LOGIN.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel dengan Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .main-content .input{
        color: #fff;
        padding: 10px;
        margin: 10px 0;
        text-decoration: none;
        background-color: #1758a1;
        border-radius: 5px;
    }
    form{
        margin-top: 20px;
    }
    .form-group{
        font-size: 20px;
    }
    .form-group input{
        width: 100%;
        height: 20px;
        margin-bottom: 10px;
    }
    form button{
        font-size: 15px;
        background-color: #00ff37;
        border: none;
        border-radius: 5px;
        padding: 8px;
        color: #fff;
    }
    .log{
        background-color: transparent;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Top Up</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="Item.php">Item</a></li>
                <li><a href="penjualan.php">Pembelian</a></li>
                <li><form action="../logout.php" method="post">
                <button class="log" name="logout">Log Out</button>
            </form></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Input Data Item</h1>
            <a class="input" href="item.php">Batal</a>
            <form action="item-proses.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama Item:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" required>
                </div>
                <button class="simpan" type="submit" name="simpan">Tambah Data</button>
            </form>
        </div>
    </div>
</body>
</html>
