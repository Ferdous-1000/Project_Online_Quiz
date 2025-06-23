<?php
  
  class Model{

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

    $result = $conn->query($sqlQuery);
    return $result;
    }



  }
?>