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
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="image/icon2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body id="hays">
    <div id="main-nav">
        <a href="index.php" class="nav">Home</a>
        <a href="menu.php" class="nav" id="click">Menu</a>
        <a href="account.php" class="nav">Account</a>
    </div>
    <div class="menufoods">
        <marquee class="hmm" behavior="scroll" direction="left" scrollamount="20">
            <h1 id="hmm"> CLICK THE IMAGE TO BUY THE ITEM!!!</h1>
          </marquee>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/pizza1.jpg" class="size2"></a>
            <div><h1>Pepperoni Pizza</h1></div>
            <div><p>For only $5.00 you can eat this Pizza!</p></div>
            <!-- <a href="order.php" class="menu3" id="menu3">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/pizza2.jpg" class="size2"></a>
            <div><h1>Cheese Pizza</h1></div>
            <div><p>For only $5.99 you can eat this Cheesy Pizza!</p></div>
            <!-- <a href="order.php" class="menu4" id="menu4">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/pizza3.jpg" class="size2"></a>
            <div><h1>Pizza with Veggies</h1></div>
            <div><p>For only $7.99 you can eat this Veggie Pizza!</p></div>
            <!-- <a href="order.php" class="menu5" id="menu5">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/ramen1.jpg" class="size2"></a>
            <div><h1>Special Ramen</h1></div>
            <div><p>For only $10.00 you can eat this Special Ramen!</p></div>
            <!-- <a href="order.php" class="menu6" id="menu6">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/ramen2.jpg" class="size2"></a>
            <div><h1>Spicy Ramen</h1></div>
            <div><p>For only $9.49 you can eat this Spicy Ramen!</p></div>
            <!-- <a href="order.php" class="menu7" id="menu7">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/ramen3.jpg" class="size2"></a>
            <div><h1>Tonkatsu Ramen</h1></div>
            <div><p>For only $10.49 you can eat this Tonkatsu Ramen!</p></div>
            <!-- <a href="order.php" class="menu8" id="menu8">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/sushi.jpg" class="size2"></a>
            <div><h1>Sushi Platter</h1></div>
            <div><p>For only $9.99 you can eat this Sushi Platter!</p></div>
            <!-- <a href="order.php" class="menu9" id="menu9">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/tonkatsu.jpg" class="size2"></a>
            <div><h1>Tonkatsu</h1></div>
            <div><p>For only $7.49 you can eat this Tonkatsu!</p></div>
            <!-- <a href="order.php" class="menu10" id="menu10">></a> -->
        </div>
        <div class="space">
            <a href="order.php" class="buy"><img src="image/fries.jpg" class="size2"></a>
            <div><h1>Fries</h1></div>
            <div><p>For only $3.99 you can eat this Fries!</p></div>
            <!-- <a href="order.php" class="menu11" id="menu11">></a> -->
        </div>
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
    <div class="transition3"></div>
    <footer class="footer3">
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