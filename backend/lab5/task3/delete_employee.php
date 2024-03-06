<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "company_db";

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$employee_id = $_GET['id'];

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "DELETE FROM employees WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $employee_id);
		$stmt->execute();

		echo "Працівник успішно видалений.";
	} catch (PDOException $e) {
		echo "Помилка: " . $e->getMessage();
	}

	$conn = null;
} else {
	echo "Невірні параметри.";
}
?>