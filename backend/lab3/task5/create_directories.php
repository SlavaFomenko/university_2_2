<?php
if (isset($_POST['submit'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];

	// Перевірка логіну та паролю
	// Здесь вы можете реализовать вашу проверку логина и пароля

	// Папка для користувача
	$userDirectory = "users/$login";

	// Перевірка, чи папка користувача вже існує
	if (!file_exists($userDirectory)) {
		// Створення папки користувача
		mkdir($userDirectory, 0777, true);

		// Створення підпапок
		mkdir("$userDirectory/video", 0777, true);
		mkdir("$userDirectory/music", 0777, true);
		mkdir("$userDirectory/photo", 0777, true);

		// Створення деяких файлів всередині цих папок (за необхідності)
		file_put_contents("$userDirectory/video/video1.mp4", "");
		file_put_contents("$userDirectory/music/song1.mp3", "");
		file_put_contents("$userDirectory/photo/photo1.jpg", "");

		echo "Папки для користувача $login успішно створені.";
	} else {
		echo "Папка для користувача $login вже існує. Введіть інші дані.";
	}
}
?>