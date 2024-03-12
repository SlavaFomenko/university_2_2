<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$title = $data['title'];
$text = $data['text'];
$id = $_GET['id'];

$sql = "UPDATE notes SET title='$title', text='$text' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
	echo json_encode(array('message' => 'Note updated successfully'));
} else {
	echo json_encode(array('error' => 'Error updating note: ' . $conn->error));
}

$conn->close();
?>