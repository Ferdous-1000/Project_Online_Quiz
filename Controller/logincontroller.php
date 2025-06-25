<?php
session_start();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_quiz");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize errors and old input arrays
$errors = [];
$old = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Save old input to session
    $old['username'] = $username;

    // Validation
    if ($username === '' && $password === '') {
        $errors['general'] = "Please enter username and password.";
    } else {
        if ($username === '') {
            $errors['username'] = "Please enter username.";
        }
        if ($password === '') {
            $errors['password'] = "Please enter password.";
        }
    }

    // If no validation errors, check credentials
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $_SESSION['username'] = $username;
            header("Location: ../controller/DashboardController.php");
            exit();
        } else {
            $errors['general'] = "Invalid username or password.";
        }
    }

    // Save errors and old input and redirect back
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: ../view/login.php");
    exit();
} else {
    header("Location: ../view/login.php");
    exit();
}
?>
