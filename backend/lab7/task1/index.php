<?php

// session_destroy();
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: personal_page.php');
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username === 'user' && $password === 'password') {

        $_SESSION['loggedin'] = true;
        ob_start();

        echo "Ви увійшли до системи!";

        $_SESSION['messages'] = ob_get_clean();

        

        header('Location: personal_page.php');
        exit;
    } else {
        echo "Невірне ім'я користувача або пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Вхід у систему</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Ім'я користувача:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Увійти">
    </form>

</body>
</html>
