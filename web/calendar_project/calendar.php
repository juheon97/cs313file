<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/header.css">
    <title>calendar</title>
</head>
<body>
    <div>
    <?php
        require_once("db.php");
        $db = get_db();    

        $query = 'SELECT first_name, last_name FROM user_info';
        $statement = $db->prepare($query);
        $statement->execute();
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);
        $query2 = 'SELECT calendar_name FROM calendar';
        $statementc = $db->prepare($query2);
        $statementc->execute();
        $cn = $statementc->fetchAll(PDO::FETCH_ASSOC);

        echo "<p class='txt_cen'>".$name['first_name'].' '.$name[last_name].' '.$cn['calendar_name'].' '."Calendar"."</p>";

        
      ?>
    </div>
</body>
</html>