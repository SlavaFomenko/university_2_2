<?php

class Human
{
	private $height;
	private $weight;
	private $age;

	public function getHeight()
	{
		return $this->height;
	}

	public function setHeight($height)
	{
		$this->height = $height;
	}

	public function getWeight()
	{
		return $this->weight;
	}

	public function setWeight($weight)
	{
		$this->weight = $weight;
	}

	public function getAge()
	{
		return $this->age;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}
}

class Student extends Human
{
	private $university;
	private $course;

	public function getUniversity()
	{
		return $this->university;
	}

	public function setUniversity($university)
	{
		$this->university = $university;
	}

	public function getCourse()
	{
		return $this->course;
	}

	public function setCourse($course)
	{
		$this->course = $course;
	}

	public function moveToNextCourse()
	{
		$this->course++;
	}
}

class Programmer extends Human
{
	private $programmingLanguages = [];
	private $experience;

	public function getProgrammingLanguages()
	{
		return $this->programmingLanguages;
	}

	public function setProgrammingLanguages($languages)
	{
		$this->programmingLanguages = $languages;
	}

	public function addProgrammingLanguage($language)
	{
		$this->programmingLanguages[] = $language;
	}

	public function getExperience()
	{
		return $this->experience;
	}

	public function setExperience($experience)
	{
		$this->experience = $experience;
	}
}

// Приклад використання класів:

$human = new Human();
$human->setHeight(180);
$human->setWeight(75);
$human->setAge(30);

echo "Human Height: " . $human->getHeight() . " cm<br>";
echo "Human Weight: " . $human->getWeight() . " kg<br>";
echo "Human Age: " . $human->getAge() . " years<br>";

$student = new Student();
$student->setHeight(170);
$student->setWeight(60);
$student->setAge(20);
$student->setUniversity("Some University");
$student->setCourse(2);

echo "Student Height: " . $student->getHeight() . " cm<br>";
echo "Student Weight: " . $student->getWeight() . " kg<br>";
echo "Student Age: " . $student->getAge() . " years<br>";
echo "Student University: " . $student->getUniversity() . "<br>";
echo "Student Course: " . $student->getCourse() . "<br>";

$student->moveToNextCourse();
echo "Student Course after moving to next course: " . $student->getCourse() . "<br>";

$programmer = new Programmer();
$programmer->setHeight(175);
$programmer->setWeight(70);
$programmer->setAge(25);
$programmer->setExperience("5 years");
$programmer->addProgrammingLanguage("PHP");
$programmer->addProgrammingLanguage("JavaScript");

echo "Programmer Height " . $programmer->getHeight() . " cm<br>";
echo "Programmer Weight " . $programmer->getWeight() . " kg<br>";
echo "Programmer Age " . $programmer->getAge() . " years<br>";
echo "Programmer Experience " . $programmer->getExperience() . "<br>";
echo "Programmer Programming Languages: " . implode(", ", $programmer->getProgrammingLanguages()) . "<br>";

?>