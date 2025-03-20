<?php 
require("connect.php");
session_start();
$menu = $con->execute_query("SELECT * FROM products");
if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $res = $con->execute_query("SELECT * FROM customer WHERE id = '$id'");
    foreach ($res as $r) {
        $creds = $r;
        break;
        } 
    } else {
        header("Location:account.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu - Order Now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div id="main-nav">
        <a href="index.php" class="nav">Home</a>
        <a href="menu.php" class="nav" id="click">Menu</a>
        <a href="account.php" class="nav">Account</a>
    </div>
    <link rel="stylesheet" href="styles.css">
    </header>

    <div class="container">
        <h2>Our Menu</h2>
        <p class="no-items">Select your favorite dishes and add them to your cart.</p>
        
        <div class="menu-table">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($menu as $menus) { ?>
                    <tr>
                        <td><?= $menus['product_name'] ?></td>
                        <td class="price"><?="$" . number_format($menus['price'], 2) ?></td>
                        <td>
                            <form method="POST" action="purchase.php">
                                <input type="hidden" name="id" value="<?= $menus['id'] ?>">
                                <input type="hidden" name="product_name" value="<?=$menus['product_name'] ?>">
                                <input type="hidden" name="price" value="<?=$menus['price'] ?>">
                                <button type="submit">Add to cart</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>