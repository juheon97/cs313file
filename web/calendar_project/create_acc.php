<?php

    session_start();

    $fn = htmlspecialchars($_POST["fname"]);
    $ln = htmlspecialchars($_POST["lname"]);
    $np = htmlspecialchars($_POST["npass"]);
    $un = htmlspecialchars($_POST["nuser"]);
    

    require_once("db.php");
    $db = get_db();

    $query = 'SELECT u_username FROM user_info WHERE u_username=:un';
    $statement = $db->prepare($query);
    $statement -> bindValue(':un', $un, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($user[0]['u_username'] === $un) {
            $_SESSION['message'] = "This username already exists";
        }
        else {
            $query2 = 'INSERT INTO user_info (u_username, u_password, first_name, last_name) VALUES (:un, :np, :fn, :ln)';
            $stmt = $db -> prepare($query2);
            $stmt->bindValue(':un', $un, PDO::PARAM_STR);
            $stmt->bindValue(':np', $np, PDO::PARAM_STR);  
            $stmt->bindValue(':fn', $fn, PDO::PARAM_STR);
            $stmt->bindValue(':ln', $ln, PDO::PARAM_STR);  
            $result = $stmt->execute(); 
            header("Location: confirm.php");
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
    <link rel="stylesheet" href="acc_form.css">
    <title>Loginpage</title>
</head>
<body>
    <header>
        <h1 class="txt_cen">Welcome to Calendar Project</h1>
    </header>

    <form class="login_f" method = "POST" action = "create_acc.php">
        <h1>Create An Account</h1>
        <div class="txtb">
            <input type="text" name="fname" placeholder="First Name" required />
        </div>

        <div class="txtb">
            <input type="text" name="lname" placeholder="Last Name" required />
        </div>    
        <div class="txtb">
            <input type="text" name="nuser" placeholder="Username" required />         
        </div>
        <div class="errormessage">
        <?= $_SESSION['message'] ?>
        </div>
        <div class="txtb">
            <input type="text" name="npass" placeholder="Password" required />
        </div>
        <input type="submit" class="lgn_but" value="Create an account">

        <div class="acc_btn">
            Do you have an account? <a href="login_page.php">Go to Login</a>
        <div>

    </form>

    
</body>
</html>