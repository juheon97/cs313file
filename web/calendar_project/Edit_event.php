<?php 
session_start();
require_once("db.php");
$db = get_db();
$id2 = $_SESSION["form_id"];
$form_edi = htmlspecialchars($_POST["edi_subject"]);
$form_des = htmlspecialchars($_POST["edi_des"]);
$form_date = htmlspecialchars($_POST["edi_date"]);
$query2 = 'SELECT esubject, form_id FROM events WHERE esubject=:form_edi AND form_id=:id2';
$statement_e = $db->prepare($query2);
$statement_e -> bindValue(':form_edi', $form_edi, PDO::PARAM_STR);
$statement_e -> bindValue(':id2', $id2, PDO::PARAM_INT);
$statement_e->execute();
$name_edi = $statement_e->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($name_edi[0]['esubject'] != $form_edi) {
        $_SESSION['message10'] = "This subject does not exist";

    }
    else if (isset($_POST['edi_btn'])) {
        $query_e2 = 'UPDATE events SET esubject=:form_edi, edescription=:form_des, edate=:form_date WHERE form_id=:id2 AND esubject=:form_edi';
        $stmt_e = $db -> prepare($query_e2);
        $stmt_e->bindValue(':form_edi', $form_edi, PDO::PARAM_STR);
        $stmt_e->bindValue(':form_des', $form_des, PDO::PARAM_STR);  
        $stmt_e->bindValue(':form_date', $form_date, PDO::PARAM_STR);    
        $stmt_e->bindValue(':id2', $id2, PDO::PARAM_INT);
        $result_e = $stmt_e->execute(); 
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
               <h3>Type an subject to edit</h3>
                <div class="txtb">
                    <input type="text" placeholder="type a subject" name="edi_subject" required />
                </div>
                <div class="errormessage">
                    <?= $_SESSION['message10'] ?>
                </div>
                <div class="txtb">
                    <input type="text" placeholder="type a description" name="edi_des" required />
                </div>
                <div class="txtb">
                <input type="text" placeholder="tpye a date ex = 10-15-2019" name="edi_date" id="edi_date" onInput = "valid(this.value, this.id)" required />
                    <br/><span id = "edi_datemessage" style = "font-size: 80%" class = "errormessage">Please follow the format ex = yyyy-mm-dd</span></td>
                </div>
                <input type="submit" class="lgn_but" value="Edit" name="edi_btn">
                
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