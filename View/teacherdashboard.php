<?php
session_start();

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacherlogin.php");
    exit;
}

$teacherUsername = $_SESSION['teacher_username'] ?? 'Teacher';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Dashboard - Online Quiz</title>
    <link rel="stylesheet" href="../css/teacherdashb.css">
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">

<div class="dashboard-container">
    <h2>Welcome, <?= htmlspecialchars($teacherUsername) ?>!</h2>

    <table class="center-table">
        <tr><td><a href="addquestion.php" class="btn">Add Question</a></td></tr>
        <tr><td><a href="deletequestion.php" class="btn">Delete Question</a></td></tr>
        <tr><td><a href="updatequestion.php" class="btn">Update Question</a></td></tr>
        <tr><td><a href="../controller/ListQuestionsController.php" class="btn">View All Questions</a><td></tr>
    </table>

    <form action="../controller/logoutcontroller.php" method="post">
        <input type="submit" value="Logout" class="btn logout-btn">
    </form>
</div>

</body>
</html>
