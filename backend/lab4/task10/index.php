<?php

interface HouseCleaning
{
	public function cleanRoom();
	public function cleanKitchen();
}

class Human implements HouseCleaning
{
	public function cleanRoom()
	{
		echo "Human is cleaning the room.\n";
	}

	public function cleanKitchen()
	{
		echo "Human is cleaning the kitchen.\n";
	}
}


class Student extends Human
{
}
class Programmer extends Human
{
}

$student = new Student();
$programmer = new Programmer();

$student->cleanRoom();
$student->cleanKitchen();

$programmer->cleanRoom();
$programmer->cleanKitchen();

?>