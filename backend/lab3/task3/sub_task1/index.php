<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post">
		<label for="name">name</label><br>
		<input type="text" id="name" name="name"><br>
		<label for="comment">comment:</label><br>
		<textarea id="comment" name="comment"></textarea><br>
		<button type="submit">submit</button>
	</form>

	<table border="1">
		<tr>
			<th>name</th>
			<th>comment</th>
		</tr>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$comment = $_POST["comment"];

			$file = fopen("comments.txt", "a");
			fwrite($file, "$name|$comment\n");
			fclose($file);
		}

		$file = fopen("comments.txt", "r");
		while (!feof($file)) {
			$line = fgets($file);
			if (!empty($line)) {
				list($name, $comment) = explode("|", $line);
				echo "<tr><td>$name</td><td>$comment</td></tr>";
			}
		}
		fclose($file);
		?>
	</table>
</body>

</html>