<?php
if (isset($_COOKIE['font_size'])) {
	$font_size = $_COOKIE['font_size'];
} else {
	$font_size = 'medium';
}

if (isset($_GET['size'])) {
	$size = $_GET['size'];
	switch ($size) {
		case 'large':
			$font_size = 'large';
			break;
		case 'medium':
			$font_size = 'medium';
			break;
		case 'small':
			$font_size = 'small';
			break;
		default:
			$font_size = 'medium';
			break;
	}
	setcookie('font_size', $font_size, time() + (86400 * 30), "/");
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body style="font-size: <?php echo $font_size; ?>;">
	<a href="?size=large">big</a>
	<br>
	<a href="?size=medium">medium</a>
	<br>
	<a href="?size=small">small</a>
</body>

</html>