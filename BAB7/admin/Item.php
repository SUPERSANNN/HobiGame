<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location: ../LOGIN.php');
}
include '../koneksi.php'; // Pastikan file koneksi ada dan benar

// Memeriksa apakah koneksi berhasil
if ($koneksi === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Menjalankan kueri
$sql = "SELECT * FROM tb_item";
$result = mysqli_query($koneksi, $sql);
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
            <h1>Data Item</h1>
            <a class="input" href="item-input.php">Tambah Data</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
			    if (mysqli_num_rows($result) == 0) {
                    echo "
                    <tr>
                        <td colspan='4' align='center'>Data Kosong</td>
                    </tr>
                    ";
                } else {
                    $i = 1; // Inisialisasi counter
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>{$i}</td>
                            <td>{$data['nama_item']}</td>
                            <td>{$data['harga_item']}</td>
                            <td>{$data['stok']}</td>
                            <td>
                                <a class='btn-edit' href='item-edit.php?id={$data['id_item']}'>Edit</a> 
                                <a class='btn-hapus' href='item-hapus.php?id={$data['id_item']}'>Hapus</a>
                            </td>
                        </tr>
                        ";
                        $i++; // Inkrementasi counter
                    }
                }
			    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
