<?php
if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    // Перевірка логіну та паролю
    // Здесь вы можете реализовать вашу проверку логина и пароля

    // Папка користувача
    $userDirectory = "users/$login";
    
    // Перевірка, чи папка користувача існує
    if (file_exists($userDirectory)) {
        // Видалення папки користувача з усім вмістом
        $deleted = deleteDirectory($userDirectory);
        if ($deleted) {
            echo "Папка для користувача $login та весь вміст успішно видалені.";
        } else {
            echo "Сталася помилка під час видалення папки для користувача $login.";
        }
    } else {
        echo "Папка для користувача $login не існує.";
    }
}

// Функція для видалення папки з вмістом
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}
?>
