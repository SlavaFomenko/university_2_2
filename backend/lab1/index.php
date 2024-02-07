<?php
echo "<pre>Полину в мріях в купель океану, </br>Відчую <b>шовковистість</b> глибини,</br> Чарівні мушлі з дна собі дістану,</br>   Щоб<b> <em>взимку</em></b ></br>      <u>тішили</u></br>         мене</br>            вони...</pre>";
?>

<?php
$num = 3800;
echo $num, " грн. можна обміняти на ", round($num / 38, 2), " доларів</br>";
?>

<?php
$month = 7;
$season = "зима";
if ($month >= 3 && $month <= 5) {
	$season = "весна";
} elseif ($month >= 6 && $month <= 8) {
	$season = "літо";
} elseif ($month >= 9 && $month <= 11) {
	$season = "осінь";
}
echo "Сезон для місяця $month - $season</br>";
?>

<?php
$char = 'o';
$result = 'приоголосна';

switch (strtolower($char)) {
	case 'a':
	case 'e':
	case 'i':
	case 'o':
	case 'u':
		$result = "голосна";
		break;
}
echo "Символ '$char' є $result </br>";
?>


<?php
$num = 360;
echo 'num = ', $num, '<br>';
[$num1, $num2, $num3] = str_split($num);

$sum = $num1 + $num2 + $num3;
echo '1. ', $sum, '<br>';

echo '2. ', $num3, $num2, $num1, '<br>';

$big_num = str_split((string) $num);
rsort($big_num);
echo '3. ', (int) implode('', $big_num), '<br>';
?>




<?php
function generateColorTable($rows, $cols)
{
	echo "<table border='1'>";
	for ($i = 0; $i < $rows; $i++) {
		echo "<tr>";
		for ($j = 0; $j < $cols; $j++) {
			$r = mt_rand(0, 255);
			$g = mt_rand(0, 255);
			$b = mt_rand(0, 255);
			echo "<td style='background-color: rgb($r,$g,$b); width: 50px; height: 50px;'></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

function generateRandomSquares($n)
{
	echo "<div style='position: relative;width: 500px; height: 500px; background-color: black;'>";
	for ($i = 0; $i < $n; $i++) {
		$size = mt_rand(40, 100);
		$left = mt_rand(0, 400);
		$top = mt_rand(0, 400);
		echo "<div style='position: absolute; width: $size" . "px; height: $size" . "px; background-color: red; left: $left" . "px; top: $top" . "px;'></div>";
	}
	echo "</div>";
}

generateColorTable(3, 8);
generateRandomSquares(4);
?>