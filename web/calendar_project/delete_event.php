<?php 
session_start();
require_once("db.php");
$db = get_db();
$id2 = $_SESSION["form_id"];
$del_sub = htmlspecialchars($_POST["del_subject"]);
$query2 = 'SELECT esubject, form_id FROM events WHERE esubject=:del_sub AND form_id=:id2';
$statement_d = $db->prepare($query2);
$statement_d -> bindValue(':del_sub', $del_sub, PDO::PARAM_STR);
$statement_d -> bindValue(':id2', $id2, PDO::PARAM_INT);
$statement_d->execute();
$name_del = $statement_d->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($name_del[0]['esubject'] != $del_sub) {
        $_SESSION['message9'] = "This subject does not exist";

    }
    else if (isset($_POST['del_btn'])) {
        $query_d2 = 'DELETE FROM events WHERE form_id=:id2 AND esubject=:del_sub';
        $stmt_d = $db -> prepare($query_d2);
        $stmt_d->bindValue(':id2', $id2, PDO::PARAM_INT);  
        $stmt_d->bindValue(':del_sub', $del_sub, PDO::PARAM_STR);
        $result_d = $stmt_d->execute(); 
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
                <input type="submit" class="lgn_but" value="Delete" name="del_btn">
                
            </form>
        
            <form  action="go_calendar.php">
                <div class="centerize"><input type="submit" value="Go back to Calendar" class='btn btn-warning'></div>
            </form>


            <div class="table-box">
        <div class="table-row table-head">
            <div class="table-cell">
                <p>Subject</p>
            </div>
            <div class="table-cell">
                <p>Description</p>
            </div>
             <div class="table-cell">
                <p>Date</p>
             </div>
        </div>
    </div>

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