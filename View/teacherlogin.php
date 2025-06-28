<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login - Online Quiz</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <script>
        function validateForm() {
            const username = document.forms["loginForm"]["username"].value.trim();
            const password = document.forms["loginForm"]["password"].value.trim();
            let valid = true;

            document.getElementById("usernameError").textContent = "";
            document.getElementById("passwordError").textContent = "";

            if (username === "") {
                document.getElementById("usernameError").textContent = "Username is required";
                valid = false;
            }

            if (password === "") {
                document.getElementById("passwordError").textContent = "Password is required";
                valid = false;
            } else {
                if (!password.startsWith("AAA")) {
                    document.getElementById("passwordError").textContent = "Password must start with 'AAA'";
                    valid = false;
                } else if (password.length < 8) {
                    document.getElementById("passwordError").textContent = "Password must be at least 8 characters";
                    valid = false;
                }
            }

            return valid;
        }
    </script>
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">

<div class="login-box">
    <h2>Teacher Login</h2>

    <?php if (!empty($errors['general'])): ?>
        <p class="error"><?= htmlspecialchars($errors['general']) ?></p>
    <?php endif; ?>

    <form name="loginForm" method="post" action="../controller/teacherLoginController.php" onsubmit="return validateForm();">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
        <span class="error" id="usernameError"><?= $errors['username'] ?? '' ?></span><br>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error" id="passwordError"><?= $errors['password'] ?? '' ?></span><br>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
