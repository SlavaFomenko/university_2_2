<?php
namespace views;

/**
 * Class UserView
 * Представлення для відображення даних користувача.
 */
class UserView
{
	/**
	 * Відобразити дані користувача.
	 *
	 * @param mixed $userData Дані користувача.
	 */
	public function renderUser($userData)
	{
		// Демонстраційний код виведення даних про користувача. Можна відформатувати як завгодно.
		echo "<pre>";
		print_r($userData);
		echo "</pre>";
	}
}
?>