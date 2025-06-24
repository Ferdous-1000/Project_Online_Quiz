<?php
session_start();
$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];
session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Online Quiz</title>
     <link rel="stylesheet" type="text/css" href="../CSS/signup.css">
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">
<div class="signup-box">
    <h2>User Sign Up</h2>
    <form action="../controller/signupcontroller.php" method="post">

        <label>Full Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>">
        <span class="error"><?= $errors['name'] ?? '' ?></span>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        <span class="error"><?= $errors['email'] ?? '' ?></span>

        <label>Address:</label>
        <textarea name="address"><?= htmlspecialchars($old['address'] ?? '') ?></textarea>
        <span class="error"><?= $errors['address'] ?? '' ?></span>

        <label>Gender:</label>
        <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" <?= ($old['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= ($old['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= ($old['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
        <span class="error"><?= $errors['gender'] ?? '' ?></span>

        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
        <span class="error"><?= $errors['username'] ?? '' ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?= $errors['password'] ?? '' ?></span>

        <input type="submit" value="Register">
    </form>
    <p><a href="login.php">Already have an account?</a></p>
</div>
</body>
</html>
