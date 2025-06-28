<?php
session_start();
header('Content-Type: application/json');
require_once '../model/mydb.php';

if (!isset($_SESSION['teacher_id'])) {
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['id'])) {
    echo json_encode(['error' => 'Missing question ID']);
    exit;
}

$question_id = intval($data['id']);

$db = new Model();
$conn = $db->OpenConn();

$deleted = $db->deleteQuestion($conn, $question_id);
$conn->close();

if ($deleted) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Failed to delete question']);
}
