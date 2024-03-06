<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '909011');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM tov";
	$result = $pdo->query($sql);

	echo "<table style='border-collapse: collapse;'>";
	echo "<tr style='background-color: #f2f2f2;'>";
	echo "<th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>ID</th>";
	echo "<th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Name</th>";
	echo "<th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Price</th>";
	echo "<th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Quantity</th>";
	echo "<th style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>Text</th>";
	echo "</tr>";

	foreach ($result as $row) {
		echo "<tr style='background-color: #ffffff;'>";
		echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row['id'] . "</td>";
		echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row['name'] . "</td>";
		echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row['price'] . "</td>";
		echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row['quantity'] . "</td>";
		echo "<td style='border: 1px solid #dddddd; text-align: left; padding: 8px;'>" . $row['text'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";

} catch (PDOException $e) {
	echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post" action="insert.php">
		<button type="submit">add row</button>
	</form>
	<form method="post" action="delete.php">
		<input type="number" name="id" id='id'>
		<button type="submit">delete row</button>
	</form>
</body>

</html>