<?php 
require_once("db.php");
$db = get_db();
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
        $statement = $db->query('SELECT first_name, last_name FROM user_info');
        $statementc = $db->query('SELECT calendar_name FROM calendar');
        $ct = $statementc->fetchAll(PDO::FETCH_ASSOC);
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo "<p class='txt_cen'>".$name[0]['first_name'].' '.$name[0]['last_name'].' '.$ct[0]['calendar_name'].' '.'Calendar'."</p>";
      ?>
    </div>
</body>
</html>