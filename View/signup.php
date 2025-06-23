<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Online Quiz</title>
    <style>
        body {
            background-color: #e0f7fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-box {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.15);
            width: 350px;
        }

        .signup-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .signup-box input[type="text"],
        .signup-box input[type="email"],
        .signup-box input[type="password"],
        .signup-box textarea,
        .signup-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .signup-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .signup-box input[type="submit"]:hover {
            background-color: #00695c;
        }

        .signup-box p {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="signup-box">
    <h2>User Sign Up</h2>
    <form action="../controller/signupcontroller.php" method="post">
        <input type="text" name="name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <textarea name="address" placeholder="Address" rows="3" required></textarea>

        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Register">
    </form>
    <p><a href="login.php">Already have an account?</a></p>
</div>

</body>
</html>
