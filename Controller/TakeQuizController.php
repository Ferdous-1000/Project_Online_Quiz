
<?php
session_start();
require_once("../model/mydb.php");

$model = new Model();
$conn = $model->OpenConn();

$quizId = $_GET['quiz_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quizId = $_POST['quiz_id'];
    $username = $_SESSION['username'];
    $questions = $model->getQuestionsByQuizId($conn, $quizId);
    $score = 0;

    foreach ($questions as $index => $row) {
        $qid = $row['id'];
        $correct = $row['correct_option'];
        $selected = $_POST["answer_$qid"] ?? 0;

        if ($selected == $correct) {
            $score++;
        }
    }

    $model->saveQuizResult($conn, $username, $quizId, $score);
    header("Location: ../view/quiz_result.php?score=$score&quiz_id=$quizId");
    exit();
} else {
    if (!$quizId) {
        echo "Invalid Quiz ID.";
        exit();
    }

    $quiz = $model->getQuizById($conn, $quizId);
    $questions = $model->getQuestionsByQuizId($conn, $quizId);
    include("../view/take_quiz.php");
}
