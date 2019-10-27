<?php
    session_start();
    $_SESSION['message_u'] = '';
    $_SESSION['message_p'] = '';


    $ua = htmlspecialchars($_POST["user_acc"]);
    $pa = htmlspecialchars($_POST["pass_acc"]);

    require_once("db.php");
    $db = get_db();

    $query = 'SELECT u_username, u_password FROM user_info WHERE u_username=:ua AND u_password=:pa';
    $statement = $db->prepare($query);
    $statement -> bindValue(':ua', $ua, PDO::PARAM_STR);
    $statement -> bindValue(':pa', $pa, PDO::PARAM_STR);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($users[0]['u_username'] != $ua) {
            $_SESSION['message_u'] = "This username does not exist";
            header("Location: login_page.php");
            
        }
        else if ($users[0]['u_password'] != $pa){
            $_SESSION['message_p'] = "The password is invalid";
            header("Location: login_page.php");
        }
        else {
            header("Location: calendar.php");
        }
    }

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

    <form class="login_f" action="login_page.php" method="POST">
        <h1>Login</h1>
        
        <div class="txtb">
            <input type="text" placeholder="Username" name="user_acc" required />         
        </div>
        <div class="errormessage">
        <?= $_SESSION['message_u'] ?>
        </div>
        <div class="txtb">
            <input type="password" placeholder="Password" name="pass_acc" required />
        </div>
        <div class="errormessage">
        <?= $_SESSION['message_p'] ?>
        </div>
        <input type="submit" class="lgn_but" value="login">

        <div class="acc_btn">
            Create an Account <a href="create_acc.php">Sign Up</a>
        <div>

    </form>

    
</body>
</html>