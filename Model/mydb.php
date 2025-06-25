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
        $sql = "SELECT * FROM quizzes";
        return $conn->query($sql);
    }

    function getQuizById($conn, $id) {
        $sql = "SELECT * FROM quizzes WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    function getQuestionsByQuizId($conn, $quiz_id) {
        $sql = "SELECT * FROM questions WHERE quiz_id = $quiz_id";
        $result = $conn->query($sql);
        $questions = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $questions[] = $row;
            }
        }

        return $questions;
    }

    function saveQuizResult($conn, $username, $quiz_id, $score) {
        $stmt = $conn->prepare("INSERT INTO results (username, quiz_id, score) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $username, $quiz_id, $score);
        return $stmt->execute();
    }

function getResultsByUsername($conn, $username) {
    $sql = "SELECT r.quiz_id, q.subject, q.type, q.marks, r.score 
            FROM results r 
            JOIN quizzes q ON r.quiz_id = q.id 
            WHERE r.username = '$username'";
    return $conn->query($sql);
}

}

