<?php
include 'functions.php'; 
require('assets/plugins/pdf/html2fpdf.php');

// Start output buffering
ob_start(); 
?>
<!doctype html>
<html>
<head>
    <title>Data Hasil Clustering Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd; /* Light grey border for cells */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Light grey background for header */
            font-weight: bold;
        }
        thead tr {
            border-bottom: 2px solid #000; /* Darker line under header */
        }
        tbody tr {
            border-bottom: 1px solid #ddd; /* Light grey lines between rows */
        }
        tbody tr:last-child {
            border-bottom: none; /* Remove border for last row */
        }
        h2, h3 {
            margin: 0;
            padding: 10px;
            text-align: center;
        }
        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h2>DATA CLUSTERING BIDANG ILMU DOSEN</h2>
    <h3>UNIVERSITAS DIPA MAKASSAR</h3>
    <hr>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nidn</th>
                <th>Nama Dosen</th>
                <th>Cluster</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data without filtering by prodi_id
            $rows = $db->get_results("SELECT * FROM tb_dosen WHERE nama_bidangilmu!='0' ORDER BY nama_bidangilmu ASC");
            foreach ($rows as $row): 
            ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= htmlspecialchars($row->nidn) ?></td>
                <td><?= htmlspecialchars($row->nama_dosen) ?></td>
                <td><?= htmlspecialchars($row->nama_bidangilmu) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Output buffering contents to variable
$html = ob_get_contents();
ob_end_clean();

// Create PDF
$pdf = new HTML2FPDF('P', 'mm', 'A4'); // Changed to A4 for better fit
$pdf->AddPage();
$pdf->WriteHTML($html);

// Set PDF headers
header("Content-Type: application/pdf");
header("Content-Disposition: attachment;filename=\"Data_Hasil_Clustering.pdf\"");
$pdf->Output('Data_Hasil_Clustering.pdf', 'D');
?>