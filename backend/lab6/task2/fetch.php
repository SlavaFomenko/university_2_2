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

$sql = "SELECT id, title, text FROM notes";
$result = $conn->query($sql);

$notes = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$notes[] = $row;
	}
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($notes);
?>