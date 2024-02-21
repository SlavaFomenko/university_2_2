<?php
if (isset($_POST['submit'])) {
	$targetDirectory = "uploads/";

	if (!file_exists($targetDirectory)) {
		mkdir($targetDirectory, 0777, true);
	}

	$fileName = basename($_FILES["image"]["name"]);
	$targetFilePath = $targetDirectory . $fileName;
	$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

	$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
	if (in_array($fileType, $allowTypes)) {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
			echo "Файл " . $fileName . " успішно завантажено.";
		} else {
			echo "Сталася помилка під час завантаження файлу.";
		}
	} else {
		echo 'Дозволені лише файли типу JPG, JPEG, PNG та GIF.';
	}
}
?>