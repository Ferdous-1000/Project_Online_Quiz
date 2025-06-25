<?php
session_start();
include '../model/mydb.php';

$model = new Model();
$conn = $model->OpenConn();

$quizzes = $model->getAllQuizzes($conn);

include '../view/quiz.php';
