<?php

$conn = new mysqli("localhost", "root", "root", "lab5");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function registerUser()
{
	global $conn;

	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"]; 


	$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo "Пользователь уже существует!";
		return;
	}
	$stmt->close();

	$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $password, $email);
	$stmt->execute();
	echo "Регистрация успешна!";
	$stmt->close();
}



function loginUser()
{
	global $conn;
	session_start();

	$username = $_POST["login_username"];
	$password = $_POST["login_password"];

	
	$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $storedPassword);
		$stmt->fetch();
		if ($password === $storedPassword) {
			$_SESSION['authenticated'] = true;
			$_SESSION['username'] = $username;
			header("Location: welcome.php");
			exit;
		} else {
			echo "Неверное имя пользователя или пароль!";
		}
	} else {
		echo "Неверное имя пользователя или пароль!";
	}
	$stmt->close();
}

function getUserData($username)
{
	global $conn;

	$stmt = $conn->prepare("SELECT username, email FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($username, $email);
	$stmt->fetch();
	$userData = array(
		'username' => $username,
		'email' => $email
	);
	$stmt->close();
	return $userData;
}
?>