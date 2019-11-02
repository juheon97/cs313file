<?php 
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="button_style.css">
    <script type = "text/javascript" src = "cal.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Note</title>
</head>
<body>
<?php   
    $f_na = htmlspecialchars($_POST["form_n"]);
    $id = $_SESSION["user_id"];
    require_once("db.php");
    $db = get_db();
    $query3 = 'SELECT form_id, form_name, user_info_id FROM form WHERE user_info_id=:id AND form_name=:f_na';
    $statement3 = $db->prepare($query3);
    $statement3 -> bindValue(':f_na', $f_na, PDO::PARAM_STR);
    $statement3 -> bindValue(':id', $id, PDO::PARAM_INT);
    $statement3->execute();
    $namec = $statement3->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($namec[0]['form_name'] === $f_na) {
            $_SESSION['message3'] = "This name already exists";
        }
        else if (isset($_POST['btn_add'])) {
            $query4 = 'INSERT INTO form (form_name, user_info_id) VALUES (:f_na, :id)';
            $stmt = $db -> prepare($query4);
            $stmt->bindValue(':f_na', $f_na, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
            $result = $stmt->execute(); 
        }
    }
?>
<form id="popup-box1" class="popup-position" action="" method="POST">
        <div id="popup-wrapper">
            <div id="popup-container">
                    <h3>Add a form</h3>
                    <div class="txtb">
                        <input type="text" placeholder="type a text" name="form_n" required />
                    </div>
                    <div class="errormessage">
                        <?= $_SESSION['message3'] ?>
                    </div>
                    <input type="submit" class="lgn_but" value="Add" name="btn_add" onclick="toggle_visibility('popup-box1')">
                    <input type="button" class="lgn_but" value="Cancel to add" onclick="toggle_visibility('popup-box1')">  
            </div>
        </div>
    </form>


    <?php   
    $f_na2 = htmlspecialchars($_POST["form_n2"]);
    $id = $_SESSION["user_id"];
    $query_d = 'SELECT form_id, form_name, user_info_id FROM form WHERE user_info_id=:id AND form_name=:f_na2';
    $statement_d = $db->prepare($query_d);
    $statement_d -> bindValue(':f_na2', $f_na2, PDO::PARAM_STR);
    $statement_d -> bindValue(':id', $id, PDO::PARAM_INT);
    $statement_d->execute();
    $name_d = $statement_d->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($name_d[0]['form_name'] != $f_na2) {
            $_SESSION['message4'] = "This name does not exist";
    
        }
        else if (isset($_POST['btn_delete'])) {
            $query_d2 = 'DELETE FROM form WHERE user_info_id=:id';
            $stmt_d = $db -> prepare($query_d2);
            $stmt_d->bindValue(':id', $id, PDO::PARAM_INT);  
            $result_d = $stmt_d->execute(); 
        }
    }
?>
    <form id="popup-box2" class="popup-position" action="" method="POST">
        <div id="popup-wrapper">
            <div id="popup-container">
                    <h3>Delete a form</h3>
                    <div class="txtb">
                        <input type="text" placeholder="type a text" name="form_n2" required />
                    </div>
                    <div class="errormessage">
                        <?= $_SESSION['message4'] ?>
                    </div>
                    <input type="submit" class="lgn_but" value="Delete" name="btn_delete" onclick="toggle_visibility('popup-box2')">
                    <input type="button" class="lgn_but" value="Cancel to delete" onclick="toggle_visibility('popup-box2')">  
            </div>
        </div>
    </form>

    <div>
    <?php
        require_once("db.php");
        $db = get_db();    
        $id = $_SESSION["user_id"];
        $query = 'SELECT first_name, user_info_id FROM user_info WHERE user_info_id=:id';
        $statement = $db->prepare($query);
        $statement -> bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo "<p class='txt_cen'>".$name[0]['first_name']."'s"." "."Simple Event Note"."</p>";
      ?>
    </div>

   
    <div class="eve_button">
    <?php  
    $query2 = 'SELECT form_id, form_name, user_info_id FROM form WHERE user_info_id=:id';
    $statement2 = $db->prepare($query2);
    $statement2 -> bindValue(':id', $id, PDO::PARAM_INT);
    $statement2->execute();
    $cal_name = $statement2->fetchAll(PDO::FETCH_ASSOC);
       
    foreach ($cal_name as $cn) {
        $c_id = $cn["form_id"];
        echo "<button  onclick='add_events($c_id)' class='btn btn-success'>".$cn["form_name"]."</button>";
    }
    
    ?>
    <button onclick="toggle_visibility('popup-box1')" class="btn btn-primary">Add</button>
    <button onclick="toggle_visibility('popup-box2')" class="btn btn-danger">Delete</button>
    
    </div>

    <div id="form_display">

    </div>

    

   

</body>
</html>