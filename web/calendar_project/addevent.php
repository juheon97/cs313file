<?php 
session_start();
$id2 = $_SESSION["form_id"];
$at1 = htmlspecialchars($_POST["ts"]);
$ad = htmlspecialchars($_POST["td"]);
$add = htmlspecialchars($_POST["tdd"]);
$att = htmlspecialchars($_POST["tt"]);
$query_add = 'SELECT esubject, form_id FROM events WHERE form_id=:id2';
$statement = $db->prepare($query_add);
$statement -> bindValue(':id2', $id2, PDO::PARAM_INT);
$statement->execute();
$name_check = $statement_add->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($name_check[0]['esubject'] === $at1) {
        $_SESSION['message8'] = "This subject already exists";
    }
    else if(isset($_POST['add_btn'])) {
        $query_e = 'INSERT INTO events (esubject, edescription, edate, etime, form_id) VALUES (:at1, :ad, :add, :att, :id2)';
        $stmt_e = $db -> prepare($query_e);
        $stmt_e->bindValue(':at1', $at1, PDO::PARAM_STR);
        $stmt_e->bindValue(':ad', $ad, PDO::PARAM_STR);
        $stmt_e->bindValue(':add', $add, PDO::PARAM_STR);
        $stmt_e->bindValue(':att', $att, PDO::PARAM_STR);
        $stmt_e->bindValue(':id2', $id2, PDO::PARAM_INT);  
        $resulte = $stmt_e->execute(); 
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Add Event</title>
</head>
<body>

<form class="login_f" action="" method="POST">
               
                            <h3>Add an event</h3>
                            <div class="txtb">
                                <input type="text" placeholder="type a subject" name="ts" required />
                            </div>
                            <div class="errormessage">
                                <?= $_SESSION['message8'] ?>
                            </div>
                            <div class="txtb">
                                <input type="text" placeholder="type a description" name="td" required />
                            </div>
                            <div class="txtb">
                                <input type="text" placeholder="tpye a date ex = 10:00:00" name="tt" required />
                            </div>
                            <div class="txtb">
                                <input type="text" placeholder="tpye a date ex = 2019-10-19" name="tdd" required />
                            </div>
                            <input type="submit" class="lgn_but" value="Add" name="add_btn">
                
            </form>
        
            <form  action="go_calendar.php">
                <div><input type="submit" value="Go back to Calendar" class='btn btn-warning'></div>
            
            </form>

    
</body>
</html>