<?php
header("Access-Control-Allow-Origin: *");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lab6";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $users = array();
    $result = $conn->query("SELECT * FROM users");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($users, array("name" => $row["name"], "email" => $row["email"]));
        }
        echo json_encode($users);
    } else {
        echo json_encode(array());
    }
}

$conn->close();
?>