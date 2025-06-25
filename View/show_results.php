<!DOCTYPE html>
<html>
<head>
    <title>My Quiz Results</title>

    <link rel="stylesheet" type="text/css" href="../CSS/show_result.css">
</head>
<body style="
    background-image: url('../CSS/image/res.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
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
    <p style="text-align: center;"><a href="../controller/DashboardController.php">  Back to Dashboard</a>
    <p style="text-align: center;"><a href="../controller/LogoutController.php" style="color: red; font-weight: bold;">Logout</a></p>

</div>
</body>
</html>
