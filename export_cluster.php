<?php
// Include autoload untuk PHPExcel
require 'vendor/autoload.php';

use PHPExcel_IOFactory;
use PHPExcel_Cell_DataType;
use PHPExcel_Style_Alignment;

// Data dari tab "cluster"
$data = $fcm->keanggotaan; // Ganti ini dengan data yang sesuai dari aplikasi Anda
$ALTERNATIF = $ALTERNATIF; // Ganti ini dengan variabel alternatif yang sesuai
$KRITERIA = $KRITERIA; // Ganti ini dengan variabel kriteria yang sesuai

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set active sheet
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

// Set judul kolom
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nama');
foreach ($KRITERIA as $key => $val) {
   $sheet->setCellValueByColumnAndRow($key + 2, 1, $val['nama']);
}
$sheet->setCellValueByColumnAndRow(count($KRITERIA) + 2, 1, 'Cluster');

// Isi data dari hasil analisis
$row = 2;
foreach ($data as $key => $val) {
   $sheet->setCellValue('A'.$row, $ALTERNATIF[$key]->kode_dosen);
   $sheet->setCellValue('B'.$row, $ALTERNATIF[$key]->nama_dosen);
   foreach ($val as $k => $v) {
       $sheet->setCellValueByColumnAndRow($k + 2, $row, round($v, 3));
   }
   $sheet->setCellValueByColumnAndRow(count($KRITERIA) + 2, $row, $fcm->hasil[$key]);
   $row++;
}

// Set header untuk download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="hasil_cluster.xlsx"');
header('Cache-Control: max-age=0');

// Output file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
