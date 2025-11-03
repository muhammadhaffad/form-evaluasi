<?php
require_once 'db.php';
$data = json_decode(file_get_contents('php://input'), true);
try {
    $stmt = $conn->prepare('delete from infrastruktur where id = :infrastruktur_id');
    $stmt->execute(['infrastruktur_id' => $data['id']]);
    http_response_code(200);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
exit();
?>
