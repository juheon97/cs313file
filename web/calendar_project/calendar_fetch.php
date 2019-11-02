<?php
require_once("db.php");
$db = get_db();

$id_f = $_POST['form_id'];
$query = 'SELECT sesubject, calendar_id FROM subject_event WHERE calendar_id=:id_c';
$statement = $db->prepare($query);
$statement -> bindValue(':id_c', $id_c, PDO::PARAM_INT);
$statement->execute();
$sub = $statement->fetchAll(PDO::FETCH_ASSOC);


$results = '';
foreach($sub as $s){
    $results .= "<div>Subject:". $s['sesubject'] .", Calendar ID: " .$s['calendar_id'] . "</div>";
}
echo $results;
?>