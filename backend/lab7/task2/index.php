<?php
function getMenuItemsFromDB() {
	$conn = mysqli_connect("localhost", "root", "root", "lab5");
    if (!$conn) {
        die("Помилка підключення до БД: " . mysqli_connect_error());
    }
    

    $sql = "SELECT * FROM tov";
    $result = mysqli_query($conn, $sql);
    

    if (mysqli_num_rows($result) > 0) {
        $menuItems = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $menuItems[] = $row['name'];
        }

        return $menuItems;
    } else {
        return array(); 
    }
    
    mysqli_close($conn);
}

function generateMenu() {
    if (file_exists('cache/menu_cache.html') && (time() - filemtime('cache/menu_cache.html') < 3600)) {
        include 'cache/menu_cache.html';
    } else {
        $menuItems = getMenuItemsFromDB();
        
        ob_start();
        
        echo '<ul>';
        foreach ($menuItems as $item) {
            echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
        
        $menuContent = ob_get_clean();
        file_put_contents('cache/menu_cache.html', $menuContent);
        
        echo $menuContent;
    }
}



function addItemToMenu($itemName) {
    $conn = mysqli_connect("localhost", "root", "root", "lab5");
  
    if (!$conn) {
        die("Помилка підключення до БД: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO tov (name) VALUES ('$itemName')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Пункт меню успішно додано.";
    } else {
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}


function deleteMenuItem($itemName) {
	$conn = mysqli_connect("localhost", "root", "root", "lab5");
    $sql = "DELETE FROM tov WHERE name='$itemName'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Пункт меню успішно видалено.";
    } else {
        echo "Помилка: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Management</title>
</head>
<body>

<form method="post" action="">
    <input type="text" name="newItemName" placeholder="Назва нового пункту" required>
    <input type="submit" name="addItem" value="Додати пункт">
</form>

<?php
$menuItems = getMenuItemsFromDB();
foreach ($menuItems as $item) {
    echo "<p>$item</p>";
}
?>

<form method="post" action="">
    <input type="text" name="itemNameToDelete" placeholder="Назва пункту для видалення" required>
    <input type="submit" name="deleteItem" value="Видалити пункт">
</form>

<?php
if(isset($_POST['addItem'])){
    $itemName = $_POST['newItemName'];
    addItemToMenu($itemName);
}

if(isset($_POST['deleteItem'])){
    $itemNameToDelete = $_POST['itemNameToDelete'];
    deleteMenuItem($itemNameToDelete);
}
?>

</body>
</html>
