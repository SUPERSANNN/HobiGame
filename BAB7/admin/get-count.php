<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "topup_game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_count = $conn->query("SELECT COUNT(*) AS count FROM tb_user")->fetch_assoc()['count'];
$item_count = $conn->query("SELECT COUNT(*) AS count FROM tb_item")->fetch_assoc()['count'];
$pembelian_count = $conn->query("SELECT COUNT(*) AS count FROM tb_pembelian")->fetch_assoc()['count'];

$conn->close();

echo json_encode([
    'user_count' => $user_count,
    'item_count' => $item_count,
    'pembelian_count' => $pembelian_count
]);
?>
