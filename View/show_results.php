<!DOCTYPE html>
<html>
<head>
    <title>My Quiz Results</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 30px; }
        .result-box { background: white; padding: 20px; max-width: 900px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px #ccc; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ccc; }
        th { background-color: #00796b; color: white; }
        a { text-decoration: none; color: #00796b; }
    </style>
</head>
<body>
<div class="result-box">
    <h2>Your Quiz Results</h2>
    <?php if (!empty($results)): ?>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Total Marks</th>
                    <th>Score</th>
        
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['subject']) ?></td>
                    <td><?= htmlspecialchars($row['type']) ?></td>
                    <td><?= htmlspecialchars($row['marks']) ?></td>
                    <td><?= htmlspecialchars($row['score']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You haven’t taken any quizzes yet.</p>
    <?php endif ?>
    <br>
    <p style="text-align: center;"><a href="../controller/DashboardController.php">  Back to Dashboard</a></p>
    <p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

</div>
</body>
</html>
