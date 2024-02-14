<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post">
		<label for="text">Текст:</label><br>
		<input type="text" id="text" name="text"><br>
		<label for="find">Знайти:</label><br>
		<input type="text" id="find" name="find"><br>
		<label for="replace">Замінити:</label><br>
		<input type="text" id="replace" name="replace"><br>
		<input type="submit" value="Виконати">
	</form>

	<?php
	// Функція для заміни символів у тексті
	function replaceText($text, $find, $replace)
	{
		return str_replace($find, $replace, $text);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$text = $_POST["text"];
		$find = $_POST["find"];
		$replace = $_POST["replace"];

		$result = replaceText($text, $find, $replace);
		echo "Результат: $result";
	}
	?>
	</br>
	<?php
	// Функція для сортування міст за алфавітом
	function sortCities($cities)
	{
		$cityArray = explode(" ", $cities);
		sort($cityArray);
		return implode(" ", $cityArray);
	}

	// Вхідні дані з рядком міст через пробіл
	$cities = "Київ Одеса Львів Харків Дніпро";

	// Виклик функції для сортування міст
	echo "Впорядковані міста: " . sortCities($cities);
	?>
	</br>
	<?php
	// Виокремлення ім'я файлу без розширення зі строки
	$path = "D:\\WebServers\\home\\testsite\\www\\myfile.txt";
	$filename = pathinfo($path, PATHINFO_FILENAME);
	echo "Ім'я файлу без розширення: $filename";
	?>
	</br>
	<?php
	// Функція для підрахунку різниці між датами у днях
	function dateDifference($date1, $date2)
	{
		$datetime1 = date_create($date1);
		$datetime2 = date_create($date2);
		$interval = date_diff($datetime1, $datetime2);
		return $interval->format('%a');
	}

	// Вхідні дані з двома рядками дат
	$date1 = "01-01-2024";
	$date2 = "15-02-2023";

	// Виклик функції для підрахунку різниці між датами
	echo "Кількість днів між датами: " . dateDifference($date1, $date2);
	?>
	</br>
	<?php
	// Генератор випадкового пароля
	function generatePassword($length = 8)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		return substr(str_shuffle($chars), 0, $length);
	}

	// Виклик функції для генерації пароля довжиною 10 символів
	$password = generatePassword(10);
	echo "Випадковий пароль: $password";
	?>
	</br>
	<?php
	// Функція для перевірки міцності пароля
	function checkPasswordStrength($password)
	{
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
			return false;
		} else {
			return true;
		}
	}

	// Перевірка міцності пароля
	if (checkPasswordStrength($password)) {
		echo "Пароль міцний";
	} else {
		echo "Пароль слабкий";
	}
	?>
</body>

</html>