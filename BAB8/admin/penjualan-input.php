<?php
include '../koneksi.php';

// Ambil data dari tabel tb_item
$itemQuery = "SELECT id_item, nama_item FROM tb_item";
$itemResult = mysqli_query($koneksi, $itemQuery);

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
        <h1>Input Data Pembelian</h1>
        <a class="input" href="penjualan.php">Batal</a>
        <form action="penjualan-proses.php" method="post">
            <div class="form-group">
                <input type="number" id="game" name="game" placeholder="ID Game" required>
            </div>
            <div class="form-group">
                <input type="number" id="server" name="server" placeholder="ID Server" required>
            </div>
            <div class="form-group">
                <select id="topup" name="topup" style="text-align: center;" required>
                    <option value="">--- Pilih Jumlah Top Up ---</option>
                    <?php
                    while ($item = mysqli_fetch_assoc($itemResult)) {
                        echo "<option value='{$item['id_item']}'>{$item['nama_item']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <select id="metode" name="metode" style="text-align: center;" required>
                    <option value="">--- Pilih Metode Pembayaran ---</option>
                    <option value="Indomart">Indomart</option>
                    <option value="Alfamart">Alfamart</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="Pulsa">Pulsa</option>
                </select>
            </div>
            <button type="submit" name="simpan">Kirim</button>
        </form>
        </div>
    </div>
</body>
</html>
