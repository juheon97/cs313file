<?php
session_start();
if (isset($_POST["figure"])) {
    $array = array($_POST["figure"], $_POST["price"]);
    array_push($_SESSION['cart'], $array);
    header("Location: prove3.php");
    die();
}
?>
<a href="prove3.php">Home</a>