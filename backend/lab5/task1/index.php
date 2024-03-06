<?php
session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
	header("Location: welcome.php");
	exit;
}


require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
	registerUser();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
	loginUser();
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
	<h2>register</h2>
	<form method="post">
		<label for="username">username</label><br>
		<input type="text" id="username" name="username"><br>
		<label for="password">password</label><br>
		<input type="password" id="password" name="password"><br>
		<label for="email">email</label><br>
		<input type="text" id="email" name="email"><br>
		<input type="submit" name="register" value="register">
	</form>

	<h2>login</h2>
	<form method="post">
		<label for="login_username">username</label><br>
		<input type="text" id="login_username" name="login_username"><br>
		<label for="login_password">password</label><br>
		<input type="password" id="login_password" name="login_password"><br>
		<input type="submit" name="login" value="login">
	</form>
</body>

</html>