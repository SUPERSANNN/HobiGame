<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    var_dump($nama, $harga, $stok);

    $sql = "INSERT INTO tb_item VALUES(NULL, '$nama', '$harga','$stok')";

    if(empty($nama) || empty($stok)|| empty($harga)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'item-input.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Item Berhasil Ditambahkan');
                window.location = 'item.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'item-input.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE tb_item SET 
            nama_item = '$nama',
            harga_item = '$harga',
            stok = '$stok'
            WHERE id_item = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Item Berhasil Diubah');
                window.location = 'item.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'item-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_item WHERE id_item = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    $sql = "DELETE FROM tb_item WHERE id_item = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Item Berhasil Dihapus');
                window.location = 'item.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Item Gagal Dihapus');
                window.location = 'item.php';
            </script>
        ";
    }
}else {
    header('location: item.php');
}
