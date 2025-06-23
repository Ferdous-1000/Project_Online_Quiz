<?php
// logincontroller.php

session_start();

// 1. Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_quiz");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        // 3. Prepare SQL to check credentials
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        // 4. Validate result
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            echo "<h2>Login successful! Welcome, $username</h2>";
            // header("Location: ../view/dashboard.php"); // Optional redirect
        } else {
            echo "<h3 style='color:red;'>Invalid username or password</h3>";
        }
    } else {
        echo "<h3 style='color:red;'>Please enter username and password</h3>";
    }
} else {
    header("Location: ../model/login.php");
    exit();
}

mysqli_close($conn);
?>
