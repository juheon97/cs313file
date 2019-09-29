<?php

    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(empty($message)||empty($email) || empty($subject)) 
{
    echo "Subject, message and email are mandatory!";
    exit;
}
    else {

    echo "Submitted Successfuly!";
    exit;
    }
?>