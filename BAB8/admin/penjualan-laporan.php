<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
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
$html = '
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    h3 {
        margin: 0;
        padding: 0;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
';
$html .= '<center><h3>Data Pembelian</h3></center><hr/><br>';
$html .= '<table width="100%">
            <tr>
                <th>No</th>
                <th>ID Game</th>
                <th>Server</th>
                <th>username</th>
                <th>Nama Item</th>
                <th>Metode Pembayaran</th>
            </tr>';
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $row['game'] . "</td>
                <td>" . $row['server'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['nama_item'] . "</td>
                <td>" . $row['metode'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-pembelian.pdf');
?>
