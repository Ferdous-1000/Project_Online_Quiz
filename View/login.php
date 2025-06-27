<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
    <div class="login-box">
        <h2>Login</h2>

        <?php if (!empty($errors['general'])): ?>
            <p class="error"><?= htmlspecialchars($errors['general']) ?></p>
        <?php endif; ?>

        <form method="POST" action="../controller/LoginController.php">
            <input
                type="text"
                name="username"
                placeholder="Username"
                value="<?= htmlspecialchars($old['username'] ?? '') ?>"
            />
            <?php if (!empty($errors['username'])): ?>
                <p class="error"><?= htmlspecialchars($errors['username']) ?></p>
            <?php endif; ?>

            <input
                type="password"
                name="password"
                placeholder="Password"
            />
            <?php if (!empty($errors['password'])): ?>
                <p class="error"><?= htmlspecialchars($errors['password']) ?></p>
            <?php endif; ?>

            <input type="submit" value="Login" />
        </form>
        
    </div>
    
</body>
</html>
