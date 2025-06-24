<!DOCTYPE html>
<html>
<head>
    <title>Login - Online Quiz</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body  style="
    background-image: url('../CSS/image/edu.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    ">

<div class="login-box">
    <h2>User Login</h2>
    <form action="../Controller/logincontroller.php" method="post">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Register</a></p>
</div>

</body>
</html>
