<?php 
session_start();
$id2 = $_SESSION["form_id"];
$sub = htmlspecialchars($_POST["add_subject"]);
$descr = htmlspecialchars($_POST["add_des"]);
$dat = htmlspecialchars($_POST["add_date"]);
require_once("db.php");
$db = get_db();
$query_add = 'SELECT esubject, form_id FROM events WHERE form_id=:id2 AND esubject=:sub';
$statement = $db->prepare($query_add);
$statement -> bindValue(':sub', $sub, PDO::PARAM_STR);
$statement -> bindValue(':id2', $id2, PDO::PARAM_INT);
$statement->execute();
$name_check = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($name_check[0]['esubject'] === $sub) {
        $_SESSION['message8'] = "This subject already exists";
    }
    else if(isset($_POST['add_btn'])) {
        $query = 'INSERT INTO events(esubject, edescription, edate, form_id) VALUES (:sub, :descr, :dat, :id2)';
        $stmt = $db -> prepare($query);
        $stmt->bindValue(':sub', $sub, PDO::PARAM_STR);
        $stmt->bindValue(':descr', $descr, PDO::PARAM_STR);
        $stmt->bindValue(':dat', $dat, PDO::PARAM_STR);
        $stmt->bindValue(':id2', $id2, PDO::PARAM_INT);  
        $resulte = $stmt->execute(); 
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
    <link rel="stylesheet" href="form_event.css">
    <script type = "text/javascript" src = "valid.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Add Event</title>
</head>
<body onLoad="hide()">


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
                    <input type="text" placeholder="tpye a date ex = 10-15-2019" name="add_date" id="add_date" onInput = "validation(this.value, this.id)" required />
                    <br/><span id = "add_datemessage" style = "font-size: 80%" class = "errormessage">Please follow the format ex = mm-dd-yyyy</span></td>
                </div>
                <input type="submit" class="lgn_but" value="Add" name="add_btn">
                
            </form>
        
            <form  action="go_calendar.php">
                <div class="centerize"><input type="submit" value="Go back to Calendar" class='btn btn-warning'></div>
            </form>

    
</body>
</html>