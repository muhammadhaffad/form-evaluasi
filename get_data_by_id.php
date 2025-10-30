<?php
include 'db.php';

// Ambil id dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM evaluations WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

// Kirim hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
