<?php 
session_start();
require_once("db.php");
$db = get_db();
$id2 = $_SESSION["form_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form_event.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Add Event</title>
</head>
<body>


            <form class="login_f" action="" method="POST">
               <h3>Type an subject to delete</h3>
                <div class="txtb">
                    <input type="text" placeholder="type a subject" name="del_subject" required />
                </div>
                <div class="errormessage">
                    <?= $_SESSION['message9'] ?>
                </div>
                <input type="submit" class="lgn_but" value="Add" name="del_btn">
                
            </form>
        
            <form  action="go_calendar.php">
                <div><input type="submit" value="Go back to Calendar" class='btn btn-warning'></div>
            </form>

            <?php 
                $query = 'SELECT esubject, edescription, edate, form_id FROM events WHERE form_id=:id2 ORDER BY edate DESC';
                $statement = $db->prepare($query);
                $statement -> bindValue(':id2', $id2, PDO::PARAM_INT);
                $statement->execute();
                $sub = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($sub as $s){
                    echo "<div class='table-box'>";
                    echo "<div class='table-row'>";
                    echo "<div class='table-cell'>"."<p>".$s['esubject']."</p>"."</div>"."<div class='table-cell'>"."<p>".$s['edescription']."</p>"."</div>"
                    ."<div class='table-cell'>"."<p>".$s['edate']."</p>"."</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>



    
</body>
</html>