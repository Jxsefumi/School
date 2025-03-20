<?php
require('connect.php');
session_start();

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = $con->execute_query("SELECT * FROM customer WHERE username = ?",
    [$username]
    );
    if ($duplicate->num_rows > 0) {
        echo 
        "<script> alert('Username Has Already been taken')</script>";
    } else if ($password != $confirmpassword) {
        echo 
        "<script> alert('Password does not match')</script>";
    } else {
        if ($password == $confirmpassword) {
            $registered = $con->execute_query("INSERT INTO customer (username, password) VALUES (?, ?)",
            [$username, $password]
        );
        echo 
        "<script> alert('Registered Successfully')</script>";
        }
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
    <label for="name">Name : </label>
    <input type="text" name="name" id="name" required value=""> <br>
    <label for="username">Username: </label>
    <input type="text" name="username" id = "username" required value=""> <br> 
    <label for="emai">Email : </label>
    <input type="email" name="email" id="email" required value=""> <br> 
    <label for="password">Password : </label>
    <input type="password" name="password" id = "password" required value=""> <br>
    <label for="confirmpassword">Confirm Password: </label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br> 
    <button type="submit" name="submit">Register</button>

    <a href="login.php">Login</a>
</form>
</body>
</html>