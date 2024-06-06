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
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    background-color: #f0f0f0;
}

.widget-container {
    display: flex;
    gap: 20px;
}

.widget {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.widget h2 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.widget p {
    font-size: 36px;
    margin: 10px 0 0;
    color: #666;
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
            <h1>Selamat Datang Di Dashboard Admin</h1>
            <div class="widget-container">
                <div class="widget" id="user-count">
                    <h2>Users</h2>
                    <p id="user-count-value">0</p>
                </div>
                <div class="widget" id="item-count">
                    <h2>Items</h2>
                    <p id="item-count-value">0</p>
                </div>
                <div class="widget" id="pembelian-count">
                    <h2>Pembelian</h2>
                    <p id="pembelian-count-value">0</p>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
