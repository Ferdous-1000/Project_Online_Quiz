<?php
$score = $_GET['score'] ?? 0;
$quizId = $_GET['quiz_id'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body  style="
    background-image: url('../CSS/image/res.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">
<div class="result">
    <h1>Your Score: <?= htmlspecialchars($score) ?></h1>
    <p>Thank you for taking the quiz!</p>
    <a href="../controller/DashboardController.php">Go back to Dashboard</a>
    
</div>
<p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

</body>
</html>
