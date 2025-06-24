<?php
session_start();
require_once '../model/mydb.php';

if (!isset($_SESSION['username'])) {
    echo "User not logged in. <a href='../view/login.php'>Login</a>";
    exit();
}

$model = new Model();
$conn = $model->OpenConn();

$username = $_SESSION['username'];
$user = $model->getUserByUsername($conn, $username);

if (!$user) {
    echo "User not found.";
    exit();
}

// Get quizzes
$quizResult = $model->getAllQuizzes($conn);
$quizzes = [];
if ($quizResult) {
    while ($row = $quizResult->fetch_assoc()) {
        $quizzes[] = $row;
    }
}

$conn->close();

// Load dashboard view
include '../view/dashboard.php';
