<?php
session_start();

if (isset($_GET['lang'])) {
	$selected_lang = $_GET['lang'];
	setcookie('lang', $selected_lang);
} else {
	if (isset($_COOKIE['lang'])) {
		$selected_lang = $_COOKIE['lang'];
	} else {
		$selected_lang = 'ukr';
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['confirm_password'] = $_POST['confirm_password'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['about'] = $_POST['about'];

	// Обробка вибору ігор
	if (isset($_POST['games'])) {
		$_SESSION['games'] = implode(", ", $_POST['games']);
	}

	// Обробка завантаження файлу
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
	$_SESSION['photo'] = $target_file;


	header("Location: show.php");
	die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
</head>

<body>
	<!-- Форма з вказаними полями -->
	<form method="post" enctype="multipart/form-data">
		<label for="login">Логін:</label>
		<input type="text" id="login" name="login"
			value="<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : ''; ?>"><br>

		<label for="password">Пароль:</label>
		<input type="password" id="password" name="password"><br>

		<label for="confirm_password">Повторіть пароль:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>

		<label for="gender">Стать:</label><br>
		<input type="radio" id="male" name="gender" value="male" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'male')
			echo 'checked'; ?>>
		<label for="male">Чоловіча</label><br>
		<input type="radio" id="female" name="gender" value="female" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'female')
			echo 'checked'; ?>>
		<label for="female">Жіноча</label><br>

		<label for="city">Город:</label>
		<select id="city" name="city">
			<option value="Kyiv" <?php if (isset($_SESSION['city']) && $_SESSION['city'] == 'Kyiv')
				echo 'selected'; ?>>Київ
			</option>
			<option value="Lviv" <?php if (isset($_SESSION['city']) && $_SESSION['city'] == 'Lviv')
				echo 'selected'; ?>>Львів
			</option>
			<option value="Odesa" <?php if (isset($_SESSION['city']) && $_SESSION['city'] == 'Odesa')
				echo 'selected'; ?>>Одеса
			</option>
		</select><br>

		<label for="games">Любимі ігри:</label><br>
		<input type="checkbox" id="game1" name="games[]" value="Гра 1">
		<label for="game1">Гра 1</label><br>
		<input type="checkbox" id="game2" name="games[]" value="Гра 2">
		<label for="game2">Гра 2</label><br>
		<input type="checkbox" id="game3" name="games[]" value="Гра 3">
		<label for="game3">Гра 3</label><br>

		<label for="about">Про себе:</label><br>
		<textarea id="about" name="about"><?php echo isset($_SESSION['about']) ? $_SESSION['about'] : ''; ?></textarea><br>

		<label for="photo">Фото:</label>
		<input type="file" id="photo" name="photo"><br>

		<input type="submit" value="Зареєструватися">
	</form>

	<?php
	echo 'Привет, ' . htmlspecialchars($_COOKIE["lang"]) . '!';
	?>

	</br>
	<!-- Вибір мови -->
	<a href="index.php?lang=ukr"><img src="#" alt="Українська"></a>
	<a href="index.php?lang=eng"><img src="#" alt="English"></a>
</body>

</html>