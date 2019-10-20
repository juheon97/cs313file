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

        foreach ($db->query('SELECT first_name, last_name FROM user_info') as $name) {
            echo $name['first_name'] . "<br>";
            echo $name['last_name'] . "<br>";

        }
      ?>
    </div>
</body>
</html>