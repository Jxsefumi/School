<?php
require('connect.php');
session_start();

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
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
      box-sizing: border-box;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ddd;
      box-sizing: border-box; /* Ensure padding doesn't affect width */
    }

    .form-container button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .toggle-btn {
      text-align: center;
      margin-top: 10px;
      cursor: pointer;
      color: #4CAF50;
    }

    /* Hide the registration form by default */
    .register-form {
      display: none;
    }

    /* Flex container for side-by-side inputs */
    .form-row {
      display: flex;
      justify-content: space-between;
      gap: 10px; /* Adds space between the input boxes */
    }

    .form-row input {
      width: 48%; /* Make each input take up roughly half of the width */
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>
<body>
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

  <script>
    function toggleForm() {
      var loginForm = document.getElementById("login-form");
      var registerForm = document.getElementById("register-form");

      // Toggle visibility between login and register forms
      if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
      } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
      }
    }

    // Initially show the login form, hide the register form
    document.getElementById("login-form").style.display = "block";
    document.getElementById("register-form").style.display = "none";
  </script>
</body>
</html>
