<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "company_db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO employees (name, position, salary) VALUES (:name, :position, :salary)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':position', $position);
		$stmt->bindParam(':salary', $salary);
		$stmt->execute();

		echo "Новий працівник успішно доданий!";
	} catch (PDOException $e) {
		echo "Помилка: " . $e->getMessage();
	}

	$conn = null;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h2>Додавання нового працівника</h2>
	<form method="post" action="add_employee.php">
		<label for="name">Ім'я:</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="position">Посада:</label><br>
		<input type="text" id="position" name="position"><br>
		<label for="salary">Зарплата:</label><br>
		<input type="text" id="salary" name="salary"><br><br>
		<input type="submit" value="Додати працівника">
	</form>
</body>

</html>