<?php
include ('connect.php');

$id = $_POST["id"];
 $res = $con->execute_query("DELETE FROM books WHERE id = ?", [$id]);

 header("Location: index.php");


//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 	$id = $POST["id"];

// 	$con->execute_query(
// 		"DELETE FROM books WHERE id=?",
// 		[$id]
// 	);

//     header("Location: index.php");
// }


//  foreach ($res as $book) {
//      $b = $book;
//  }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Back</a> <br>
<h1>Library</h1>
<h2>Book Details</h2>
<h3>Title</h3>
<p>
<?=
$b["title"]
?>
</p>
<h3>Author</h3>
<p>
<?=
$b["author"]
?>
<h3>Date</h3>
<p>
<?=
$b["publication_date"]
?>
<h3>Pages</h3>
<p>
<?=
$b["pages"]
?>
</body>
</html> -->

