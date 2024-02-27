<?php

/**
 * Функція для автопідключення класів.
 *
 * @param string $className Ім'я класу, який потрібно підключити.
 */
function autoload($className)
{
	$className = str_replace('\\', '/', $className);
	$path = __DIR__ . '/' . $className . '.php';
	if (file_exists($path)) {
		require_once $path;
	}
}

spl_autoload_register('autoload');
?>