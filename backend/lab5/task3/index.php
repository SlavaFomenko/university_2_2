<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h2>Список працівників</h2>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "company_db";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM employees";
		$stmt = $conn->query($sql);

		if ($stmt->rowCount() > 0) {
			echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Посада</th>
            <th>Зарплата</th>
            <th>Дії</th>
            </tr>";
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['position'] . "</td>";
				echo "<td>" . $row['salary'] . "</td>";
				echo "<td>
                <a href='edit_employee.php?id=" . $row['id'] . "'>Редагувати</a> |
                <a href='delete_employee.php?id=" . $row['id'] . "'>Видалити</a>
                </td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "Немає записів";
		}
	} catch (PDOException $e) {
		echo "Помилка: " . $e->getMessage();
	}

	$conn = null;
	?>
	<br>
	<a href="add_employee.php">Додати нового працівника</a>
	<a href="statistic.php">Статистика</a>
</body>

</html>