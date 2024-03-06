<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['text'])) {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$text = $_POST['text'];
		$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '909011');
		$sql = "INSERT INTO `tov` (`name`, `price`, `quantity`, `text`) VALUES (:name ,:price,:quantity,:text)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':quantity', $quantity);
		$stmt->bindParam(':text', $text);
		$stmt->execute();
		header('Location: index.php');
		exit;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Insert Record</title>
</head>

<body>
	<h2>Insert Record</h2>
	<form method="post">
		<label for="name">name</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="price">price</label><br>
		<input type="number" id="price" name="price"><br>
		<label for="quantity">quantity</label><br>
		<input type="number" id="quantity" name="quantity"><br>
		<label for="text">text</label><br>
		<input type="text" id="text" name="text"><br>
		<input type="submit" value="Submit">
	</form>
</body>

</html>