<?php
require('connect.php');
session_start();

if (isset($_POST["submit"])) {
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $res = $con->execute_query("SELECT * FROM customer WHERE username = ?", [$username]);

        if ($res->num_rows > 0) {
            foreach ($res as $r) {
                $creds = $r;
                break;
            }
            if ($password == $creds["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $creds["id"];
                header("Location: index.php");
                exit();
            } else {
                echo "<script> alert('Password does not match')</script>";
            }
        } else {
            echo "<script> alert('Invalid user account')</script>";
        }
    } elseif (isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        $duplicate = $con->execute_query("SELECT * FROM customer WHERE username = ?", [$username]);

        if ($duplicate->num_rows > 0) {
            echo "<script> alert('Username or Email has already been taken')</script>";
        } elseif ($password != $confirmpassword) {
            echo "<script> alert('Passwords do not match')</script>";
        } else {
            $registered = $con->execute_query("INSERT INTO customer (username, password) VALUES (?, ?)", [$username, $password]);
            echo "<script> alert('Registered Successfully')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
</head>
<body>
    <!-- Login Form -->
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
        <label for="username">Username or Email: </label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="submit" value="Login" class="login">Login</button>
    </form>
    <br>
    <a href="login.php">Don't have an account? Register here.</a>

    <hr>

    <!-- Register Form -->
    <h2>Register</h2>
    <form action="" method="post" autocomplete="off">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required><br>
        <label for="confirmpassword">Confirm Password: </label>
        <input type="password" name="confirmpassword" id="confirmpassword" required><br>
        <button type="submit" name="submit" value="Register" class="register">Register</button>
    </form>

    <br>
    <a href="login.php">Already have an account? Login here.</a>
</body>
</html>
