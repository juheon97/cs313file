<?php

    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(empty($message)||empty($email) || empty($subject)) 
{
    echo "Name and email are mandatory!";
    exit;
}
    else {
        
    echo "Submitted Successfuly!";
    exit;
    }
?>