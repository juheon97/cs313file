<?php
require_once("db.php");
$db = get_db();

$id_f = $_POST['form_id'];
$query = 'SELECT esubject, edescription, edate, etime, form_id FROM events WHERE form_id=:id_f ORDER BY etime DESC, edate DESC';
$statement = $db->prepare($query);
$statement -> bindValue(':id_f', $id_f, PDO::PARAM_INT);
$statement->execute();
$sub = $statement->fetchAll(PDO::FETCH_ASSOC);
$results = '';

foreach($sub as $s){
    echo "<div class='table-box'>";
    echo "<div class='table-row'>";
    echo "<div class='table-cell'>"."<p>".$s['esubject']."</p>"."</div>"."<div class='table-cell'>"."<p>".$s['edescription']."</p>"."</div>"
    ."<div class='table-cell'>"."<p>".$s['edate']."</p>"."</div>";
    echo "</div>";
    echo "</div>";
    
}
?>

