<?php
session_start();

function updateProfile()
{
	global $conn;
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	$newUsername = $_POST["new_username"];
	$newEmail = $_POST["new_email"];
	$username = $_SESSION['username'];


	$stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE username = ?");
	$stmt->bind_param("sss", $newUsername, $newEmail, $username);
	$stmt->execute();
	echo "Профиль успешно обновлен!";
	$_SESSION['username'] = $newUsername;
	$stmt->close();
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
	header("Location: index.php");
	exit;
}

require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
	updateProfile();
}

$userData = getUserData($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h2>Change profile</h2>
	<form method="post">
		<label for="new_username">new username</label><br>
		<input type="text" id="new_username" name="new_username" value="<?php echo $userData['username']; ?>"><br>
		<label for="new_email">new_email</label><br>
		<input type="email" id="new_email" name="new_email" value="<?php echo $userData['email']; ?>"><br>
		<input type="submit" name="update_profile" value="save">
	</form>
</body>

</html>