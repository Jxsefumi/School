<?php
include ('connect.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$product_name = $_POST["product_name"];
	$price = $_POST["price"];


	$con->execute_query(
		"INSERT INTO products (product_name, price) VALUES (?, ?)",
		[$product_name, $price]
	);
}

?>

<style>
    label {
        width: 65px;
        display: inline-block;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Back</a> <br>
<h3>Register</h3>
<form method="POST">
	<label>Product Name:</label><input name="product_name" required><br>
	<label>Price:</label><input name="price" required><br>
	<button>Input</button>
</form>
</body>
</html>

