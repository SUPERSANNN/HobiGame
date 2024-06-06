<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location: ../LOGIN.php');
    exit;
}

if (!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'penjualan.php';
      </script>
    ";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM tb_pembelian WHERE id_pembelian = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

$itemQuery = "SELECT id_item, nama_item FROM tb_item";
$itemResult = mysqli_query($koneksi, $itemQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Item</title>
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
                <li>
                    <form action="../logout.php" method="post">
                        <button class="log" name="logout">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Edit Data Pembelian</h1>
            <a class="input" href="penjualan.php">Batal</a>
            <form action="penjualan-proses.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($data['id_pembelian']) ?>">
                <div class="form-group">
                    <input type="number" id="game" name="game" placeholder="ID Game" value="<?= htmlspecialchars($data['game']) ?>" required>
                </div>
                <div class="form-group">
                    <input type="number" id="server" name="server" placeholder="ID Server" value="<?= htmlspecialchars($data['server']) ?>" required>
                </div>
                <div class="form-group">
                    <select id="topup" name="topup" style="text-align: center;" required>
                        <option value="">--- Pilih Jumlah Top Up ---</option>
                        <?php
                        while ($item = mysqli_fetch_assoc($itemResult)) {
                            $selected = $item['id_item'] == $data['id_item'] ? 'selected' : '';
                            echo "<option value='{$item['id_item']}' $selected>{$item['nama_item']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select id="metode" name="metode" style="text-align: center;" required>
                        <option value="">--- Pilih Metode Pembayaran ---</option>
                        <option value="Indomart" <?= $data['metode'] == 'Indomart' ? 'selected' : '' ?>>Indomart</option>
                        <option value="Alfamart" <?= $data['metode'] == 'Alfamart' ? 'selected' : '' ?>>Alfamart</option>
                        <option value="Transfer Bank" <?= $data['metode'] == 'Transfer Bank' ? 'selected' : '' ?>>Transfer Bank</option>
                        <option value="Pulsa" <?= $data['metode'] == 'Pulsa' ? 'selected' : '' ?>>Pulsa</option>
                    </select>
                </div>
                <button type="submit" name="edit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>
