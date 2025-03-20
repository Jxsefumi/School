<?php

include('connect.php');
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

$message = "Input a valid email address!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$contact = $_POST["contact"];
	$city = $_POST["city"];
	$municipality = $_POST["municipality"];
	$email = $_POST["email"];


    $valid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($valid) {
        $con->execute_query(
            "INSERT INTO customer ('name', contact, city, municipality, email) VALUES (?, ?, ?, ?, ?)",
            [$name, $contact, $city, $municipality, $email]
        );
        $last_id = $con->insert_id;
        header("Location: submit.php?id=$last_id");
        exit();
    } else {
        echo "<script>alert('$message');</script>";  
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Josefumi</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="image/icon2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body class="ordercss">
    <div id="main-nav">
        <a href="index.php" class="nav">Home</a>
        <a href="menu.php" class="nav">Menu</a>
        <a href="account.php" class="nav" id="click">Account</a>
    </div>
    <div class="form">
        <form method="POST">
        <input type="text" placeholder="Full Name" name="name" required>
        <input type="number" placeholder="Contact Number" name="contact" required>
        <input type="text" placeholder="City" name="city" required>
        <input type="text" placeholder="Municipality" name="municipality" required>
        <!-- <input type="text" placeholder="Zip Code"> -->
        <input type="email" placeholder="Email Address" name="email" required>
        <input type="submit" value="Submit" id="popup-button">
         <!-- <button id="b1" type="Submit">Submit</button> -->
        </form>

    </div>
    <div id="overlay"></div>
    <div id="popup">
      <!-- <iframe src="order.html" id="popup-iframe"></iframe> -->
    </div>
    <div class="transition2"></div>
    <!-- <script src="script.js"></script> -->
    <footer class="footer2">
        <div class="foot1">
        <p class="foor">©2023</p>
        <p class="foot">Josefumi's Food</p>
        <p class="foot">where you can find delicious foods every day!</p>
        </div>
        <div class="foot2">
        <p class="foot">Contact:</p>
        <p class="foot">Phone:09627843325</p>
        <a class="foot" href="mailto:Josefumi@business.com">Email:Josefumi@business.com</a>
        </div>
    </footer>
</body>
</html>