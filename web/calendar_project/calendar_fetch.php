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
    ."<div class='table-cell'>"."<p>".$s['etime']."</p>"."</div>"."<div class='table-cell'>"."<p>".$s['edate']."</p>"."</div>"
    ."<div class='table-cell'>"."<input type='submit' class='btn btn-danger' value='Remove'>"."</div>"
    ."<div class='table-cell'>"."<input type='submit' class='btn btn-default' value='Edit'>"."</div>";
    echo "</div>";
    echo "</div>";
    
}
echo "<button onclick='toggle_visibility(\'popup-box1\')' class='btn btn-primary'>"."Add"."</button>";

?>

