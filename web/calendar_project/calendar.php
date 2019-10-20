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

        $query = 'SELECT first_name, last_name FROM user_info';
        $statement = $db->prepare($query);
        $statement->execute();
        $name = $statement->fetchAll(PDO::FETCH_ASSOC);
        $query2 = 'SELECT calendar_name FROM calendar';
        $statementc = $db->prepare($query2);
        $statementc->execute();
        $cal = $statementc->fetchAll(PDO::FETCH_ASSOC);
        $query3 = 'SELECT sesubject FROM subject_event';
        $statements = $db->prepare($query3);
        $statements->execute();
        $sub = $statements->fetchAll(PDO::FETCH_ASSOC);
        $query4 = 'SELECT edescription, edate,etime FROM events';
        $statemente = $db->prepare($query4);
        $statemente->execute();
        $eve = $statemente->fetchAll(PDO::FETCH_ASSOC);

        foreach ($name as $n) {
            $fname = $n['first_name'];
            $lname = $n['last_name'];
            
            echo $fname . "<br>"; 
            echo $lname . "<br>";
        }   

        foreach ($cal as $c) {
            $cname = $c['calendar_name'];
            echo $cname . "<br>";
        }   

        foreach ($sub as $s) {
            $sname = $s['sesubject'];
            echo $sname . "<br>";
        }   

        foreach ($eve as $e) {
            $des = $e['edescription'];
            $date = $e['edate'];
            $time = $e['etime'];
            
            echo $des . "<br>"; 
            echo $date . "<br>";
            echo $time . "<br>";
        }   
     
        
      ?>
    </div>
</body>
</html>