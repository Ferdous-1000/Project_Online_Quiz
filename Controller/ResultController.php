<?php
session_start();
require_once '../model/mydb.php';

if (!isset($_SESSION['username'])) {
    echo "Access Denied. <a href='../view/login.php'>Login</a>";
    exit();
}

$model = new Model();
$conn = $model->OpenConn();

$username = $_SESSION['username'];
$results = [];

$res = $model->getResultsByUsername($conn, $username);
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $results[] = $row;
    }
}

$conn->close();
include '../view/show_results.php';
