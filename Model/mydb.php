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
        $sql = "SELECT *, subject FROM quizzes";
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

    function InsertTeacher($conn, $username, $password) {
        $stmt = $conn->prepare("INSERT INTO teachers (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }

    function getTeacherByUsername($conn, $username) {
        $stmt = $conn->prepare("SELECT * FROM teachers WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    function insertQuestion($conn, $quiz_id, $question, $option1, $option2, $option3, $option4, $correct_option) {
        $stmt = $conn->prepare("INSERT INTO questions (quiz_id, question, option1, option2, option3, option4, correct_option) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $quiz_id, $question, $option1, $option2, $option3, $option4, $correct_option);
        return $stmt->execute();
    }

function deleteQuestion($conn, $question_id) {
    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $question_id);
    return $stmt->execute();
}


function updateQuestion($conn, $id, $quiz_id, $question, $option1, $option2, $option3, $option4, $correct_option) {
    $stmt = $conn->prepare("UPDATE questions SET quiz_id=?, question=?, option1=?, option2=?, option3=?, option4=?, correct_option=? WHERE id=?");
    $stmt->bind_param("issssssi", $quiz_id, $question, $option1, $option2, $option3, $option4, $correct_option, $id);
    return $stmt->execute();
}


function getQuestionById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
    public function getAllQuestions($conn) {
        $sql = "SELECT * FROM questions ORDER BY id DESC";
        $result = $conn->query($sql);

        $questions = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $questions[] = $row;
            }
        }
        return $questions;
    }

}
