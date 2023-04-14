<!DOCTYPE html>
<html>
<head>
<title>php db</title>
</head>
<body>
<h2>product validation form</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label>product_name:</label>
<input type="text" name="productname"><br><br>
<label>description:</label>
<input type="textl" name="description"><br><br>
<label>price:</label>
<input type="text" name="price"><br><br>
<input type="submit" name="submit" value="Register">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['productname'];
$description = $_POST['description'];
$price = $_POST['price'];

// Validate input
if (empty($name) || empty($description) || empty($price)) {
echo "All fields are required.";
} 
else {
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Insert data into table
$sql = "INSERT INTO product65 (productname, description, price) VALUES ('$name', '$description', '$price')";
if ($conn->query($sql) === TRUE) {
echo "product successfully inserted into the table.";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
?>
</body>
</html>