<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari body JSON
    $data = json_decode(file_get_contents("php://input"), true);
    $id = intval($data['id']);

    // Query hapus berdasarkan ID
    $sql = "DELETE FROM evaluations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data dengan ID $id berhasil dihapus."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menghapus data: " . $conn->error]);
    }
}
?>
