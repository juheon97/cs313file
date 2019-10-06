<?php
session_start();
if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    header("Location: prove3.php");
    die();
}
?>
<a href="prove3.php">Home</a>