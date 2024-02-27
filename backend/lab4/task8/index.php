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

echo "Human Height: " . $human->getHeight() . " cm\n";
echo "Human Weight: " . $human->getWeight() . " kg\n";
echo "Human Age: " . $human->getAge() . " years\n";

$student = new Student();
$student->setHeight(170);
$student->setWeight(60);
$student->setAge(20);
$student->setUniversity("Some University");
$student->setCourse(2);

echo "Student Height: " . $student->getHeight() . " cm\n";
echo "Student Weight: " . $student->getWeight() . " kg\n";
echo "Student Age: " . $student->getAge() . " years\n";
echo "Student University: " . $student->getUniversity() . "\n";
echo "Student Course: " . $student->getCourse() . "\n";

$student->moveToNextCourse();
echo "Student Course after moving to next course: " . $student->getCourse() . "\n";

$programmer = new Programmer();
$programmer->setHeight(175);
$programmer->setWeight(70);
$programmer->setAge(25);
$programmer->setExperience("5 years");
$programmer->addProgrammingLanguage("PHP");
$programmer->addProgrammingLanguage("JavaScript");

echo "Programmer Height " . $programmer->getHeight() . " cm\n";
echo "Programmer Weight " . $programmer->getWeight() . " kg\n";
echo "Programmer Age " . $programmer->getAge() . " years\n";
echo "Programmer Experience " . $programmer->getExperience() . "\n";
echo "Programmer Programming Languages: " . implode(", ", $programmer->getProgrammingLanguages()) . "\n";

?>