<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

print_r($_POST);


if (!isset($_POST['title']) || !isset($_POST['text']) || empty($_POST['title']) || empty($_POST['text'])) {
	echo json_encode(array('error' => 'Title and text cannot be empty'));
	exit;
}

$title = $_POST['title'];
$text = $_POST['text'];

$sql = "INSERT INTO notes (title, text) VALUES ('$title', '$text')";
if ($conn->query($sql) === TRUE) {
	echo json_encode(array('message' => 'Note added successfully'));
} else {
	echo json_encode(array('error' => 'Error adding note: ' . $conn->error));
}

$conn->close();
?>