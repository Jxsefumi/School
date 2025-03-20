<?php
require('connect.php');
session_start();

$creds = NULL;
if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $res = $con->execute_query("SELECT * FROM customer WHERE id = '$id'");
    foreach ($res as $r) {
        $creds = $r;
        break;
        } 
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["login"])) {
        // Login form submission
        // $username = $_POST["username"];
        $usernameemail = $_POST["usernameemail"];
        $password = $_POST["password"];
        // $email = $_POST["email"];
        $res = $con->execute_query("SELECT * FROM customer WHERE username = ? OR email = ?", [$usernameemail, $usernameemail]);

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
        // Registration form submission
        $username = $_POST["username"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $contact = $_POST["contact"];
        $city = $_POST["city"];
        $municipality = $_POST["municipality"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        $duplicate = $con->execute_query("SELECT * FROM customer WHERE username = ? OR email = ?", [$username, $email]);

        if ($duplicate->num_rows > 0) {
            echo "<script> alert('Username has already been taken')</script>";
        } elseif ($password != $confirmpassword) {
            echo "<script> alert('Passwords do not match')</script>";
        } else {
            $registered = $con->execute_query("INSERT INTO customer (username, password, email, fname, lname, contact, city, municipality) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$username, $password, $email, $fname, $lname, $contact, $city, $municipality]);
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
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
  if (!empty($_SESSION["id"])) {
      // If there's an active session, display "Hello world"
      echo 'Hello world';
  } else {
?>
  <div class="form-container">
    <!-- Login Form -->
    <div id="login-form" class="login-form">
      <h2>Login</h2>
      <form method="POST">
        <input type="text" name="usernameemail" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <div class="toggle-btn" onclick="toggleForm()">Don't have an account? Register</div>
    </div>

    <!-- Registration Form -->
    <div id="register-form" class="register-form">
      <h2>Register</h2>
      <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        
        <!-- First Name and Last Name Side by Side with space between -->
        <div class="form-row">
          <input type="text" name="fname" placeholder="First Name" required>
          <input type="text" name="lname" placeholder="Last Name" required>
        </div>

        <input type="number" name="contact" placeholder="Contact #" required>

        <!-- City and Municipality Side by Side with space between -->
        <div class="form-row">
          <input type="text" name="city" placeholder="City" required>
          <input type="text" name="municipality" placeholder="Municipality" required>
        </div>

        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
        <button type="submit" name="register">Register</button>
      </form>
      <div class="toggle-btn" onclick="toggleForm()">Already have an account? Login</div>
    </div>
  </div>
<?php
  }
?>

  <script src="script.js"></script>
</body>
</html>
