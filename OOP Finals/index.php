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
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Josefumi</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="image/icon2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="main-nav">
        <a href="index.php" class="nav" id="click">Home</a>
        <a href="menu.php" class="nav">Menu</a>
        <a href="account.php" class="nav">Account</a>
    </div>
    <img src="image/banner.jpg"> <!-- image taken from https://www.freepik.com/free-psd/food-menu-restaurant-facebook-cover-template_15950765.htm#query=food%20banner&position=1&from_view=keyword&track=ais&uuid=5d7886a3-20ea-4cb9-b70c-7708f896b2f1-->
    <div class="foods">
    <div class="border">
        <img src="image/pizza1.jpg" class="size1">
        <a href="menu.php" class="a1" id="pizza">Pizza</a>
    </div>
    <div class="border">
        <img src="image/ramen1.jpg" class="size1">  
        <a href="menu.php" class="a1" id="ramen">Ramen</a>
    </div>
    <div class="border">
        <img src="image/fries.jpg" class="size1">
        <a href="menu.php" class="a1" id="fries">Fries</a>
    </div>
    <div class="border">
        <img src="image/tonkatsu.jpg" class="size1">
        <a href="menu.php" class="a1" id="tonkatsu">Tonkatsu</a>
        <iframe src="media/index.html" frameborder="0" style="
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 350px;
        height: 80px;
        z-index: 999;
      "></iframe>
    </div>
    </div>
  <!-- <div>
        <a href="menu.html" id="Menuc">Menu</a>
    </div> -->
    <div class="transition"></div>
    <footer class="footer">
        <div class="foot1">
        <p class="foot">©2023</p>
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