<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "company_db";

if (isset($_GET['id']) && !empty($_GET['id'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$employee_id = $_GET['id'];
		$name = $_POST['name'];
		$position = $_POST['position'];
		$salary = $_POST['salary'];

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':position', $position);
			$stmt->bindParam(':salary', $salary);
			$stmt->bindParam(':id', $employee_id);
			$stmt->execute();

			echo "Інформація про працівника успішно оновлена.";
		} catch (PDOException $e) {
			echo "Помилка: " . $e->getMessage();
		}

		$conn = null;
	} else {
		$employee_id = $_GET['id'];

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT * FROM employees WHERE id = :id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':id', $employee_id);
			$stmt->execute();

			if ($stmt->rowCount() == 1) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				?>
				<h2>Редагування працівника</h2>
				<form method="post" action="">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					<label for="name">Ім'я:</label><br>
					<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
					<label for="position">Посада:</label><br>
					<input type="text" id="position" name="position" value="<?php echo $row['position']; ?>"><br>
					<label for="salary">Зарплата:</label><br>
					<input type="text" id="salary" name="salary" value="<?php echo $row['salary']; ?>"><br><br>
					<input type="submit" value="Зберегти зміни">
				</form>
				<?php
			} else {
				echo "Працівник не знайдений.";
			}
		} catch (PDOException $e) {
			echo "Помилка: " . $e->getMessage();
		}

		$conn = null;
	}
} else {
	echo "Невірні параметри.";
}
?>