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
    <script type = "text/javascript" src = "week9.js"></script>
    <title>calendar</title>
</head>
<body>

    <form id="popup-box1" class="popup-position" action="calendar.php" method="POST">
        <div id="popup-wrapper">
            <div id="popup-container">
                <h3>Add a calendar</h3>
                <div class="txtb">
                    <input type="text" placeholder="type a text" name="cal_n" required />
                </div>
                <input type="submit" class="lgn_but" value="login">
                <p style="text-align: right;"><a href="javascript:void(0)">Cancel to add</a></p>    
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
        echo "<button  onclick='testfunction()'>".$cn["calendar_name"]."</button>";
    }
    
    ?>
    <button onclick="toggle_visibility(popup-box1)">Add</button>
    
    </div>

   

</body>
</html>