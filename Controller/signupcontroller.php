<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "online_quiz");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize error variables
$errors = [
    'name' => '',
    'email' => '',
    'address' => '',
    'gender' => '',
    'username' => '',
    'password' => ''
];

// Initialize input variables
$inputs = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and trim inputs
    foreach (['name', 'email', 'address', 'gender', 'username', 'password'] as $field) {
        $inputs[$field] = trim($_POST[$field] ?? '');
    }

    // Validation
    if (empty($inputs['name']) || !preg_match("/^[a-zA-Z\s]+$/", $inputs['name'])) {
        $errors['name'] = "Name must only contain letters and spaces.";
    }

    if (empty($inputs['email']) || !preg_match("/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $inputs['email'])) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($inputs['address'])) {
        $errors['address'] = "Address is required.";
    }

    if (empty($inputs['gender'])) {
        $errors['gender'] = "Please select a gender.";
    }

    if (empty($inputs['username'])) {
        $errors['username'] = "Username is required.";
    }

    $pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    if (empty($inputs['password']) || !preg_match($pattern, $inputs['password'])) {
        $errors['password'] = "Password must be at least 8 characters with at least one letter and one number.";
    }

    // Check if any errors exist
    $hasError = false;
    foreach ($errors as $err) {
        if (!empty($err)) {
            $hasError = true;
            break;
        }
    }

    if ($hasError) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $inputs;
        header("Location: ../view/signup.php");
        exit();
    }

    // Insert to DB
    $sql = "INSERT INTO users (name, email, address, gender, username, password)
            VALUES ('{$inputs['name']}', '{$inputs['email']}', '{$inputs['address']}', '{$inputs['gender']}', '{$inputs['username']}', '{$inputs['password']}')";

    if (mysqli_query($conn, $sql)) {
        session_destroy(); // clear old input/errors
        echo "<h2 style='color: green;'>Signup Successful!</h2>";
        echo "<h3><a href='../view/login.php'>Click Here to Login</a></h3>";
    } else {
        echo "<p style='color:red;'>Database error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
