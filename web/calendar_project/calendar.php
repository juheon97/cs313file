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
    <title>calendar</title>
</head>
<body>
    <div>
    <?php
        require_once("db.php");
        $db = get_db();    

        $query = 'SELECT first_name, user_info_id FROM user_info WHERE user_info_id=:$_SESSION["user_id"]';
        $statement = $db->prepare($query);
        $statement -> bindValue(':$_SESSION["user_id"]', $_SESSION["user_id"], PDO::PARAM_INT);
        $statement->execute();
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);
        //$query2 = 'SELECT calendar_name,  FROM calendar';
        //$statementc = $db->prepare($query2);
        //$statementc->execute();
        //$cal = $statementc->fetchAll(PDO::FETCH_ASSOC);

        echo "<p class='txt_cen'>".$name[0]['first_name']."'s"." "."Calendar"."</p>";
        
      ?>
    </div>
</body>
</html>