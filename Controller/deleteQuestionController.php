<?php
session_start();
require_once '../model/mydb.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacherlogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        $_SESSION['errors'] = ['Invalid question ID'];
        header("Location: ../controller/ListQuestionsController.php");
        exit;
    }

    $db = new Model();
    $conn = $db->OpenConn();

    $success = $db->deleteQuestion($conn, $id);

    $conn->close();

    if ($success) {
        $_SESSION['success'] = "Question deleted successfully.";
    } else {
        $_SESSION['errors'] = ["Failed to delete question."];
    }

    header("Location: ../controller/ListQuestionsController.php");
    exit;
} else {
    header("Location: ../controller/ListQuestionsController.php");
    exit;
}
