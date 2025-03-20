<?php
include ('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST["id"];
	$title = $_POST["title"];
	$author = $_POST["author"];
	$date = $_POST["date"];
	$pages = $_POST["pages"];

	$con->execute_query(
		"INSERT INTO books VALUES (?, ?, ?, ?, ?)",
		[$id, $title, $author, $date, $pages]
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
	<label>ID:</label><input name="id" required><br>
	<label>Title:</label><input name="title" required><br>
	<label>Author:</label><input name="author" required><br>
	<label>Date:</label><input name="date"><br>
	<label>Pages:</label><input name="pages"><br>
	<button>Register</button>
</form>
</body>
</html>

