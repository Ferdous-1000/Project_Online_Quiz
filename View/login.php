<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$signupSuccess = $_SESSION['signup_success'] ?? null;
unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['signup_success']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Online Quiz</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">

<div class="login-box">
    <h2>User Login</h2>

    <?php if ($signupSuccess): ?>
        <p class="success" style="color: green; font-weight: bold;"><?= htmlspecialchars($signupSuccess) ?></p>
    <?php endif; ?>

    <?php if (!empty($errors['general'])): ?>
        <p class="error"><?= htmlspecialchars($errors['general']) ?></p>
    <?php endif; ?>

    <form action="../controller/logincontroller.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
        <span class="error"><?= $errors['username'] ?? '' ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?= $errors['password'] ?? '' ?></span>

        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="signup.php">Register</a></p>
    <p><a href="teacherlogin.php">If you are a teacher click here to login </a></p>
</div>

</body>
</html>
