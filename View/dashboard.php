<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">
<div class="container">
    <div class="user-info">
        <h2>Welcome, <?= htmlspecialchars($user['name']) ?></h2>
        <p>Profile Details:</p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($user['address']) ?></p>
    </div>
        <h2><a href="quiz.php">Give a Quiz to Test Your-Self</a></h2>  
    <div class="quiz-info">
        <h2>Available Quizzes</h2>

        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Marks</th>
                    <th>Time (min)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzes as $quiz): ?>
                <tr>
                    <td><?= htmlspecialchars($quiz['subject']) ?></td>
                    <td><?= htmlspecialchars($quiz['type']) ?></td>
                    <td><?= htmlspecialchars($quiz['marks']) ?></td>
                    <td><?= htmlspecialchars($quiz['time']) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

     
    </div>
</div>
</body>
</html>
