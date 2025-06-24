<?php
// controller/TakeQuizController.php

session_start();

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_quiz");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['quiz_id'])) {
        $quiz_id = intval($_GET['quiz_id']);

        // Prepare statement to fetch quiz details securely
        $stmt = mysqli_prepare($conn, "SELECT * FROM quizzes WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $quiz_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $quiz = mysqli_fetch_assoc($result);

            // Pass quiz data to view
            require_once __DIR__ . '/../view/take_quiz_view.php';
        } else {
            echo "<h3 style='color:red;'>Quiz not found.</h3>";
            echo "<h3><a href='../controller/DashboardController.php'>Go Back to Dashboard</a></h3>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<h3 style='color:red;'>No quiz selected.</h3>";
        echo "<h3><a href='../controller/DashboardController.php'>Go Back to Dashboard</a></h3>";
    }
} else {
    // Redirect if accessed by POST or other methods
    header("Location: ../controller/DashboardController.php");
    exit();
}

mysqli_close($conn);
