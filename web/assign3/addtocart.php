<?php
session_start();
$f = $_POST["figure"];
$p = $_POST["price"];
if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array("$f", "$p");
    header("Location: prove3.php");
    die();
}
?>
<a href="prove3.php">Home</a>