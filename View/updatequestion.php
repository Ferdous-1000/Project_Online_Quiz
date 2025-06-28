<!DOCTYPE html>
<html>
<head>
    <title>Update Question</title>
    <link rel="stylesheet" href="../css/updatequestion.css">
    <script>
        function fetchQuestion() {
            const id = document.getElementById('id').value;
            if (id.trim() === '') return;

            fetch(`../controller/getQuestionAjax.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('quiz_id').value = data.quiz_id;
                        document.getElementById('question').value = data.question;
                        document.getElementById('option1').value = data.option1;
                        document.getElementById('option2').value = data.option2;
                        document.getElementById('option3').value = data.option3;
                        document.getElementById('option4').value = data.option4;
                        document.getElementById('correct_option').value = data.correct_option;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body style="
    background-image: url('../CSS/image/res.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">

<div class="form-box">
    <h2>Update Question</h2>

    <?php if (!empty($errors)): ?>
        <ul class="error">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="../controller/UpdateQuestionController.php" method="POST">
        <table>
            <tr>
                <td><label for="id">Question ID:</label></td>
                <td><input type="text" id="id" name="id" onblur="fetchQuestion()" required></td>
            </tr>
            <tr>
                <td><label for="quiz_id">Quiz ID:</label></td>
                <td><input type="text" id="quiz_id" name="quiz_id" required></td>
            </tr>
            <tr>
                <td><label for="question">Question:</label></td>
                <td><input type="text" id="question" name="question" required></td>
            </tr>
            <tr>
                <td><label for="option1">Option 1:</label></td>
                <td><input type="text" id="option1" name="option1" required></td>
            </tr>
            <tr>
                <td><label for="option2">Option 2:</label></td>
                <td><input type="text" id="option2" name="option2" required></td>
            </tr>
            <tr>
                <td><label for="option3">Option 3:</label></td>
                <td><input type="text" id="option3" name="option3" required></td>
            </tr>
            <tr>
                <td><label for="option4">Option 4:</label></td>
                <td><input type="text" id="option4" name="option4" required></td>
            </tr>
            <tr>
                <td><label for="correct_option">Correct Option:</label></td>
                <td><input type="text" id="correct_option" name="correct_option" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center; padding-top: 15px;">
                    <input type="submit" value="Update Question">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
