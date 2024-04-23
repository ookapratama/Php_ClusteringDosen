<?php
    include 'functions.php'; 
    require('assets/plugins/pdf/html2fpdf.php');
    $rows   = $db->get_row("SELECT * FROM tb_prodi WHERE prodi_id='$_GET[prodi]'");
    ob_start(); 
?>
<!doctype html>
<html>
<head>
<title>Data Hasil Clustering Dosen</title>
<span style="font-size:17px">
    <center><strong>DATA CLUSTERING BIDANG ILMU DOSEN <?=$rows->nama_prodi?></strong></center>
</span>
<span style="font-size:17px">
    <center><strong>UNIVERSITAS DIPA MAKASSAR</strong></center>
</span>
<hr><br>
</head>
<body>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Cluster/Kelas</th>
            <th>Kode</th>
            <th>Nama Dosen</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan Terakhir</th>
            <th>Tempat/Tanggal Lahir</th>
            <th>Agama</th>
        </tr>
    </thead>
    <?php
    $prodi  = $_REQUEST['prodi_id'];
    $rows   = $db->get_results("SELECT * FROM tb_dosen WHERE prodi_id='$_GET[prodi]' AND nama_bidangilmu!='0' ORDER BY nama_bidangilmu ASC");
    $no     = 0;
    foreach($rows as $row): 
    ?>
    <tbody>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->nama_bidangilmu?></td>
            <td><?=$row->kode_dosen?></td>
            <td><?=$row->nama_dosen?></td>
            <td><?=$row->jenis_kelamin?></td>
            <td><?=$row->pendidikan_terakhir?></td>
            <td><?=$row->tempat_lahir.", ".tgl_indo($row->tanggal_lahir)?></td>
            <td><?=$row->agama?></td>
        </tr>
    </tbody>
    <?php endforeach; ?>
</table>
</body>
<?php
// Output-Buffer in variable:
$html=ob_get_contents();
ob_end_clean();
$pdf=new HTML2FPDF('P', 'mm', 'A3');
$pdf->AddPage();
$pdf->WriteHTML($html);
if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])){
    header("Content-type: application/PDF");
} else {
    header("Content-type: application/PDF");
    header("Content-Type: application/pdf");
}
$rows   = $db->get_row("SELECT * FROM tb_prodi WHERE prodi_id='$_GET[prodi]'");
$filename="Data Hasil Pembagian Kelas prodi ".$rows->nama_prodi.".pdf";
$pdf->Output($filename,"D");

?>
</html>