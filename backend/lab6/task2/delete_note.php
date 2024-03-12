<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM notes WHERE id=$id";
if ($conn->query($sql) === TRUE) {
	echo json_encode(array('message' => 'Note deleted successfully'));
} else {
	echo json_encode(array('error' => 'Error deleting note: ' . $conn->error));
}

$conn->close();
?>