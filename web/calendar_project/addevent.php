<?php 
session_start();
$id2 = $_SESSION["form_id"];
$sub = htmlspecialchars($_POST["add_subject"]);
$des = htmlspecialchars($_POST["add_des"]);
$time = htmlspecialchars($_POST["add_time"]);
$dat = htmlspecialchars($_POST["add_date"]);
require_once("db.php");
$db = get_db();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form_event.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Add Event</title>
</head>
<body>


            <form class="login_f" action="" method="POST">
               <h3>Add an event</h3>
                <div class="txtb">
                    <input type="text" placeholder="type a subject" name="add_subject" required />
                </div>
                <div class="errormessage">
                    <?= $_SESSION['message8'] ?>
                </div>
                <div class="txtb">
                    <input type="text" placeholder="type a description" name="add_des" required />
                </div>
                <div class="txtb">
                    <input type="text" placeholder="tpye a date ex = 10:00:00" name="add_time" required />
                </div>
                <div class="txtb">
                    <input type="text" placeholder="tpye a date ex = 2019-10-19" name="add_date" required />
                </div>
                <input type="submit" class="lgn_but" value="Add" name="add_btn">
                
            </form>
        
            <form  action="go_calendar.php">
                <div><input type="submit" value="Go back to Calendar" class='btn btn-warning'></div>
            </form>

    
</body>
</html>