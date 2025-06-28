<?php
session_start();
require_once '../model/mydb.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: teacherlogin.php");
    exit;
}

$db = new Model();
$conn = $db->OpenConn();
$allQuestions = $db->getAllQuestions($conn);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Questions</title>
    <link rel="stylesheet" href="../css/teacherdashb.css">
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
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
        .error {
            color: red;
        }
        .btn-back {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px 0;
            background-color: #00796b;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn-back:hover {
            background-color: #00695c;
        }
    </style>
    <script>
        function deleteQuestion(id, btn) {
            if (!confirm('Are you sure you want to delete this question?')) return;

            fetch('../controller/DeleteQuestionAjaxController.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: id})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the row from table
                    const row = btn.closest('tr');
                    row.parentNode.removeChild(row);
                    showMessage('Question deleted successfully.');
                } else if (data.error) {
                    alert('Error: ' + data.error);
                }
            })
            .catch(err => alert('Request failed: ' + err));
        }

        function showMessage(msg) {
            let messageDiv = document.getElementById('message');
            if (!messageDiv) {
                messageDiv = document.createElement('div');
                messageDiv.id = 'message';
                messageDiv.className = 'message';
                document.body.insertBefore(messageDiv, document.body.firstChild);
            }
            messageDiv.textContent = msg;
            setTimeout(() => { messageDiv.textContent = ''; }, 3000);
        }
    </script>
</head>
<body>

<h2 style="text-align:center;">Delete Questions</h2>

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
            <th>Action</th>
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
                        <button class="btn-delete" onclick="deleteQuestion(<?= $q['id'] ?>, this)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9" style="text-align:center;">No questions found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="../view/teacherdashboard.php" class="btn-back">Back to Dashboard</a>

</body>
</html>
