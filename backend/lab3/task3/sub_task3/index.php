<?php
$words = file_get_contents('./words.txt');
$words = explode(' ', $words);

sort($words);

foreach ($words as $word) {
	echo $word . "\n";
}
?>