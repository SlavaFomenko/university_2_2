<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lab7_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $post_content = $_POST['post_content'];

    ob_start();
    echo $post_content;
    $buffered_content = ob_get_contents();
    ob_end_clean();

    $stmt = $conn->prepare("INSERT INTO post (user_name, post_content) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_name, $buffered_content);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "User Name: " . $row["user_name"]. "<br>";
        echo "Post Content: " . $row["post_content"]. "<br>";
        echo "<hr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    User name: <input type="text" name="user_name"><br>
    Post Content: <textarea name="post_content"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>
