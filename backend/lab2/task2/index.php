<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
	// Функція для виведення елементів масиву, які повторюються
	function printDuplicateElements($array)
	{
		$duplicates = array_count_values($array);
		foreach ($duplicates as $value => $count) {
			if ($count > 1) {
				echo $value, " ";
			}
		}
	}

	$array = array(1, 2, 2, 3, 4, 4, 4, 5);
	echo "Дублікати: ";
	printDuplicateElements($array);
	?>

	</br>

	<?php

	// Функція-генератор імен тварин
	function generateAnimalName($parts)
	{
		$animals = array("кішка", "собака", "хом'ячок", "інша тваринка");
		$name = '';
		foreach ($parts as $part) {
			$name .= $part[rand(0, count($part) - 1)];
		}
		return trim($name) . 'Chel ' . $animals[rand(0, count($animals) - 1)];
	}
	$parts = array(
		array('Super', 'Mega', 'Micro'),
		array('Ultra', 'Maxi', 'Mini'),
		array('Strong', 'Stupid', 'Beautiful')
	);
	echo "Згенероване ім'я тваринки: ", generateAnimalName($parts) . "\n";
	?>
	</br>
	<?php

	// Функція для створення масиву з випадковою довжиною та значеннями
	function createArray()
	{
		$length = rand(3, 7);
		$array = array();
		for ($i = 0; $i < $length; $i++) {
			$array[] = rand(10, 20);
		}
		return $array;
	}

	// Функція для об'єднання, видалення дублікатів та сортування масивів
	function manipulateArrays($array1, $array2)
	{
		$arr = (array_unique(array_merge($array1, $array2)));
		sort($arr);
		return $arr;
	}

	$array1 = createArray();
	$array2 = createArray();
	echo "Масив 1: " . implode(', ', $array1) . "</br>";
	echo "Масив 2: " . implode(', ', $array2) . "</br>";
	$resultArray = manipulateArrays($array1, $array2);
	echo "Результат: " . implode(', ', $resultArray) . "\n";
	?>
	</br>
	<?php
	// Функція для сортування асоціативного масиву за віком або іменами
	function sortUsersArray($users, $sortBy)
	{
		if ($sortBy == 'вік') {
			asort($users); // По value
		} elseif ($sortBy == 'ім\'я') {
			ksort($users); // По key
		}
		return $users;
	}

	$users = array(
		'John' => 25,
		'Alice' => 30,
		'Bob' => 20
	);
	echo "Сортування за віком: \n";
	print_r(sortUsersArray($users, 'вік'));
	echo "Сортування за ім'ям: \n";
	print_r(sortUsersArray($users, 'ім\'я'));
	?>

</body>

</html>