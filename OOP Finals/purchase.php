<?php

require("connect.php");

session_start();
$creds = NULL;
$product_name = $_POST["product_name"];
$price = $_POST["price"];
if(!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $res = $con->execute_query("SELECT * FROM customer WHERE id = '$id'");
    foreach ($res as $r) {
        $creds = $r;
        break;
        } 
    }

$purchase = $con->execute_query("SELECT * FROM cart WHERE product_name = ? AND user_id = ?", [$product_name, $id]);
if ($purchase->num_rows > 0) {
    $con->execute_query("UPDATE cart SET quantity = quantity + 1 WHERE product_name = ? AND user_id = ?", [$product_name, $id]);
    header("Location: order.php");
} else {
    $con->execute_query("INSERT INTO cart (user_id, product_name, price, quantity) VALUES (?, ?, ?, 1)", [$id, $product_name, $price]);
    header("Location: order.php");
}
?>