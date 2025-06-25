<!DOCTYPE html>
<html>
<head>
    <title>Take Quiz</title>
      <link rel="stylesheet" type="text/css" href="../CSS/take_quiz.css">
</head>
<body  style="
    background-image: url('../CSS/image/quiz.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">


<div class="quiz-box">
    <div id="timer"></div>
    <h2>Quiz: <?= htmlspecialchars($quiz['subject']) ?> (<?= $quiz['type'] ?>)</h2>

    <form method="POST" action="../controller/TakeQuizController.php" id="quizForm">
        <input type="hidden" name="quiz_id" value="<?= $quizId ?>">
        <?php foreach ($questions as $q): ?>
            <div class="question">
                <strong><?= $q['question'] ?></strong>
                <div class="options">
                    <label><input type="radio" name="answer_<?= $q['id'] ?>" value="1"> <?= $q['option1'] ?></label>
                    <label><input type="radio" name="answer_<?= $q['id'] ?>" value="2"> <?= $q['option2'] ?></label>
                    <label><input type="radio" name="answer_<?= $q['id'] ?>" value="3"> <?= $q['option3'] ?></label>
                    <label><input type="radio" name="answer_<?= $q['id'] ?>" value="4"> <?= $q['option4'] ?></label>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="submit-btn">Submit Quiz</button>
    </form>
</div>

<script>
    let totalSeconds = <?= (int)$quiz['time'] ?> * 60;
    const timerDisplay = document.getElementById('timer');
    const quizForm = document.getElementById('quizForm');

    function updateTimer() {
        let minutes = Math.floor(totalSeconds / 60);
        let seconds = totalSeconds % 60;
        timerDisplay.textContent = `Time Left: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
        totalSeconds--;

        if (totalSeconds < 0) {
            clearInterval(timerInterval);
            alert("Time is up! Submitting your quiz.");
            quizForm.submit();
        }
    }

    updateTimer();
    const timerInterval = setInterval(updateTimer, 1000);
</script>

</body>
</html>
