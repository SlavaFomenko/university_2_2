<?php
class TextFileManager
{
	public static $dir = "text";

	public static function readFromFile($filename)
	{
		$filePath = self::$dir . "/" . $filename;
		if (file_exists($filePath)) {
			$content = file_get_contents($filePath);
			return $content;
		} else {
			return "File not found!";
		}
	}

	public static function writeToFile($filename, $text)
	{
		$filePath = self::$dir . "/" . $filename;
		file_put_contents($filePath, $text, FILE_APPEND);
		return "Text appended to file successfully!";
	}

	public static function clearFile($filename)
	{
		$filePath = self::$dir . "/" . $filename;
		file_put_contents($filePath, "");
		return "File content cleared successfully!";
	}
}


mkdir(TextFileManager::$dir);
file_put_contents(TextFileManager::$dir . "/file1.txt", "Text file 1 content\n");
file_put_contents(TextFileManager::$dir . "/file2.txt", "Text file 2 content\n");
file_put_contents(TextFileManager::$dir . "/file3.txt", "Text file 3 content\n");

echo "Reading file 1:\n";
echo TextFileManager::readFromFile("file1.txt") . "\n";

echo "Appending text to file 2:\n";
echo TextFileManager::writeToFile("file2.txt", "text1\n");

echo "Reading file 2 after appending text:\n";
echo TextFileManager::readFromFile("file2.txt") . "\n";

echo "Clearing content of file 
3:\n";
echo TextFileManager::clearFile("file3.txt") . "\n";

echo "Reading file 3 after clearing content:\n";
echo TextFileManager::readFromFile("file3.txt") . "\n";

unlink(TextFileManager::$dir . "/file1.txt");
unlink(TextFileManager::$dir . "/file2.txt");
unlink(TextFileManager::$dir . "/file3.txt");
rmdir(TextFileManager::$dir);
?>