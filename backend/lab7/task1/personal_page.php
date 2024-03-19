<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

if(isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
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

    <h2>Особиста сторінка</h2>
    
    <?php
    if(isset($_SESSION['messages'])) {
				echo $_SESSION['messages'];
        unset($_SESSION['messages']);
    }
    ?>

    <p>Це ваша особиста сторінка. Ласкаво просимо!</p>

    <a href="personal_page.php?logout=true">Вийти</a>

</body>
</html>
