<?php
class Circle
{
	private $centerX;
	private $centerY;
	private $radius;

	public function __construct($centerX, $centerY, $radius)
	{
		$this->centerX = $centerX;
		$this->centerY = $centerY;
		$this->radius = $radius;
	}
	public function __toString()
	{
		return ("Коло з центром (" . ($this->centerX) . "," . ($this->centerY) . "), і радіусом " . ($this->radius));
	}
	// Getter methods
	public function getCenterX()
	{
		return $this->centerX;
	}

	public function getCenterY()
	{
		return $this->centerY;
	}

	public function getRadius()
	{
		return $this->radius;
	}

	// Setter methods
	public function setCenterX($centerX)
	{
		$this->centerX = $centerX;
	}

	public function setCenterY($centerY)
	{
		$this->centerY = $centerY;
	}

	public function setRadius($radius)
	{
		$this->radius = $radius;
	}

	public function intersects(Circle $otherCircle)
	{
		$distance = sqrt(pow($this->centerX - $otherCircle->getCenterX(), 2) + pow($this->centerY - $otherCircle->getCenterY(), 2));
		$sumOfRadii = $this->radius + $otherCircle->getRadius();
		return $distance <= $sumOfRadii;
	}
}

// Example usage:
$circle = new Circle(4, 2, 5);
echo $circle->__toString() . "<br>";

$circle->setCenterX(2);
$circle->setCenterY(3);
$circle->setRadius(7);
echo $circle->getCenterX() . '<br>';

$circle = new Circle(5, 10, 15);
echo $circle->__toString() . '<br>';


$circle2 = new Circle(2, 10, 15);

echo $circle2->intersects($circle) ? 'Перетиняєтся' : 'Не перетиняєтся';

?>