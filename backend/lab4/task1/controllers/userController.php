<?php

// require_once 'Models/UserModel.php';
namespace Controllers;

use models\UserModel;



/**
 * Class UserController
 * Контролер для управління користувачами.
 */
class UserController
{
	/**
	 * Показати деталі користувача за його ідентифікатором.
	 *
	 * @param int $id Ідентифікатор користувача.
	 */
	public function showUser($id)
	{
		$userModel = new UserModel();
		$user = $userModel->getUserById($id);
		echo "User details: $user";
	}
}
?>