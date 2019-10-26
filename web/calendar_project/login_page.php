<?php
    require_once("db.php");
    $db = get_db();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login_form.css">
    <title>Loginpage</title>
</head>
<body>
    <header>
        <h1 class="txt_cen">Welcome to Calendar Project</h1>
    </header>

    <form class="login_f" action="calendar.php" method="POST">
        <h1>Login</h1>
        
        <div class="txtb">
            <input type="text" placeholder="Username" name="user_acc">         
        </div>

        <div class="txtb">
            <input type="password" placeholder="Password" name="pass_acc">
        </div>

        <input type="submit" class="lgn_but" value="login">

        <div class="acc_btn">
            Create an Account <a href="create_acc.php">Sign Up</a>
        <div>

    </form>

    
</body>
</html>