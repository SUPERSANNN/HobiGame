<?php
session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $game = $_POST['game'];
    $server = $_POST['server'];
    $id_user = $_SESSION['id_user'];
    $id_pembelian = $_POST['topup'];
    $metode = $_POST['metode'];

    $sql = "INSERT INTO tb_pembelian VALUES(null, '$game','$server','$id_user', '$id_pembelian', '$metode')";

    if (empty($game) || empty($server) || empty($id_user) ||  empty($id_pembelian) || empty($metode)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'penjualan-input.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Transaction Berhasil');
                window.location = 'penjualan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'penjualan-input.php';
            </script>
        ";
    }
}elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $game = $_POST['game'];
    $server = $_POST['server'];
    $id_user = $_SESSION['id_user'];
    $id_pembelian = $_POST['topup'];
    $metode = $_POST['metode'];

    if (empty($game) || empty($server) || empty($id_user) || empty($id_pembelian) || empty($metode)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'penjualan-edit.php?id=$id';
            </script>
        ";
    } else {
        $sql = "UPDATE tb_pembelian SET game = '$game', server = '$server', id_user = '$id_user', id_pembelian = '$id_pembelian', metode = '$metode' WHERE id_pembelian = '$id'";
        
        if (mysqli_query($koneksi, $sql)) {
            echo "
                <script>
                    alert('Transaction Berhasil');
                    window.location = 'penjualan.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan');
                    window.location = 'penjualan-edit.php?id=$id';
                </script>
            ";
        }
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_pembelian WHERE id_pembelian = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    $sql = "DELETE FROM tb_pembelian WHERE id_pembelian = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Item Berhasil Dihapus');
                window.location = 'penjualan.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Item Gagal Dihapus');
                window.location = 'penjualan.php';
            </script>
        ";
    }
} else {
    header('location: ../HOME.php');
}
