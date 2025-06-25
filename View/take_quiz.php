<!DOCTYPE html>
<html>
<head>
    <title>Take Quiz</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        .quiz-box {
            background: white;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            position: relative;
            height: 80vh;
            overflow-y: auto;
        }
        h2 {
            color: #00796b;
            margin: 0;
        }
        .question {
            margin-bottom: 20px;
        }
        .options label {
            display: block;
            margin-bottom: 5px;
        }
        .submit-btn {
            background-color: #00796b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
        #timer {
            position: sticky;
            top: 0;
            float: right;
            font-size: 18px;
            color: white;
            background-color: #d32f2f;
            padding: 8px 12px;
            border-radius: 6px;
            box-shadow: 0 0 5px #999;
            z-index: 1000;
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

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
