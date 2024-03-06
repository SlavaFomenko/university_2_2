<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "company_db";





try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT position, COUNT(*) AS count FROM employees GROUP BY position";
	$stmt = $conn->query($sql);

	echo "<h2>Статистика посад</h2>";
	echo "<table border='1'>
    <tr>
    <th>Посада</th>
    <th>Кількість працівників</th>
    </tr>";
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>" . $row['position'] . "</td>";
		echo "<td>" . $row['count'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
} catch (PDOException $e) {
	echo "Помилка: " . $e->getMessage();
}

$conn = null;
?>