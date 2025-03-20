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