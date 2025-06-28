<?php
session_start();
require_once '../model/mydb.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quiz_id = $_POST['quiz_id'] ?? '';
    $question = $_POST['question'] ?? '';
    $option1 = $_POST['option1'] ?? '';
    $option2 = $_POST['option2'] ?? '';
    $option3 = $_POST['option3'] ?? '';
    $option4 = $_POST['option4'] ?? '';
    $correct_option = $_POST['correct_option'] ?? '';

    if (!$quiz_id || !$question || !$option1 || !$option2 || !$option3 || !$option4 || !$correct_option) {
        $errors[] = "All fields are required.";
    }

    if (empty($errors)) {
        $db = new Model();
        $conn = $db->OpenConn();
        $success = $db->insertQuestion($conn, $quiz_id, $question, $option1, $option2, $option3, $option4, $correct_option);

        if ($success) {
            $_SESSION['success'] = "Question added successfully!";
            header("Location: ../view/addquestion.php");
            exit;
        } else {
            $errors[] = "Failed to insert question.";
        }
    }

    $_SESSION['errors'] = $errors;
    header("Location: ../view/addquestion.php");
    exit;
}
