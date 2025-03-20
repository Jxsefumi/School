<?php
$con = mysqli_connect("localhost", "josefumi", "Gappy@123!", "josefumi");

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

$search = $_GET["search"] ?? null;

if ($search) {
	$res = $con->execute_query("SELECT * FROM books WHERE author LIKE ?", ["%$search%"]);
} else {
	$res = $con->execute_query("SELECT * FROM books");
}
?>

<style>
	table {
		border-collapse: collapse;
	}
	td, th {
		border: solid 1px black;
		padding: 4px 8px;
	}
	label {
		width: 60px;
		display: inline-block;
	}
	body {
		font-family: sans-serif;
	}
</style>

<h1><a href="/">Library System</a></h1>

<h2>Search</h2>
<form>
	<input name="search">
	<button>Search</button>
</form>

<h2>Register</h2>
<form method="POST">
	<label>ID:</label><input name="id" required><br>
	<label>Title:</label><input name="title" required><br>
	<label>Author:</label><input name="author" required><br>
	<label>Date:</label><input name="date"><br>
	<label>Pages:</label><input name="pages"><br>
	<button>Register</button>
</form>

<h2>Books</h2>
<table>
<tr>
	<th>Title</th><th>Author</th><th>Date</th><th>Pages</th><th>Actions</th>
</tr>
<?php
	foreach ($res as $book) {
		echo "<tr>" .
			"<td>" . $book["title"] . "</td>" .
			"<td>" . $book["author"] . "</td>" .
			"<td>" . $book["publication_date"] . "</td>" .
			"<td>" . $book["pages"] . "</td>" . 
            "<td><a href='view.php?id=". $book["id"]."'>view</a> ".  "</td>" . 
		"</tr>";
	}
?>
</table>