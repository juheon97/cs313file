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
    <title>calendar</title>
</head>
<body>
<?php   
    $c_na = htmlspecialchars($_POST["cal_n"]);
    $id = $_SESSION["user_id"];
    require_once("db.php");
    $db = get_db();
    $query3 = 'SELECT calendar_id, calendar_name, user_info_id FROM calendar WHERE user_info_id=:id AND calendar_name=:c_na';
    $statement3 = $db->prepare($query3);
    $statement3 -> bindValue(':c_na', $c_na, PDO::PARAM_STR);
    $statement3 -> bindValue(':id', $id, PDO::PARAM_INT);
    $statement3->execute();
    $namec = $statement3->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($namec[0]['calendar_name'] === $c_na) {
            $_SESSION['message3'] = "This name already exists";
        }
        else if (isset($_POST['btn_add'])) {
            $query4 = 'INSERT INTO calendar (calendar_name, user_info_id) VALUES (:c_na, :id)';
            $stmt = $db -> prepare($query4);
            $stmt->bindValue(':c_na', $c_na, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
            $result = $stmt->execute(); 
        }
    }
?>
<form id="popup-box1" class="popup-position" action="" method="POST">
        <div id="popup-wrapper">
            <div id="popup-container">
                    <h3>Add a calendar</h3>
                    <div class="txtb">
                        <input type="text" placeholder="type a text" name="cal_n" required />
                    </div>
                    <div class="errormessage">
                        <?= $_SESSION['message3'] ?>
                    </div>
                    <input type="submit" class="lgn_but" value="Add" name="btn_add" onclick="toggle_visibility('popup-box1')">
                    <input type="button" class="lgn_but" value="Cancel to add" onclick="toggle_visibility('popup-box1')">  
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

        echo "<p class='txt_cen'>".$name[0]['first_name']."'s"." "."Calendar"."</p>";
      ?>
    </div>

   
    <div class="eve_button">
    <?php  
    $query2 = 'SELECT calendar_id, calendar_name, user_info_id FROM calendar WHERE user_info_id=:id';
    $statement2 = $db->prepare($query2);
    $statement2 -> bindValue(':id', $id, PDO::PARAM_INT);
    $statement2->execute();
    $cal_name = $statement2->fetchAll(PDO::FETCH_ASSOC);
       
    foreach ($cal_name as $cn) {
        $c_id = $cn["calendar_id"];
        echo "<button  onclick='load_cal($c_id)'>".$cn["calendar_name"]."</button>";
    }
    
    ?>
    <button onclick="toggle_visibility('popup-box1')">Add</button>
    
    </div>

    <div id="calendar_display">

    </div>

    

   

</body>
</html>