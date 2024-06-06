<?php
include '../koneksi.php';
$id = $_GET['id'];
if(!isset($_GET['id'])) {
  echo "
    <script>
      alert('Tidak ada ID yang Terdeteksi');
      window.location = 'item.php';
    </script>
  ";
}

$sql = "SELECT * FROM tb_item WHERE id_item = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

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
                <button name="logout">Log Out</button>
            </form></li>
            </ul>
        </div>
        <div class="main-content">
        <h1>Edit Data Item</h1>
        <a class="input" href="item.php">Batal</a>
        <form action="item-proses.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id_item'] ?>">
            <div class="form-group">
                <label for="nama">Nama Item:</label>
                <input type="text" id="nama" name="nama" value="<?= $data['nama_item']?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" value="<?= $data['harga_item']?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" value="<?= $data['stok']?>" required>
            </div>
            <button type="submit" name="edit">Tambah Data</button>
        </form>
        </div>
    </div>
</body>
</html>
