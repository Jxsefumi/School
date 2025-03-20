<?php

require("connect.php");

// $username = $_POST["username"];
// $email = $_POST["email"];
// $fname = $_POST["fname"];
// $lname = $_POST["lname"];
// $contact = $_POST["contact"];
// $city = $_POST["city"];
// $municipality = $_POST["municipality"];

// Sample data structure for $creds
$creds = [
    'fname' => 'John', // Example first name
    'lname' => 'Doe',  // Example last name
    'email' => 'john.doe@example.com',
    'contact' => '123-456-7890',
    'city' => 'Cityname',
    'municipality' => 'Municipalityname'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $creds['fname']; ?>!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f9f9f9, #f1f1f1);
            color: #333;
            text-align: center;
            padding: 50px 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 36px;
            color: #2d3e50;
        }

        .cart-btn {
            padding: 12px 25px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cart-btn:hover {
            background-color: #45a049;
        }

        .info {
            margin-top: 30px;
            font-size: 18px;
            text-align: left;
        }

        .info div {
            padding: 12px 0;
            border-bottom: 1px solid #ddd;
        }

        .info div:last-child {
            border-bottom: none;
        }

        .logout-btn {
            background-color: #ff6347;
            color: #fff;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 30px;
            text-decoration: none;
            margin-top: 40px;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #e55347;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Welcome <?php echo $creds['fname']; ?>!</h1>
        <a href="cart.php" class="cart-btn">Cart</a>
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

</body>
</html>