<?php
require_once '../model/mydb.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $db = new Model();
    $conn = $db->OpenConn();
    $question = $db->getQuestionById($conn, $id);
    $conn->close();

    if ($question) {
        echo json_encode($question);
    } else {
        echo json_encode(['error' => 'Question not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
