<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {

	header("Location: index.php");
	exit;
}


require_once "functions.php";


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
	<h2>hello
		<?php echo $userData['username']; ?>!
	</h2>
	<p>username - 
		<?php echo $userData['username']; ?>
	</p>
	<p>email -
		<?php echo $userData['email']; ?>
	</p>

	<a href="update_profile.php">settings</a>
	<a href="logout.php">logout</a>
</body>

</html>