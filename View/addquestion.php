<?php
session_start();
require_once '../model/mydb.php';

$db = new Model();
$conn = $db->OpenConn();
$quizzes = $db->getAllQuizzes($conn);

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <link rel="stylesheet" href="../css/teacherdashb.css">
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">

<div class="dashboard-container">
    <h2>Add Question to Quiz</h2>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $e) echo "<p>$e</p>"; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div style="color: green;"><p><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <form method="post" action="../controller/addQuestionController.php">
        <label>Select Quiz:</label><br>
        <select name="quiz_id" required>
            <option value="">-- Select Quiz --</option>
            <?php while ($quiz = $quizzes->fetch_assoc()): ?>
                <option value="<?= $quiz['id'] ?>"><?= htmlspecialchars($quiz['subject']) ?> (ID: <?= $quiz['id'] ?>)</option>
            <?php endwhile; ?>
        </select><br><br>

        <textarea name="question" placeholder="Enter Question" required></textarea><br><br>
        <input type="text" name="option1" placeholder="Option 1" required><br><br>
        <input type="text" name="option2" placeholder="Option 2" required><br><br>
        <input type="text" name="option3" placeholder="Option 3" required><br><br>
        <input type="text" name="option4" placeholder="Option 4" required><br><br>
        <input type="text" name="correct_option" placeholder="Correct Option (option1, option2, ...)" required><br><br>

        <input type="submit" class="btn" value="Add Question">
    </form>

    <br><a href="teacherdashboard.php" >Back to Dashboard</a>
</div>

</body>
</html>
