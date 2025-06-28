<?php
session_start();
require_once '../model/mydb.php';

$db = new Model();
$conn = $db->OpenConn();

// ----------- GET Request: Show Edit Form -------------
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        $_SESSION['errors'] = ["Missing question ID."];
        header("Location: ListQuestionsController.php");
        exit;
    }

    $question = $db->getQuestionById($conn, $id);

    if (!$question) {
        $_SESSION['errors'] = ["Question not found."];
        header("Location: ListQuestionsController.php");
        exit;
    }

    $_SESSION['edit_question'] = $question;
    header("Location: ../view/updatequestion.php");
    exit;
}

// ----------- POST Request: Handle Form Submission -------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id             = $_POST['id'] ?? null;
    $quiz_id        = $_POST['quiz_id'] ?? '';
    $question_text  = $_POST['question'] ?? '';
    $option1        = $_POST['option1'] ?? '';
    $option2        = $_POST['option2'] ?? '';
    $option3        = $_POST['option3'] ?? '';
    $option4        = $_POST['option4'] ?? '';
    $correct_option = $_POST['correct_option'] ?? '';

    $errors = [];

    if (!$quiz_id || !$question_text || !$option1 || !$option2 || !$option3 || !$option4 || !$correct_option) {
        $errors[] = "All fields are required.";
    }

    if (empty($errors)) {
        $updated = $db->updateQuestion($conn, $id, $quiz_id, $question_text, $option1, $option2, $option3, $option4, $correct_option);
        if ($updated) {
            $_SESSION['success'] = "Question updated successfully!";
            header("Location: ListQuestionsController.php");
            exit;
        } else {
            $errors[] = "Update failed. Please try again.";
        }
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: ../view/updatequestion.php");
    exit;
}
