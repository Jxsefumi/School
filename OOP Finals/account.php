<?php
require('connect.php');
session_start();
$creds = NULL;
$sum = NULL;
$cart = [];
if(isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $res = $con->execute_query("SELECT * FROM customer WHERE id = '$id'");
    $cart = $con->execute_query("SELECT * FROM cart WHERE user_id = ?", [$_SESSION['id']]);
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
                header("Location: account.php");
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
  <link rel="icon" href="image/icon2.png">
  <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
  if (!empty($_SESSION["id"])) { ?>
  <div id="main-nav">
        <a href="index.php" class="nav">Home</a>
        <a href="menu.php" class="nav">Menu</a>
        <a href="account.php" class="nav" id="click">Account</a>
    </div>
        <div class="container">
        <div class="header">
            <h1>Welcome <?php echo $creds['fname']; ?>!</h1>
            <button class="cart-btn" onclick="openCartPopup()">View Cart</button>
        </div>

        <div class="info">
            <div><strong>Full Name:</strong> <?php echo $creds['fname'] . ' ' . $creds['lname']; ?></div>
            <div><strong>Email:</strong> <?php echo $creds['email']; ?></div>
            <div><strong>Contact:</strong> <?php echo $creds['contact']; ?></div>
            <div><strong>City:</strong> <?php echo $creds['city']; ?></div>
            <div><strong>Municipality:</strong> <?php echo $creds['municipality']; ?></div>
        </div>

        <div class="footer">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div> 
    <?php
  } else {
?>
  <div class="form-container">
  <div id="main-nav">
        <a href="index.php" class="nav">Home</a>
        <a href="menu.php" class="nav">Menu</a>
        <a href="account.php" class="nav"  id="click">Account</a>
    </div>
    <!-- Login Form -->
    <div id="login-form">
    <!-- <div class="toggle-btn"><a style="text-decoration:none" href="index.php" class="toggle-btn">Home</a></div> -->
      <h2>Login</h2>
      <form method="POST">
        <input type="text" name="usernameemail" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <div class="toggle-btn" onclick="toggleForm()">Don't have an account? Register</div>
    </div>

    <!-- Registration Form -->
    <div id="register-form">
    <!-- <div class="toggle-btn"><a style="text-decoration:none" href="index.php" class="toggle-btn">Home</a></div> -->
      <h2>Register</h2>
      <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        
        <div class="form-row">
          <input type="text" name="fname" placeholder="First Name" required>
          <input type="text" name="lname" placeholder="Last Name" required>
        </div>

        <input type="number" name="contact" placeholder="Contact #" required>

        <div class="form-row">
          <input type="text" name="city" placeholder="City" required>
          <input type="text" name="municipality" placeholder="Municipality" required>
        </div>

        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
        <button type="submit" name="register">Register</button>
      </form>
      <div class="toggle-btn" onclick="toggleForm()">Already have an account? Login
      </div>
    </div>
  </div>
<?php
  }
?>
  <div id="cart-popup">
      <div class="cart-container">
          <button class="close-cart-btn" onclick="closeCartPopup()">X</button>
          <div class="cart-content">
              <h2>Your Cart:</h2>
                <ul>
                  <?php foreach ($cart as $c) { ?>
                    <li>
                      <strong>Product:</strong> <?= $c['product_name'] . ' ' ?><Strong>Quantity: <?= $c['quantity'] ?></strong><br>
                      <strong>Price:</strong> <?= "$" . $c['price'] . ' ' ?><strong>Total: <?= "$" . $c['price'] * $c['quantity'] ?></strong><br> <br>
                        <form method="POST" action="purchase.php">
                          <input type="hidden" name="id" value="<?= $c['id'] ?>">
                          <input type="hidden" name="product_name" value="<?=$c['product_name'] ?>">
                          <input type="hidden" name="price" value="<?=$c['price'] ?>">
                        </form>
                    </li>
                  <?php 
                      $sum = $sum + $c['price'] * $c['quantity'];
                  } ?>
                </ul>
                <strong><?php 
                echo "Your Total is: " . $sum;
                ?>
                </strong>
              <a class="cart-btn" href="Success.html">Checkout</a>
          </div>
      </div>
  </div>

  <script>
            document.getElementById("login-form").style.display = "block";
            document.getElementById("register-form").style.display = "none";
      function toggleForm() {
        var loginForm = document.getElementById("login-form");
        var registerForm = document.getElementById("register-form");

        if (loginForm.style.display === "none") {
          loginForm.style.display = "block";
          registerForm.style.display = "none";
        } else {
          loginForm.style.display = "none";
          registerForm.style.display = "block";
        }
      }
  
      

      function openCartPopup() {
        document.getElementById('cart-popup').style.display = 'flex';
    }

    function closeCartPopup() {
        document.getElementById('cart-popup').style.display = 'none';
    }
  </script>
</body>
</html>
