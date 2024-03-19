<?php

header("Cache-Control: no-cache, must-revalidate");// Запобігання кешування сторінки браузеро

if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();

    $_SESSION['username'] = $_POST["username"];
    header("Location: personal_page.php");
    exit();
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
    <h2>Реєстрація нового користувача</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Ім'я користувача:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Зареєструватися">
    </form>
</body>
</html>
