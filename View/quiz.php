<!DOCTYPE html>
<html>
<head>
    <title>All Quizzes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef1f5;
            padding: 20px;
        }
        .quiz-list {
            background: white;
            max-width: 850px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        h2 {
            color: #00796b;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #00796b;
            color: white;
        }
        .btn {
            padding: 8px 14px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
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
    </div>
    <p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

</body>
</html>
