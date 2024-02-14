<?php
session_start();

// Перевірка чи існують дані у сесії
if (isset($_SESSION['login']) && isset($_SESSION['gender']) && isset($_SESSION['city']) && isset($_SESSION['about']) && isset($_SESSION['photo'])) {
	// Виведення даних
	echo "Логін: " . $_SESSION['login'] . "<br>";
	echo "Стать: " . $_SESSION['gender'] . "<br>";
	echo "Город: " . $_SESSION['city'] . "<br>";
	echo "Пароль: " . $_SESSION["password"] . "<br>";
	echo "2 пароль: " . $_SESSION["confirm_password"] . "<br>";

	echo $_SESSION["games"] . "<br>";

	echo "Про себе: " . $_SESSION['about'] . "<br>";
	echo "<img src='" . $_SESSION['photo'] . "' alt='Фото'><br>";
} else {
	echo "Дані не передані!";
}
?>