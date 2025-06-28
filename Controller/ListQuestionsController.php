<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once '../model/mydb.php';

// Check if teacher is logged in
if (!isset($_SESSION['teacher_id'])) {
    header("Location: ../teacherlogin.php");
    exit;
}

$db = new Model();
$conn = $db->OpenConn();

$allQuestions = $db->getAllQuestions($conn);

$conn->close();

// Pass data to view
include '../view/listquestions.php';
