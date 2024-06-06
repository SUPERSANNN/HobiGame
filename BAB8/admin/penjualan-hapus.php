<?php
include '../koneksi.php';
$id = $_GET['id'];
if(!isset($_GET['id'])) {
  echo "
    <script>
      alert('Tidak ada ID yang Terdeteksi');
      window.location = 'penjualan.php';
    </script>
  ";
}

$sql = "SELECT * FROM tb_pembelian WHERE id_pembelian = '$id'";
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
        <h1>Hapus Data Pembelian</h1>
        <div>
            <h4>Ingin Menghapus Data ?</h4>
            <form action="penjualan-proses.php" method="post" >

              <input type="hidden" name="id" value="<?= $data['id_pembelian'] ?>">
              <button type="submit" class="btn-yes" name="hapus">Yes</button>
	          <button class="simpan" type="submit" class="btn-no" name="tidak">No</button>
            </form>
        </div>
        </div>
    </div>
</body>
</html>
