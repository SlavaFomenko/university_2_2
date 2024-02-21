<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if ($_POST["login"] === "admin" && $_POST["password"] === "password") {
		$_SESSION["authenticated"] = true;
		header("Location: {$_SERVER['PHP_SELF']}");
		exit;
	} else {
		$message = "Невірний логін або пароль";
	}
}

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
	echo "Добрий день, Admin!";
} else {
	echo "<form method=\"post\">";
	echo "<label for=\"login\">Логін:</label>";
	echo "<input type=\"text\" id=\"login\" name=\"login\"><br>";
	echo "<label for=\"password\">Пароль:</label>";
	echo "<input type=\"password\" id=\"password\" name=\"password\"><br>";
	echo "<input type=\"submit\" value=\"Увійти\">";
	echo "</form>";
}
?>