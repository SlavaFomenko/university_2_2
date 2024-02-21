<?php


function findUniqueInFirstFile($file1, $file2)
{
	$wordsFile1 = preg_split('/\s+/', file_get_contents($file1));
	$wordsFile2 = preg_split('/\s+/', file_get_contents($file2));
	$uniqueWords = array_diff($wordsFile1, $wordsFile2);
	return $uniqueWords;
}

$uniqueWords = findUniqueInFirstFile("./file1.txt", "./file2.txt");
file_put_contents('unique_words.txt', implode(", ", $uniqueWords));

function findCommonLines($file1, $file2)
{
	$wordsFile1 = preg_split('/\s+/', file_get_contents($file1));
	$wordsFile2 = preg_split('/\s+/', file_get_contents($file2));
	$commonLines = array_intersect($wordsFile1, $wordsFile2);
	return array_unique($commonLines);
}

$commonLines = findCommonLines("./file1.txt", "./file2.txt");
file_put_contents('common_lines.txt', implode(", ", $commonLines));

function findWordsRepeatedMoreThanTwice($file1, $file2)
{
	$array1 = preg_split('/\s+/', file_get_contents($file1));
	$array2 = preg_split('/\s+/', file_get_contents($file2));
	$commonElements = array_intersect_key(
		array_count_values($array1 + $array2),
		array_filter(array_count_values($array1 + $array2), function ($count) {
			return $count > 2;
		})
	);
	return array_keys($commonElements);
}

$repeatedWords = findWordsRepeatedMoreThanTwice('./file1.txt', "./file2.txt");
file_put_contents('repeated_words.txt', implode(', ', $repeatedWords));


if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$fileToDelete = $_POST["file_to_delete"];
	if (file_exists($fileToDelete)) {
		unlink($fileToDelete);
		echo "Файл успешно удален.";
	} else {
		echo "Файл не найден.";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post">
		<label for="file_to_delete">enter file name</label><br>
		<input type="text" id="file_to_delete" name="file_to_delete"><br>
		<button type="submit">del</button>
	</form>
</body>

</html>