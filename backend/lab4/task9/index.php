<?php

abstract class Human
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

	abstract protected function birthMessage();

	public function giveBirth()
	{
		$this->birthMessage();
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

	protected function birthMessage()
	{
		echo "A new student is born!\n";
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

	protected function birthMessage()
	{
		echo "A new programmer is born!\n";
	}
}
$student = new Student();
$student->giveBirth();

$programmer = new Programmer();
$programmer->giveBirth();

?>
