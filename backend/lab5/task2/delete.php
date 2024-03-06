<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['id'])) {
		$pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'homeuser', '909011');

		$sql = "DELETE FROM `tov` WHERE `id` = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();
		header('Location: index.php');
		exit;
	} else {
		header('Location: index.php');
		exit;
	}
} else {
	header('Location: index.php');
	exit;
}
?>