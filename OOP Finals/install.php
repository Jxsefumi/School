<?php

$con = mysqli_connect("localhost", "Order", "Order", "Order");

$con->execute_query("CREATE TABLE IF NOT EXISTS customer (
    id INTEGER AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(200) UNIQUE NOT NULL,
    password VARCHAR(200) NOT NULL,
    email VARCHAR(200) UNIQUE NOT NULL,
    fname VARCHAR(200) NOT NULL,
    lname VARCHAR(200) NOT NULL,
    contact INTEGER NOT NULL,
    city VARCHAR(200) NOT NULL,
    municipality VARCHAR(200) NOT NULL)");

$con->execute_query("CREATE TABLE IF NOT EXISTS products (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(200) NOT NULL,
    price FLOAT NOT NULL)");

$con->execute_query("CREATE TABLE IF NOT EXISTS cart (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    product_name VARCHAR(200) NOT NULL,
    quantity INTEGER NOT NULL,
    price FLOAT NOT NULL,
    total FLOAT NOT NULL)");

?>