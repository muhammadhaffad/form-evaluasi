<?php
include "db.php"; // koneksi MySQL

// ambil JSON dari JS
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No data received"]);
    exit;
}

// ambil value dropdown
$d1 = $data['namaInfra'] ?? null;
$d2 = $data['lokasiInfra'] ?? null;
$d3 = $data['nilaiKontrak'] ?? null;
$d4 = $data['tahunMulai'] ?? null;
$d5 = $data['tahunSelesai'] ?? null;
$d6 = $data['dropdown1'] ?? null;
$d7 = $data['dropdown2'] ?? null;
$d8 = $data['dropdown3'] ?? null;
$d9 = $data['dropdown4'] ?? null;
$d10 = $data['dropdown5'] ?? null;
$d11 = $data['dropdown6'] ?? null;
$d12 = $data['dropdown7'] ?? null;
$d13 = $data['dropdown8'] ?? null;
$d14 = $data['dropdown9'] ?? null;
$d15 = $data['dropdown10'] ?? null;
$d16 = $data['dropdown11'] ?? null;
$d17 = $data['dropdown12'] ?? null;
$d18 = $data['dropdown13'] ?? null;
$d19 = $data['dropdown14'] ?? null;
$d20 = $data['dropdown15'] ?? null;
$d21 = $data['dropdown16'] ?? null;
$d22 = $data['dropdown17'] ?? null;
$d23 = $data['dropdown18'] ?? null;
$d24 = $data['dropdown19'] ?? null;
$d25 = $data['dropdown20'] ?? null;
$d26 = $data['dropdown21'] ?? null;
$d27 = $data['dropdown22'] ?? null;
$d28 = $data['dropdown23'] ?? null;
$d29 = $data['dropdown24'] ?? null;
$d30 = $data['dropdown25'] ?? null;
$d31 = $data['nilaiAkhir'] ?? null;


$stmt = $conn->prepare("INSERT INTO evaluations (namaInfra,lokasiInfra,nilaiKontrak,tahunMulai,tahunSelesai,
evaluasi1_1, evaluasi1_2, evaluasi1_3, evaluasi1_4, evaluasi1_5,
evaluasi2_1, evaluasi2_2, evaluasi2_3, evaluasi2_4,
evaluasi3_1, evaluasi3_2, evaluasi3_3,
evaluasi4_1, evaluasi4_2, evaluasi4_3,
evaluasi5_1, evaluasi5_2, evaluasi5_3, evaluasi5_4,
evaluasi6_1, evaluasi6_2,
evaluasi7_1, evaluasi7_2, evaluasi7_3, evaluasi7_4,
nilaiAkhir) 
VALUES (? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?, ?, ? ,? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssssssssssssssssss", $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10,
$d11,$d12, $d13, $d14, $d15, $d16, $d17, $d18, $d19, $d20,
$d21,$d22, $d23, $d24, $d25, $d26, $d27, $d28, $d29, $d30,
$d31);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data berhasil disimpan!"]);
} else {
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}
