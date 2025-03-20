<?php
require("connect.php");
session_start();
$creds = NULL;
if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $res = $con->execute_query("SELECT * FROM customer WHERE id = '$id'");
    foreach ($res as $r) {
        $creds = $r;
        break;
        } 
    } else {
        // header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $creds ? $creds["username"] : ''; ?></h1>
    <?php
        if (!empty($_SESSION["id"])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
    ?>
</html>