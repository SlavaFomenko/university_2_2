<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Операція</th>
            <th>Рузультат</th>
        </tr>
        <?php
        require 'Function/func.php';

        $x = $_POST['x'];
        $y = $_POST['y'];

        $operations = array(
            "sin($x)" => my_sin($x),
            "cos($x)" => my_cos($x),
            "tan($x)" => my_tan($x),
            "x^y" => my_pow($x, $y),
            "x!" => factorial($x)
        );

        foreach ($operations as $operation => $result) {
            echo "<tr><td>$operation</td><td>$result</td></tr>";
        }
        ?>
    </table>
</body>

</html>