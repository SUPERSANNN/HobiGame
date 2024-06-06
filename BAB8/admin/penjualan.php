<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location: ../LOGIN.php');
}
include '../koneksi.php'; // Pastikan file koneksi ada dan benar

// Query untuk mengambil data pembelian
$query = "
    SELECT 
        tb_pembelian.id_pembelian,
        tb_pembelian.game,
        tb_pembelian.server,
        tb_user.username,
        tb_item.nama_item,
        tb_pembelian.metode
    FROM tb_pembelian
    INNER JOIN tb_user ON tb_pembelian.id_user = tb_user.id_user
    INNER JOIN tb_item ON tb_pembelian.id_item = tb_item.id_item
";
$result = mysqli_query($koneksi, $query);
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
                <button name="logout">Log Out</button>
            </form></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Data Pembelian</h1>
            <a class="input" href="penjualan-input.php">Input Data</a>
            <a class="input" href="penjualan-laporan.php">Buat Laporan</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Game</th>
                        <th>Server</th>
                        <th>username</th>
                        <th>Nama Item</th>
                        <th>Metode Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>{$no}</td>
                            <td>{$row['game']}</td>
                            <td>{$row['server']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['nama_item']}</td>
                            <td>{$row['metode']}</td>
                            <td>
                                <a class='btn-edit' href='penjualan-edit.php?id={$row['id_pembelian']}'>Edit</a> 
                                <a class='btn-hapus' href='penjualan-hapus.php?id={$row['id_pembelian']}'>Hapus</a>
                            </td>
                        </tr>
                        ";
                        $no++;
                    }
                } else {
                    echo "
                    <tr>
                        <td colspan='6'>Tidak ada data.</td>
                    </tr>
                    ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
