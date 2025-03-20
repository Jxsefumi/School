<?php 
$slay = mysqli_connect("localhost", "registrar", "university", "registrar");

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    $names = $_POST["names"];
    $groups = $_POST["groups"];

    $slay->execute_query(
        "INSERT INTO students VALUES (?, ?)",
        [$names, $groups]
    );
}

 $resA = $slay->execute_query("SELECT * FROM students WHERE groups = 'A'");
 $resB = $slay->execute_query("SELECT * FROM students WHERE groups = 'B'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
    <form method="POST">
    <label>Name:</label><input name="names" required> <br>
    <select name="groups">
        <option value="A" selected>A</option>
        <option value="B">B</option>
    </select> <br>
    <button>ADD</button>
</form>
<h2>Group A</h2>
    <ul>
<?php 
    foreach ($resA as $namess) {
        ?>
        <li> <?php
        echo $namess["names"] . "\n";
        ?> </li> <?php
    };
?>
    </ul>
    <h2>Group B</h2>
    <ul>
<?php 
    foreach ($resB as $namess) {
        ?>
        <li> <?php
        echo $namess["names"] . "\n";
        ?> </li> <?php
    };
?>
    </ul>
</body>
</html>