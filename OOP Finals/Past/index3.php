    <?php
    $username = $_GET["username"] ?? null;
    $password = $_GET["password"] ?? null;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
    <label>Username</label>
    <input name="username"> <br>
    <label>Password</label>
    <input name="password" type="password" required>
    <button>Login</button>
</form>

<?php if ($username == "Lugada" && $password == "magic") { ?>
<p>Logged in </p> <?php } else { ?> 
<p>Your login is incorrect</p>
<?php } ?>
</body>
</html>