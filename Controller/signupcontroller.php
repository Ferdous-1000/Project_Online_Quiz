<?php
// signupcontroller.php

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_quiz"); // change db name if needed

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $address  = $_POST['address'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Basic check
    if ($name && $email && $address && $gender && $username && $password) {
        $sql = "INSERT INTO users (name, email, address, gender, username, password)
                VALUES ('$name', '$email', '$address', '$gender', '$username', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<h2>Signup Successful and Saved in Database!</h2>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<h2>All fields are required!</h2>";
    }
} else {
    header("Location: ../model/signup.php");
    exit();
}

// Close connection
mysqli_close($conn);
?>
