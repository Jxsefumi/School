<?php
require('connect.php');
session_start();

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res = $con->execute_query("SELECT * FROM customer WHERE username = '$username'");

    if ($res->num_rows > 0) {
        foreach ($res as $r) {
            $creds = $r;
            break;
        }
    if ($password == $creds["password"]) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $creds["id"];
        header("Location:index.php");
        exit();
    } else {
        echo 
        "<script> alert('Password does not match')</script>";
        }
      } else {
        echo "<script> alert('Invalid user account')</script>";
    }
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

    <form class="" action="" method="post" autocomplete="off">
    <label for="usernamel">Username or Email : </label>
    <input type="text" name="username" id="username" required value=""> <br> 
    <label for="password">Password</label>
    <input type="password" name="password" id = "password" required value=""> <br> 
    <button type="submit" name="submit">Login</button>
</form>
</body>
</html>