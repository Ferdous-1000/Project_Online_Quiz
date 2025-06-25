<?php
$score = $_GET['score'] ?? 0;
$quizId = $_GET['quiz_id'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <style>
        body { font-family: Arial; text-align: center; background: #e8f5e9; padding: 50px; }
        .result { background: white; padding: 30px; border-radius: 10px; display: inline-block; box-shadow: 0 0 10px #ccc; }
        h1 { color: #00796b; }
    </style>
</head>
<body>
<div class="result">
    <h1>Your Score: <?= htmlspecialchars($score) ?></h1>
    <p>Thank you for taking the quiz!</p>
    <a href="../controller/DashboardController.php">Go back to Dashboard</a>
    
</div>
<p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

</body>
</html>
