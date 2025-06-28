<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>All Questions</title>
    <link rel="stylesheet" href="../css/teacherdashb.css" />
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
        body {
            background-image: url('../CSS/image/edu.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: white;
            text-shadow: 1px 1px 2px black;
        }
    </style>
</head>
<body>

<h2>All Questions</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Quiz ID</th>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Correct Option</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($allQuestions)): ?>
            <?php foreach ($allQuestions as $q): ?>
                <tr>
                    <td><?= htmlspecialchars($q['id']) ?></td>
                    <td><?= htmlspecialchars($q['quiz_id']) ?></td>
                    <td><?= htmlspecialchars($q['question']) ?></td>
                    <td><?= htmlspecialchars($q['option1']) ?></td>
                    <td><?= htmlspecialchars($q['option2']) ?></td>
                    <td><?= htmlspecialchars($q['option3']) ?></td>
                    <td><?= htmlspecialchars($q['option4']) ?></td>
                    <td><?= htmlspecialchars($q['correct_option']) ?></td>
                    <td>
                        <a href="UpdateQuestionController.php?id=<?= $q['id'] ?>">Edit</a> |
                        <a href="DeleteQuestionController.php?id=<?= $q['id'] ?>" onclick="return confirm('Are you sure you want to delete this question?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9" style="text-align:center;">No questions found.</td></tr>
        <?php endif; ?>
    </tbody>
    
</table>
<div style="text-align: center; margin-top: 20px;">
    <a href="../view/teacherdashboard.php" class="btn logout-btn">Back to Dashboard</a>
</div>


</body>
</html>
