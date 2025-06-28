<?php
session_start();
require_once '../model/mydb.php';

$errors = [];
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Input validation
if (empty($username)) {
    $errors['username'] = 'Username is required';
}
if (empty($password)) {
    $errors['password'] = 'Password is required';
} elseif (!str_starts_with($password, 'AAA') || strlen($password) < 8) {
    $errors['password'] = 'Password must start with "AAA" and be at least 8 characters';
}

// If validation fails
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header('Location: ../view/teacherlogin.php');
    exit;
}

// DB query
$db = new Model();
$conn = $db->OpenConn();
$teacher = $db->getTeacherByUsername($conn, $username);

if ($teacher) {
    if ($password === $teacher['password']) { // Plain text check
        $_SESSION['teacher_id'] = $teacher['id'];
        $_SESSION['teacher_username'] = $teacher['username'];
        header('Location: ../view/teacherdashboard.php');
        exit;
    } else {
        $errors['general'] = 'Incorrect password';
    }
} else {
    $errors['general'] = 'Username not found';
}

// Save and redirect
$_SESSION['errors'] = $errors;
$_SESSION['old'] = $_POST;
header('Location: ../view/teacherlogin.php');
exit;
