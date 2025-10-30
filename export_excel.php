<?php
require 'vendor/autoload.php'; // pastikan path composer benar
include 'db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Cek apakah ada parameter id
if (!isset($_GET['id'])) {
    die("Parameter ID tidak ditemukan.");
}

$id = intval($_GET['id']); // keamanan: ubah ke integer

// Ambil data berdasarkan ID
$query = "SELECT * FROM evaluations WHERE id = $id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    die("Data dengan ID $id tidak ditemukan.");
}

// Ambil satu baris data
$data = $result->fetch_assoc();

// Buat spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Judul kolom
$sheet->setCellValue('A1', 'Nama infrastruktur');
$sheet->setCellValue('B1', 'Lokasi');
$sheet->setCellValue('C1', 'Nilai Kontrak');
$sheet->setCellValue('D1', 'Tahun Mulai');
$sheet->setCellValue('E1', 'Tahun Selesai');

// Isi data hasil query
$sheet->setCellValue('A2', $data['namaInfra']);
$sheet->setCellValue('B2', $data['lokasiInfra']);
$sheet->setCellValue('C2', $data['nilaiKontrak']);
$sheet->setCellValue('D2', $data['tahunMulai']);
$sheet->setCellValue('E2', $data['tahunSelesai']);

// Nama file
$filename = 'Data Evaluasi Keberfungsian Infrastruktur ' . $data['namaInfra'] . ' - ' . date('Y-m-d') . '.xlsx';

// Header agar langsung download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

// Simpan dan kirim ke browser
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
