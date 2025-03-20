<?php
include ('connect.php');

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

<a href="create.php"><h2>Register</h2></a>

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
            "<td><a href='view.php?id=". $book["id"]."'>view</a> 
				<form method='POST' action='delete.php'>
					<input name='id' type='hidden' value=" . $book["id"] . ">
					<button>Delete</button>
				</form> 
			</td>" . 
		"</tr>";
	}
?>
</table>