<?php

class Model {

    function OpenConn() {
        $conn = new mysqli("localhost", "root", "", "online_quiz");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function InsertUserInformation($conn, $table, $name, $email, $address, $gender, $username, $password) {
        $sqlQuery = "INSERT INTO $table (name, email, address, gender, username, password)
                     VALUES ('$name', '$email', '$address', '$gender', '$username', '$password')";
        return $conn->query($sqlQuery);
    }

    function getUserByUsername($conn, $username) {
        $sql = "SELECT name, email, address, gender, username FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    function getAllQuizzes($conn) {
        $sql = "SELECT subject, type, marks, time FROM quizzes";
        return $conn->query($sql);
    }
}
