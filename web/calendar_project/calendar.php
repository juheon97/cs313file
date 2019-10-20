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
        $statement = $db->query('SELECT first_name, last_name FROM user_info');
        $statement->execute();
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statementc = $db->query('SELECT calendar_name FROM calendar');
        $statementc->execute();
        $ct = $statementc->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($name as $n){
            $fname = $n['first_name'];
            $lname = $n['last_name'];

            echo $fname . "<br>"; 
            echo $lname . "<br>";
        }
      ?>
    </div>
</body>
</html>