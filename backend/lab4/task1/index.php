<?php

require_once 'autoload.php';

use controllers\UserController;
use views\UserView;

$userController = new UserController();

$userController->showUser(123);

$userView = new UserView();

$userView->renderUser(["name" => "John", "age" => 30]);

?>