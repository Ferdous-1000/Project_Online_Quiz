<!DOCTYPE html>
<html>
<head>
    <title>All Quizzes</title>
    <link rel="stylesheet" type="text/css" href="../CSS/quiz.css">
</head>
<body style="
    background-image: url('../CSS/image/res.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
    <div class="quiz-list">
        <h2>Available Quizzes</h2>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Marks</th>
                    <th>Time (min)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($quiz = $quizzes->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($quiz['subject']) ?></td>
                    <td><?= htmlspecialchars($quiz['type']) ?></td>
                    <td><?= htmlspecialchars($quiz['marks']) ?></td>
                    <td><?= htmlspecialchars($quiz['time']) ?></td>
                    <td>
                        <a class="btn" href="../controller/TakeQuizController.php?quiz_id=<?= $quiz['id'] ?>">Start Quiz</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
            <p style="text-align: center;"> <a href="../controller/DashboardController.php">Go back to Dashboard</a></p>
        <p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

    </div>
    
</body>
</html>
